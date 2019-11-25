<?php
namespace App\Http\Controllers\API\Company;

use App;
use App\Address;
use App\City;
use App\Commission;
use App\Company;
use App\Country;
use App\FreeDelivery;
use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\Jobs\ReserveShipment;
use App\LanguageManagement;
use App\OneSignalUser;
use App\Order;
use App\RegisteredUser;
use App\Shipment;
use App\Utility;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;

class ShipmentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/company/getMyCities",
     *         tags={"Company Shipments"},
     *         operationId="getMyCities",
     *         summary="Get all my cities",
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
    public function getMyCities(Request $request)
    {
        $companyUser = Company::find($request->company_id);
        $country_id = $companyUser->country_id;
        $country = Country::find($country_id);

        $cities = City::where('country_code', $country->iso_code_2)->get();
        $cities = collect($cities)->sortBy('name')->values()->all();
        return response()->json($cities);
    }
    /**
     *
     * @SWG\Get(
     *         path="/company/getPendingShipments",
     *         tags={"Company Shipments"},
     *         operationId="getPendingShipments",
     *         summary="Get Company pending shipments",
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
     *             name="from_id",
     *             in="query",
     *             required=false,
     *             type="integer",
     *             description="145",
     *        ),
     *        @SWG\Parameter(
     *             name="to_id",
     *             in="query",
     *             required=false,
     *             type="integer",
     *             description="11",
     *        ),
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
    public function getPendingShipments(Request $request)
    {
        $validator = [
            'from_id' => 'sometimes|required|exists:cities,id',
            'to_id' => 'sometimes|required|exists:cities,id',
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }
        $company = Company::find($request->company_id);

        if ($company == null) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_company_found', $this->language),
            ], 404);
        }

        $companyShipments = $company->shipments()->get();
        if (count($companyShipments) == 0) {
            return response()->json([]);
        }

        //return response()->json($companyShipments);
        $shipments = $this->getShipmentsBasedOnCityId($request, $companyShipments);

        $response = [];
        if (count($shipments) > 0) {
            foreach ($shipments as $shipment) {
                $shipment = $this->getShipmentDetailsResponse($shipment);
                $shipment["address_from"] = Address::find($shipment->address_from_id);
                //$shipment["address_to"] = Address::find($shipment->address_to_id);
                $response[] = collect($shipment);
            }
            return response()->json($response);
        }
        return response()->json([]);

    }
    /**
     *
     * @SWG\Get(
     *         path="/company/getMyShipments",
     *         tags={"Company Shipments"},
     *         operationId="getMyShipments",
     *         summary="Get Company accepted/picked up shipments",
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
    public function getMyShipments(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->company_id)->where(function ($query) {
            $query->where('status', 2)->orWhere('status', 3);
        })->get();
        $response = [];
        foreach ($shipments as $shipment) {
            $shipment = $this->getShipmentDetailsResponse($shipment);
            $shipment["address_from"] = Address::find($shipment->address_from_id);
            //$shipment["address_to"] = Address::find($shipment->address_to_id);
            $response[] = collect($shipment);
        }
        return response()->json($response);
    }

    /**
     *
     * @SWG\Get(
     *         path="/company/getShipmentById/{shipment_id}",
     *         tags={"Company Shipments"},
     *         operationId="getShipmentById",
     *         summary="Get Company shipment by ID",
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
    public function getShipmentById(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);

        $companies = $shipment->companies()->get();
        $companyShipment = collect($companies)->where('id', $request->company_id)->values()->all();

        if (count($companyShipment) == 0) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ]);
        }

        if ($shipment != null && $shipment->company_id == $request->company_id) {
            $shipment = $this->getShipmentDetailsResponse($shipment);
            $shipment["address_from"] = Address::find($shipment->address_from_id);
            $shipment["address_to"] = Address::find($shipment->address_to_id);
            return collect($shipment);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/company/getShipmentPrice",
     *         tags={"Company Shipments"},
     *         operationId="getShipmentPrice",
     *         summary="Get Shipment Price for the Company",
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
     *             name="Accept shipment body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="shipment_ids",
     *                  type="array",
     *                  description="Shipment IDs - *(Required)",
     *                  @SWG\items(
     *                      type="integer",
     *                      example=1
     *                  ),
     *              ),
     *             @SWG\Property(
     *                  property="use_free_deliveries",
     *                  type="boolean",
     *                  description="Use free deliveries or not",
     *                  example="true"
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
    public function getShipmentPrice(Request $request)
    {
        json_decode($request->getContent(), true);
        $validator = [
            'shipment_ids' => 'required|array|min:1',
            'shipment_ids.*' => 'distinct',
            'use_free_deliveries' => 'required|boolean',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $shipments = Shipment::findMany($request->shipment_ids);
        $response = $this->getShipmentsPrice($request, $shipments);
        return response()->json($response);
    }

    /**
     *
     * @SWG\Post(
     *         path="/company/reserveShipments",
     *         tags={"Company Shipments"},
     *         operationId="reserveShipments",
     *         summary="Reserve the shipments",
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
     *             description="Android-1",
     *        ),
     *        @SWG\Parameter(
     *             name="Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="shipment_ids",
     *                  type="array",
     *                  description="Shipment IDs - *(Required)",
     *                  @SWG\items(
     *                      type="integer",
     *                      example=1
     *                  ),
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function reserveShipments(Request $request)
    {
        json_decode($request->getContent(), true);
        $validator = [
            'shipment_ids' => 'required|array|min:1',
            'shipment_ids.*' => 'distinct',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $shipmentPrices = [];
        $shipments = Shipment::findMany($request->shipment_ids);
        foreach ($shipments as $shipment) {
            $price = [];
            if ($shipment != null && $shipment->status == 1) {
                $price["shipment_id"] = $shipment->id;
                $price["shipment_price"] = $shipment->price;
                $shipment->update([
                    'status' => 5,
                ]);
                $shipmentPrices[] = $price;
            }
        }
        $request['use_free_deliveries'] = false;
        $response = $this->getShipmentsPrice($request, $shipments);
        //return response()->json($response);
        ReserveShipment::dispatch($shipments)->delay(Carbon::now()->addSeconds(30));
        Artisan::call('queue:work',['--once'=>true]);
        return response()->json([
            'message' => LanguageManagement::getLabel('reserve_success', $this->language),
            'shipment_prices' => $shipmentPrices,
            //'shipment_price_list' => $response['shipmentPriceArray'],
            'total_amount' => $response["total_amount"],
            'free_deliveries_used' => $response["free_deliveries_used"],
            'wallet_amount_used' => $response["wallet_amount_used"],
        ]);
    }

    /**
     *
     * @SWG\Post(
     *         path="/company/payShipments",
     *         tags={"Company Shipments"},
     *         operationId="payShipments",
     *         summary="Pay shipments by Company",
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
     *             name="Accept shipment body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="shipment_ids",
     *                  type="array",
     *                  description="Shipment IDs - *(Required)",
     *                  @SWG\items(
     *                      type="integer",
     *                      example=1
     *                  ),
     *              ),
     *             @SWG\Property(
     *                  property="use_free_deliveries",
     *                  type="boolean",
     *                  description="Use free deliveries or not",
     *                  example="true"
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
    public function payShipments(Request $request)
    {
        json_decode($request->getContent(), true);
        $validator = [
            'shipment_ids' => 'required|array|min:1',
            'shipment_ids.*' => 'distinct',
            'use_free_deliveries' => 'required|boolean',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $shipments = Shipment::findMany($request->shipment_ids);
        foreach ($shipments as $shipment) {
            if ($shipment->status == 5) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
                ], 404);
            }
        }

        $response[] = $this->getShipmentsPrice($request, $shipments);
        $wallet = Wallet::where('company_id', $request->company_id)->get()->first;

        if ($response['wallet_amount_used'] > $wallet->balance) {
            return response()->json([
                'error' => LanguageManagement::getLabel('insufficient_balance', $this->language),
            ], 403);
        }

        $order = Order::create([
            'company_id' => $request->company_id,
            'free_deliveries' => $response['free_deliveries_used'],
            'wallet_amount' => $response['wallet_amount_used'],
            'status' => 2,
        ]);

        $wallet->update([
            'balance' => ($wallet->balance - $response['wallet_amount_used']),
        ]);

        foreach ($shipments as $shipment) {
            $order->shipments()->attach($shipment);
        }

        return response()->json([
            'message' => LanguageManagement::getLabel('accept_shipment_success', $this->language),
            'order_id' => $order->id,
        ]);
    }

    // public function unreserveShipment($shipment_id)
    // {
    //     $shipment = Shipment::find($shipment_id);

    //     if ($shipment != null && $shipment->status == 5) {
    //         $shipment->update([
    //             'status' => 0,
    //         ]);
    //         return response()->json([
    //             'message' => LanguageManagement::getLabel('unreserve_success', $this->language),
    //         ]);
    //     } else {
    //         return response()->json([
    //             'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
    //         ], 404);
    //     }
    // }

    /**
     *
     * @SWG\Get(
     *         path="/company/markShipmentAsPicked/{shipment_id}",
     *         tags={"Company Shipments"},
     *         operationId="markShipmentAsPicked",
     *         summary="Picked up shipment by ID",
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
     *     )
     *
     */
    public function markShipmentAsPicked(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment->company_id == $request->company_id) {
            $shipment->update([
                'status' => 3,
            ]);
            $user = RegisteredUser::find($shipment->user_id);
            if ($user != null) {
                //MailSender::sendMail($user->email, "Shipment Picked Up", "Hello User, Your shipment is picked");
                $message_en = "Shipment #" . $shipment->id . " is Picked";
                $message_ar = "شحنة #" . $shipment->id . " هو التقطت";

                $users = OneSignalUser::where('user_id', $shipment->user_id)->get();
                foreach ($users as $user) {
                    $playerIds[] = $user->player_id;
                }

                Notification::sendNotificationToMultipleForUser($playerIds, $message_en, $message_ar);
                return response()->json([
                    'message' => LanguageManagement::getLabel('picked_success', $this->language),
                ]);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('no_user_found', $this->language),
                ], 404);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }
    /**
     *
     * @SWG\Get(
     *         path="/company/markShipmentAsDelivered/{shipment_id}",
     *         tags={"Company Shipments"},
     *         operationId="markShipmentAsDelivered",
     *         summary="Delivered shipment by ID",
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
     *     )
     *
     */
    public function markShipmentAsDelivered(Request $request, $shipment_id)
    {

        // $validator = [
        //     'shipment_id' => 'required|exists:shipments,id',
        // ];
        // $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        // if ($checkForError) {
        //     return $checkForError;
        // }

        $shipment = Shipment::find($shipment_id);
        if ($shipment->company_id == $request->company_id) {
            $shipment->update([
                'status' => 4,
            ]);
            $user = RegisteredUser::find($shipment->user_id);
            if ($user != null) {

                $message_en = "Shipment #" . $shipment->id . " is Delivered";
                $message_ar = "شحنة #" . $shipment->id . " تم التوصيل";

                $users = OneSignalUser::where('user_id', $shipment->user_id)->get();
                foreach ($users as $user) {
                    $playerIds[] = $user->player_id;
                }

                Notification::sendNotificationToMultipleForUser($playerIds, $message_en, $message_ar);
                //MailSender::sendMail($user->email, "Shipment Delivered Up", "Hello User, Your shipment is delivered");
                return response()->json([
                    'message' => LanguageManagement::getLabel('delivered_success', $this->language),
                ]);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('no_user_found', $this->language),
                ], 404);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/company/getShipmentHistory",
     *         tags={"Company Shipments"},
     *         operationId="getShipmentHistory",
     *         summary="Get Company shipment history",
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
        $shipments = Shipment::where('company_id', $request->company_id)->where('status', 4)->get();
        $response = [];
        foreach ($shipments as $shipment) {
            $shipment = $this->getShipmentDetailsResponse($shipment);
            $shipment["address_from"] = Address::find($shipment->address_from_id);
            //$shipment["address_to"] = Address::find($shipment->address_to_id);
            $response[] = collect($shipment);
        }
        return response()->json($response);
    }

    public function getShipmentsPrice($request, $shipments)
    {
        $totalShipments = count($request->shipment_ids);
        $freeShipments = 0;
        $walletAmount = 0;
        $remainingAmount = 0;
        $actualTotalAmount = 0;
        $price = 0;
        $price = $this->calculatePriceForShipments($shipments);
        $actualTotalAmount = $price;
        if ($request->use_free_deliveries) {
            $freeDeliveries = FreeDelivery::where('company_id', $request->company_id)->get()->first();
            if ($freeDeliveries != null) {
                if ($totalShipments > $freeDeliveries->quantity) {
                    $freeShipments = $freeDeliveries->quantity;
                    $totalShipments = $totalShipments - $freeShipments;
                } else if ($totalShipments < $freeDeliveries->quantity) {
                    $freeShipments = $totalShipments;
                    $totalShipments = 0;
                } else {
                    $freeShipments = $totalShipments;
                    $totalShipments = 0;
                }
                for ($key = 0; $key < $freeShipments; $key++) {
                    $price = $price - $shipments[$key]->price;
                }
            }
        }
        $commission = Commission::find(1);
        $remainingAmount = $totalShipments * $price * ($commission->percentage / 100);
        if ($totalShipments > 0) {
            $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
            if ($wallet->balance > $remainingAmount) {
                $walletAmount = $remainingAmount;
                $remainingAmount = 0;
            } else if ($wallet->balance < $remainingAmount) {
                $walletAmount = $wallet->balance;
                $remainingAmount = $remainingAmount - $walletAmount;
            } else {
                $walletAmount = $wallet->balance;
                $remainingAmount = 0;
            }
        }
        $shipmentPriceArray = [];
        $shipmentPriceArray = $this->calculatePriceForEachShipment($shipments);

        $response = [];
        $response['shipment_price_list'] = $shipmentPriceArray;
        $response['total_amount'] = $actualTotalAmount;
        $response['free_deliveries_used'] = $freeShipments;
        $response['wallet_amount_used'] = $walletAmount;

        return $response;
    }

    private function getShipmentDetailsResponse($shipment)
    {
        $items = [];
        $categories = $shipment->categories()->get();
        $groupedCategories = collect($categories)->groupBy('pivot.address_to_id');
        $groupingCategories = [];
        foreach ($groupedCategories as $categories) {
            $eachCategory["address_to"] = Address::find($categories[0]->pivot->address_to_id);
            $items = [];
            foreach ($categories as $category) {
                $item["category_id"] = $category->id;
                $item["category_name"] = $category->name;
                $item["quantity"] = $category->pivot->quantity;
                $items[] = $item;
            }
            $eachCategory["products"] = $items;
            $groupingCategories[] = $eachCategory;
        }
        $shipment["items"] = $groupingCategories;
        return $shipment;
    }

    private function getShipmentsBasedOnCityId($request, $companyShipments)
    {
        if (!empty($request->from_id) && !empty($request->to_id)) {
            $shipments = $this->findShipmentsWithFromAndToCity($companyShipments, $request->from_id, $request->to_id);
        } else if (!empty($request->from_id) && empty($request->to_id)) {
            $shipments = $this->findShipmentsWithOnlyFromCity($companyShipments, $request->from_id);
        } else if (empty($request->from_id) && !empty($request->to_id)) {
            $shipments = $this->findShipmentsWithOnlyToCity($companyShipments, $request->to_id);
        } else {
            $shipments = collect($companyShipments)->where('status', 1)->values()->all();
        }
        return $shipments;
    }

    private function findShipmentsWithFromAndToCity($shipments, $from_city, $to_city)
    {
        $shipmentIds = [];
        foreach ($shipments as $shipment) {
            if ($shipment->status == 1) {
                $categorisedShipments = $shipment->categories()->get();
                $exists = collect($categorisedShipments)->where('pivot.city_id_to', $to_city)->where('pivot.city_id_from', $from_city)->values()->all();
                if ($exists != null) {
                    $shipmentIds = array_merge($shipmentIds, collect($exists)->pluck('pivot.shipment_id')->unique()->toArray());
                }
            }
        }
        return Shipment::findMany($shipmentIds);
    }

    private function findShipmentsWithOnlyFromCity($shipments, $from_city)
    {
        return collect($shipments)->where('status', 1)->where('city_id_from', $from_city)->values()->all();
    }

    private function findShipmentsWithOnlyToCity($shipments, $to_city)
    {
        $shipmentIds = [];
        foreach ($shipments as $shipment) {
            if ($shipment->status == 1) {
                $categorisedShipments = $shipment->categories()->get();
                $exists = collect($categorisedShipments)->where('pivot.city_id_to', $to_city)->values()->all();

                if ($exists != null) {
                    $shipmentIds = array_merge($shipmentIds, collect($exists)->pluck('pivot.shipment_id')->unique()->toArray());
                }
            }
        }
        return Shipment::findMany($shipmentIds);
    }

    private function calculatePriceForShipments($shipments)
    {
        $shipments = collect($shipments)->sortByDesc('price')->values()->all();
        $price = 0;
        foreach ($shipments as $shipment) {
            $price = $price + $shipment->price;
        }
        return $price;
    }

    private function calculatePriceForEachShipment($shipments)
    {
        $shipmentPriceArray = [];
        foreach ($shipments as $shipment) {
            $priceForEachShipment = [];
            $priceForEachShipment['shipment_id'] = $shipment->id;
            $priceForEachShipment['price'] = $shipment->price;
            $shipmentPriceArray[] = $priceForEachShipment;
        }

        return $shipmentPriceArray;
    }
}
