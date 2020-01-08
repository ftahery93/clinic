<?php

namespace App\Http\Controllers\API\User;

use App\Address;
use App\Category;
use App\City;
use App\Company;
use App\ExceptionCity;
use App\Governorate;
use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\OneSignalCompanyUser;
use App\Price;
use App\Shipment;
use App\ShipmentPrice;
use App\Utility;
use function GuzzleHttp\json_decode;
use Illuminate\Http\Request;
use DB;
use App;

class ShipmentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        //$this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
        App::setlocale($this->language);
    }

    public $citiesNameAr;
    public $citiesNameEn;

    /**
     *
     * @SWG\Post(
     *         path="/user/addShipment",
     *         tags={"User Shipment"},
     *         operationId="addShipment",
     *         summary="Add shipment",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="Add Shipment Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="address_to_ids",
     *                  type="array",
     *                  description="Address IDs - *(Required)",
     *                  @SWG\items(
     *                      type="integer",
     *                      example=1
     *                  ),
     *              ),
     *           @SWG\Property(
     *                  property="category_id",
     *                  type="integer",
     *                  description="Categgory ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="delivery_companies_id",
     *                  type="array",
     *                  description="Delivery Company IDs - *(Required)",
     *                  @SWG\items(
     *                      type="integer",
     *                      example=1
     *                  ),
     *              ),
     *              @SWG\Property(
     *                  property="address_from_id",
     *                  type="integer",
     *                  description="User pick up address id",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="is_today",
     *                  type="boolean",
     *                  description="Parcel should be delivered today?",
     *                  example=false
     *              ),
     *              @SWG\Property(
     *                  property="pickup_time_from",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="10:00"
     *              ),
     *              @SWG\Property(
     *                  property="date",
     *                  type="string",
     *                  description="Date Format YYYY-MM-DD",
     *                  example="2020-01-10"
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *     )
     *
     */
    public function addShipment(Request $request)
    {
        json_decode($request->getContent(), true);
        $validationMessages = [
            'address_to_ids' => 'required|array|min:1',
            'category_id' => 'required|exists:categories,id',
            //'shipments.*.quantity' => 'required|numeric',
            //'shipments.*.address_to_id' => 'required|exists:addresses,id',
            'delivery_companies_id' => 'required|array|min:1',
            'delivery_companies_id.*' => 'numeric',
            'address_from_id' => 'required|exists:addresses,id',
            'is_today' => 'required|boolean',
            'pickup_time_from' => 'required',
            'date' => 'required_if:is_today,false|date|date_format:Y-m-d',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipment = new Shipment();
        $address_from = Address::find($request->address_from_id);
        //$address_to = Address::find($request->address_to_id);

        if ($address_from->user_id == $request->user_id) {
            $shipment->address_from_id = $request->address_from_id;
            $shipment->city_id_from = $address_from->city_id;
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_address_found', $this->language),
            ], 404);
        }

        $governorate_from = Governorate::find($address_from->governorate_id);
        $exceptionCities = ExceptionCity::all();
        $fromValueExists = collect($exceptionCities)->where('city_id', $address_from->city_id)->first();
        $price_from = $this->calculateShipmentFromPrice($fromValueExists, $governorate_from);

        $shipment->is_today = $request->is_today;
        $shipment->pickup_time_from = $request->pickup_time_from;
        $shipment->pickup_time_to = $request->pickup_time_to;
        $shipment->user_id = $request->user_id;
        $shipment->status = 1;
        $shipment->payment_type = 1;

        if ($request->date) {
            $shipment->date = $request->date;
        }

        $citiesNameAr = "";
        $citiesNameEn = "";
        $shipment->save();
        $price = $this->calculateShipmentPrice($shipment, $request, $exceptionCities, $price_from, $citiesNameAr, $citiesNameEn);
        //§$shipment->price = $price;
        $shipment->update([
            'price' => $price,
        ]);

        $shipment->addresses()->sync($request->address_to_ids);

        //foreach ($request->shipments as $eachShipment) {
        // $address = Address::find($eachShipment['address_to_id']);
        $shipment->categories()->attach($request->category_id);
        //['quantity' => $eachShipment["quantity"],
        //  'address_to_id' => $eachShipment['address_to_id'], 'city_id_to' => $address->city_id, 'city_id_from' => $address_from->city_id]);
        //}

        $companies = Company::findMany($request->delivery_companies_id);

        $playerIds = [];
        foreach ($companies as $company) {
            $shipment->companies()->attach($company->id);
            $playerIdsOfEachCompany = OneSignalCompanyUser::where('company_id', $company->id)->get();
            if (count($playerIdsOfEachCompany) > 0) {
                foreach ($playerIdsOfEachCompany as $eachPlayerId) {
                    $playerIds[] = $eachPlayerId->player_id;
                }
            }
        }

        $city_from = City::find($address_from->city_id);

        global $citiesNameAr;
        global $citiesNameEn;

        if (count($companies) == 1) {
            $shipment->update([
                'is_single' => 1,
            ]);
            $message_en = "New shipment arrived: #" . $shipment->id . "\n JUST FOR YOU \n From: " . $city_from->name_en . " -  To: " . $citiesNameEn;
            $message_ar = "وصل شحنة جديدة: #" . $shipment->id . "\nفقط لك" . "\nمن: " . $city_from->name_ar . " -  لك: " . $citiesNameAr;
        } else {
            $message_en = "New shipment arrived: #" . $shipment->id . "\n From: " . $city_from->name_en . " -  To: " . $citiesNameEn;
            $message_ar = "وصل شحنة جديدة : #" . $shipment->id . "\nمن: " . $city_from->name_ar . " -  لك: " . $citiesNameAr;
        }

        if ($request->is_today) {
            $message_en = $message_en . " \nNOW";
            $message_ar = $message_ar . " \nالآن";
        } else {
            $message_en = $message_en . " \nLater";
            $message_ar = $message_ar . " \nلاحقاً";
        }

        // return response()->json([
        //     'player_ids'=> $playerIds,
        //     'message_en'=>$message_en,
        //     'message_ar'=>$message_ar,
        // ]);

        Notification::sendNotificationToMultipleUser($playerIds, $message_en, $message_ar);

        return response()->json([
            'message' => LanguageManagement::getLabel('add_shipment_success', $this->language),
            'shipment_id' => $shipment->id,
        ]);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getShipments",
     *         tags={"User Shipment"},
     *         operationId="getShipments",
     *         summary="Get User shipments",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getShipments(Request $request)
    {
        $pending = [];
        $accepted = [];

        $shipments = Shipment::where('user_id', $request->user_id)->get();

        if ($shipments) {
            foreach ($shipments as $shipment) {
                $shipment["address_from"] = Address::find($shipment->address_from_id);
                $shipment = $this->getShipmentDetailsResponse($shipment);
                switch ($shipment->status) {
                    case 1:
                        $pending[] = $shipment;
                        break;
                    case 2:
                        $company = Company::find($shipment->company_id);
                        $responseCompany["id"] = $company->id;
                        $responseCompany["name"] = $company->name;
                        $responseCompany["image"] = $company->image;
                        $shipment["company"] = $responseCompany;
                        $accepted[] = $shipment;
                        break;
                }
            }
            return response()->json([
                'pending' => $pending,
                'accepted' => $accepted,
            ]);
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getShipmentDetails/{shipment_id}",
     *         tags={"User Shipment"},
     *         operationId="getShipmentDetails",
     *         summary="Get User shipment by ID",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="shipment_id",
     *             in="path",
     *             description="Shipment ID",
     *             type="integer",
     *             required=true
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="Shipment not found"
     *        ),
     *     )
     *
     */
    public function getShipmentDetails($shipment_id, Request $request)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment != null && $shipment->user_id == $request->user_id) {
            $shipment = $this->getShipmentDetailsResponse($shipment);
            $shipment["address_from"] = Address::find($shipment->address_from_id);
            //$shipment["address_to"] = Address::find($shipment->address_to_id);

            if ($shipment->status > 1) {
                $company = Company::find($shipment->company_id);
                $responseCompany["id"] = $company->id;
                $responseCompany["name"] = $company->name;
                $responseCompany["image"] = $company->image;
                $shipment["company"] = $responseCompany;
            }

            return collect($shipment);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Delete(
     *         path="/user/deleteShipmentById/{shipment_id}",
     *         tags={"User Shipment"},
     *         operationId="deleteShipmentById",
     *         summary="Get User shipment by ID",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="shipment_id",
     *             in="path",
     *             description="Shipment ID",
     *             type="integer",
     *             required=true
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="Shipment not found"
     *        ),
     *     )
     *
     */
    public function deleteShipmentById(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);

        if ($shipment != null && $shipment->user_id == $request->user_id) {
            if ($shipment->status > 1) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
                ], 422);
            } else {
                $users = OneSignalUser::where('user_id', $shipment->user_id)->get();
                foreach ($users as $user) {
                    $playerIds[] = $user->player_id;
                }
                $message_en = "Shipment #" . $shipment->id . " is Deleted";
                $message_ar = "شحنة #" . $shipment->id . "يتم حذف";

                Notification::sendNotificationToMultipleForUser($playerIds, $message_en, $message_ar);
                $shipment->delete();
                return response()->json([
                    'message' => LanguageManagement::getLabel('shipment_delete_success', $this->language),
                ]);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Put(
     *         path="/user/editShipment",
     *         tags={"User Shipment"},
     *         operationId="editShipment",
     *         summary="Edit shipment",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="Edit Shipment Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="shipment_id",
     *                  type="integer",
     *                  description="Shipment ID",
     *                  example=1
     *              ),
     *                 @SWG\Property(
     *                  property="address_to_ids",
     *                  type="array",
     *                  description="Address IDs - *(Required)",
     *                  @SWG\items(
     *                      type="integer",
     *                      example=1
     *                  ),
     *              ),
     *           @SWG\Property(
     *                  property="category_id",
     *                  type="integer",
     *                  description="Categgory ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="address_from_id",
     *                  type="integer",
     *                  description="User pick up address id",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="is_today",
     *                  type="boolean",
     *                  description="Parcel should be delivered today?",
     *                  example=false
     *              ),
     *              @SWG\Property(
     *                  property="pickup_time_from",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="10:00"
     *              ),
     *            @SWG\Property(
     *                  property="date",
     *                  type="string",
     *                  description="Date Format YYYY-MM-DD",
     *                  example="2020-01-10"
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *        @SWG\Response(
     *             response=409,
     *             description="Shipment already accepted"
     *        ),
     *     )
     *
     */
    public function editShipment(Request $request)
    {
        $validationMessages = [
            'shipment_id' => 'required',
            'address_to_ids' => 'required|array|min:1',
            'category_id' => 'required|exists:categories,id',
            //'shipments.*.quantity' => 'required|numeric',
            //'shipments.*.address_to_id' => 'required|exists:addresses,id',
            //'delivery_companies_id' => 'required|array|min:1',
            'address_from_id' => 'required',
            //'address_to_id' => 'required',
            'is_today' => 'required|boolean',
            'pickup_time_from' => 'required_if:is_today,false',
            'date' => 'required_if:is_today,false|date|date_format:Y-m-d',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipment = Shipment::find($request->shipment_id);
        $address_from = Address::find($request->address_from_id);
        if ($address_from->user_id != $request->user_id) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_address_found', $this->language),
            ], 404);
        }

        if ($shipment->status == 1) {
            $governorate_from = Governorate::find($address_from->governorate_id);
            $exceptionCities = ExceptionCity::all();
            $fromValueExists = collect($exceptionCities)->where('city_id', $address_from->city_id)->first();
            $price_from = $this->calculateShipmentFromPrice($fromValueExists, $governorate_from);
            $price = $this->calculateShipmentPrice($shipment, $request, $exceptionCities, $price_from, '', '');

            $shipment->update([
                'price' => $price,
                'address_from_id' => $request->address_from_id,
                'is_today' => $request->is_today,
                'pickup_time_from' => $request->pickup_time_from,
                'pickup_time_to' => $request->pickup_time_to,
                'user_id' => $request->user_id,
                'city_id_from' => $address_from->city_id,
                'status' => 1,
                'payment_type' => 1,
            ]);

            if ($request->date) {
                $shipment->update([
                    'date' => $request->date
                ]);
            }


            $shipment->addresses()->sync($request->address_to_ids);

            //$shipment->categories()->detach();
            $shipment->categories()->sync($request->category_id);

            // foreach ($request->shipments as $eachShipment) {
            //     $shipment->categories()->attach($eachShipment["category_id"], ['quantity' => $eachShipment["quantity"], 'address_to_id' => $eachShipment["address_to_id"]]);
            // }

            return response()->json([
                'message' => LanguageManagement::getLabel('edit_shipment_success', $this->language),
                'shipment_id' => $shipment->id,
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
            ], 409);
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getCategories",
     *         tags={"User Shipment"},
     *         operationId="getCategories",
     *         summary="Get Shipment Categories",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getCategories()
    {
        $categories = Category::all();
        $responseCategories = [];
        foreach ($categories as $category) {
            $responseCategories[] = $category;
        }
        return response()->json($responseCategories);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getShipmentHistory",
     *         tags={"User Shipment"},
     *         operationId="getShipmentHistory",
     *         summary="Get User shipment history",
     *         security={{"ApiAuthentication":{}}},
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getShipmentHistory(Request $request)
    {
        $shipments = Shipment::where('user_id', $request->user_id)->where('status', 4)->get();
        $response = [];
        foreach ($shipments as $shipment) {
            $company = Company::find($shipment->company_id);
            $responseCompany["id"] = $company->id;
            $responseCompany["name"] = $company->name;
            $responseCompany["image"] = $company->image;
            $shipment["company"] = $responseCompany;
            $shipment["address_from"] = Address::find($shipment->address_from_id);
            //$shipment["address_to"] = Address::find($shipment->address_to_id);
            $shipment = $this->getShipmentDetailsResponse($shipment);
            $response[] = collect($shipment);
        }
        return response()->json($response);
    }

    /**
     *
     * @SWG\Post(
     *         path="/user/getAddressPrice",
     *         tags={"User Shipment"},
     *         operationId="getAddressPrice",
     *         summary="Get User Address Price",
     *         security={{"ApiAuthentication":{}}},
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="Registration Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="from_governorateid",
     *                  type="integer",
     *                  description="Governorate ID",
     *                  example=116
     *              ),
     *          @SWG\Property(
     *                  property="from_cityid",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1018
     *              ),
     *         @SWG\Property(
     *                  property="to_governorateid",
     *                  type="integer",
     *                  description="Governorate ID",
     *                  example=117
     *              ),
     *          @SWG\Property(
     *                  property="to_cityid",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1080
     *              ),
     *          ),
     *        ),
     *                 
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="Shipments not found"
     *        ),
     *     )
     *
     */
    public function getAddressPrice(Request $request)
    {
        $validator = [
            'from_governorateid' => 'required|exists:governorates,id',
            'from_cityid' => 'required|exists:cities,id',
            'to_governorateid' => 'required|exists:governorates,id',
            'to_cityid' => 'required|exists:cities,id',
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

        $exceptionCities = ExceptionCity::all();

        //From Address
        $governorate_from = Governorate::find($request->from_governorateid);
        $fromValueExists = collect($exceptionCities)->where('city_id', $request->from_cityid)->first();
        $price_from = $this->calculateShipmentFromPrice($fromValueExists, $governorate_from);

        //To Address
        $governorate_to = Governorate::find($request->to_governorateid);
        $toValueExists = collect($exceptionCities)->where('city_id', $request->to_cityid)->first();
        $price_to = $this->calculateShipmentFromPrice($toValueExists, $governorate_to);
        $price = $price_to;

        if ($price_from > $price_to) {
            $price = $price_from;
        }

        return response()->json($price);
    }

    private function getShipmentDetailsResponse($shipment)
    {
        $item = [];

        $categories = $shipment->categories()->first();
        $address_to_ids = $shipment->addresses()->get();

        $shipment["address_from"] = Address::find($shipment->address_from_id);
        if ($categories) {
            $item["id"] = $categories->id;
            $item["name"] = $categories->{'name_' . App::getLocale()};
        }

        $shipment["category"] = $item;
        $shipment["addresses"] = $address_to_ids;

        return $shipment;
    }

    private function calculateShipmentPrice($shipment, $request, $exceptionCities, $price_from, $citiesNameAr, $citiesNameEn)
    {
        //$groupedShipments = collect($request->shipments)->groupBy('address_to_id');
        $price = 0;
        // $address_to_ids = array_keys($groupedShipments->toArray());
        $address_to_ids = $request->address_to_ids;

        global $citiesNameAr;
        global $citiesNameEn;
        $iterator = 0;
        foreach ($address_to_ids as $eachAddressId) {
            $address_to = Address::find($eachAddressId);
            $address_from = Address::find($request->address_from_id);
            $governorate_to = Governorate::find($address_to->governorate_id);
            $city_to = City::find($address_to->city_id);
            $toValueExists = collect($exceptionCities)->where('city_id', $address_to->city_id)->first();
            if ($toValueExists != null) {
                $price_to = $toValueExists->price;
            } else {
                $price_to = $governorate_to->price;
            }

            if ($price_from >= $price_to) {
                $price = $price + $price_from;
                $this->createShipmentPrice($shipment, $address_from->city_id, $city_to->id, $address_from->governorate_id, $address_to->governorate_id, $price_from);
            } else {
                $price = $price + $price_to;
                $this->createShipmentPrice($shipment, $address_from->city_id, $city_to->id, $address_from->governorate_id, $address_to->governorate_id, $price_to);
            }

            if ($iterator < 2) {
                //$city_to = City::find($address_to->city_id);
                $citiesNameAr = $citiesNameAr . $city_to->name_ar . ", ";
                $citiesNameEn = $citiesNameEn . $city_to->name_en . ", ";
            }
            $iterator = $iterator + 1;
        }

        $citiesNameAr = substr($citiesNameAr, 0, -2);
        $citiesNameEn = substr($citiesNameEn, 0, -2);
        return $price;
    }

    public function calculateShipmentFromPrice($fromValueExists, $governorate_from)
    {
        if ($fromValueExists != null) {
            $price_from = $fromValueExists->price;
        } else {
            $price_from = $governorate_from->price;
        }
        return $price_from;
    }

    public function createShipmentPrice($shipment, $city_from_id, $city_to_id, $governorate_from_id, $governorate_to_id, $price)
    {
        ShipmentPrice::create([
            'shipment_id' => $shipment->id,
            'city_from_id' => $city_from_id,
            'city_to_id' => $city_to_id,
            'governorate_from_id' => $governorate_from_id,
            'governorate_to_id' => $governorate_to_id,
            'price' => $price,
        ]);
    }
}
