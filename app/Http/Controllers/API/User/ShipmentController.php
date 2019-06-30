<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Address;
use App\Models\API\Company;
use App\Models\API\Price;
use App\Models\API\Shipment;
use App\Utility;
use function GuzzleHttp\json_decode;
use Illuminate\Http\Request;

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
    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/addShipment",
     *         tags={"User Shipment"},
     *         operationId="addShipment",
     *         summary="Add shipment",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
     *                  property="shipments",
     *                  type="array",
     *                  description="lost of shipments",
     *                  @SWG\items(
     *                      type="object",
     *                      @SWG\Property(property="category_id", type="integer"),
     *                      @SWG\Property(property="quantity", type="integer")
     *                  ),
     *              ),
     *              @SWG\Property(
     *                  property="delivery_companies_id",
     *                  type="string",
     *                  description="Delivery companies list of ids",
     *                  example="1,2,3,4"
     *              ),
     *              @SWG\Property(
     *                  property="address_from_id",
     *                  type="integer",
     *                  description="User pick up address id",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="address_to_id",
     *                  type="integer",
     *                  description="User drop address id",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="pickup_time_from",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="1"
     *              ),
     *              @SWG\Property(
     *                  property="pickup_time_to",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="1"
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
            'shipments' => 'required|array|min:1',
            'shipments.*.category_id' => 'required',
            'shipments.*.quantity' => 'required|numeric',
            'delivery_companies_id' => 'required|array|min:1',
            'address_from_id' => 'required',
            'address_to_id' => 'required',
            'pickup_time_from' => 'required',
            'pickup_time_to' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $price = Price::find(1);

        // Do checks on all the fields before inserting

        $shipment = new Shipment();
        $shipment->price = $price->price;

        $address_from = Address::find($request->address_from_id);
        $address_to = Address::find($request->address_to_id);

        if ($address_from != null || $address_to != null) {
            $shipment->address_from_id = $request->address_from_id;
            $shipment->address_to_id = $request->address_to_id;
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_address_found', $this->language),
            ], 404);
        }

        $shipment->pickup_time_from = $request->pickup_time_from;
        $shipment->pickup_time_to = $request->pickup_time_to;
        $shipment->user_id = $request->user_id;
        $shipment->status = 1;
        $shipment->payment_type = 1;

        $shipment->save();

        foreach ($request->shipments as $eachShipment) {

            $category_ids[] = $eachShipment["category_id"];
        }

        $categories = Category::findMany($category_ids);

        if (count($categories) != count($category_ids)) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_category_found', $this->language),
            ], 404);
            $shipment->delete();
        }

        foreach ($request->shipments as $eachShipment) {
            $shipment->categories()->attach($eachShipment["category_id"], ['quantity' => $eachShipment["quantity"]]);
        }

        $companies = Company::findMany($request->delivery_companies_id);
        $playerIds = [];
        foreach ($companies as $company) {
            $playerIds[] = $company->player_id;
        }
        $message = "";
        if (count($companies) == 1) {
            $message = "Request JUST FOR YOU";
        } else {
            $message = "Request sent to many";
        }

        Notification::sendNotificationToMultipleUser($playerIds, $message);

        foreach ($companies as $company) {
            $playerIds[] = $company->player_id;
        }

        return response()->json([
            'message' => LanguageManagement::getLabel('add_shipment_success', $this->language),
            'shipment_id' => $shipment->id,
        ]);
    }

    /**
     *
     * @SWG\Get(
     *         path="/~tvavisa/masafah/public/api/user/getShipments",
     *         tags={"User Shipment"},
     *         operationId="getShipments",
     *         summary="Get User shipments",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
                $shipment["address_to"] = Address::find($shipment->address_to_id);
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
     *         path="/~tvavisa/masafah/public/api/user/getShipmentDetails/{shipment_id}",
     *         tags={"User Shipment"},
     *         operationId="getShipmentDetails",
     *         summary="Get User shipment by ID",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
            $shipment["address_to"] = Address::find($shipment->address_to_id);

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
     *         path="/~tvavisa/masafah/public/api/user/deleteShipmentById/{shipment_id}",
     *         tags={"User Shipment"},
     *         operationId="deleteShipmentById",
     *         summary="Get User shipment by ID",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
     *         path="/~tvavisa/masafah/public/api/user/editShipment",
     *         tags={"User Shipment"},
     *         operationId="editShipment",
     *         summary="Edit shipment",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
     *              @SWG\Property(
     *                  property="shipments",
     *                  type="array",
     *                  description="lost of shipments",
     *                  @SWG\items(
     *                      type="object",
     *                      @SWG\Property(property="category_id", type="integer"),
     *                      @SWG\Property(property="quantity", type="integer")
     *                  ),
     *              ),
     *              @SWG\Property(
     *                  property="address_from_id",
     *                  type="integer",
     *                  description="User pick up address id",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="address_to_id",
     *                  type="integer",
     *                  description="User drop address id",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="pickup_time_from",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="10:00"
     *              ),
     *              @SWG\Property(
     *                  property="pickup_time_to",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="16:00"
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
            'shipments' => 'required|array|min:1',
            'shipments.*.category_id' => 'required',
            'shipments.*.quantity' => 'required|numeric',
            //'delivery_companies_id' => 'required|array|min:1',
            'address_from_id' => 'required',
            'address_to_id' => 'required',
            'pickup_time_from' => 'required',
            'pickup_time_to' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipment = Shipment::find($request->shipment_id);

        if ($shipment->status == 1) {
            $price = Price::find(1);

            $shipment->update([
                'price' => $price->price,
                'address_from_id' => $request->address_from_id,
                'address_to_id' => $request->address_to_id,
                'pickup_time_from' => $request->pickup_time_from,
                'pickup_time_to' => $request->pickup_time_to,
                'user_id' => $request->user_id,
                'status' => 1,
                'payment_type' => 1,
            ]);

            foreach ($request->shipments as $eachShipment) {
                $shipment->categories()->sync($eachShipment["category_id"], ['quantity' => $eachShipment["quantity"]]);
            }

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
     *         path="/~tvavisa/masafah/public/api/user/getCategories",
     *         tags={"User Shipment"},
     *         operationId="getCategories",
     *         summary="Get Shipment Categories",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
     *         path="/~tvavisa/masafah/public/api/user/getCompanies",
     *         tags={"User Shipment"},
     *         operationId="getCompanies",
     *         summary="Get all approved companies",
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
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
    public function getCompanies()
    {
        $companies = Company::all();

        $companyList = [];
        foreach ($companies as $company) {
            if ($company->approved) {
                $companyList[] = $company;
            }
        }
        return $companyList;
    }

    private function getShipmentDetailsResponse($shipment)
    {
        $items = [];
        $categories = $shipment->categories()->get();
        foreach ($categories as $category) {
            $item["category_id"] = $category->id;
            $item["category_name"] = $category->name;
            $item["quantity"] = $category->pivot->quantity;
            $items[] = $item;
        }
        $shipment["items"] = $items;
        return $shipment;
    }
}
