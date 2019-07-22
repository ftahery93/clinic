<?php
namespace App\Http\Controllers\API\Company;

use App;
use App\Address;
use App\City;
use App\Commission;
use App\Company;
use App\Country;
use App\FreeDelivery;
use App\Helpers\MailSender;
use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Order;
use App\Price;
use App\RegisteredUser;
use App\Shipment;
use App\Utility;
use App\Wallet;
use Illuminate\Http\Request;

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

        $shipments = $this->getShipmentsBasedOnCityId($request);

        $response = [];
        if (count($shipments) > 0) {
            foreach ($shipments as $shipment) {
                $shipment = $this->getShipmentDetailsResponse($shipment);
                $shipment["address_from"] = Address::find($shipment->address_from_id);
                $shipment["address_to"] = Address::find($shipment->address_to_id);
                $response[] = collect($shipment);
            }
            return response()->json($response);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
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
            $shipment["address_to"] = Address::find($shipment->address_to_id);
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
        // $validator = [
        //     'shipment_id' => 'required|exists:shipments,id',
        // ];

        // $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        // if ($checkForMessages) {
        //     return $checkForMessages;
        // }

        $shipment = Shipment::find($shipment_id);
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
     *         path="/company/acceptShipments",
     *         tags={"Company Shipments"},
     *         operationId="acceptShipments",
     *         summary="Accept shipments by Company",
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
    public function acceptShipments(Request $request)
    {
        json_decode($request->getContent(), true);
        $validator = [
            'shipment_ids' => 'required|array|min:1',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipments = Shipment::findMany($request->shipment_ids);
        $totalShipments = count($request->shipment_ids);
        $freeShipments = 0;
        $walletAmount = 0;
        $cardAmount = 0;
        $remainingAmount = 0;
        $freeDeliveries = FreeDelivery::where('company_id', $request->company_id)->get()->first();
        $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
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
        }
        $price = Price::find(1);
        $commission = Commission::find(1);
        if ($totalShipments > 0) {
            $remainingAmount = $totalShipments * $price->price * ($commission->percentage / 100);
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
        if ($remainingAmount > 0) {
            $cardAmount = $remainingAmount;
        }
        foreach ($shipments as $shipment) {
            if ($shipment->status > 1) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
                ], 404);
            }
        }
        $order = Order::create([
            'company_id' => $request->company_id,
            'free_deliveries' => $freeShipments,
            'wallet_amount' => $walletAmount,
            'card_amount' => $cardAmount,
            'status' => 0,
        ]);
        foreach ($shipments as $shipment) {
            $order->shipments()->attach($shipment);
        }
        $user = RegisteredUser::find($shipment->user_id);
        $company = Company::find($request->company_id);
        if ($user != null && $company != null) {
            $playerIds[] = $user->player_id;
            Notification::sendNotificationToMultipleUser($playerIds, "Shipment #" . $shipment->id . " Accepted");
            MailSender::sendMail($user->email, "Shipment Accepted", "Hello, Your shipment is accepted by " . $company->name);
        }
        return response()->json([
            'message' => LanguageManagement::getLabel('accept_shipment_success', $this->language),
            'total_amount' => count($request->shipment_ids) * $price->price * ($commission->percentage / 100),
            'order_id' => $order->id,
            'free_deliveries_used' => $freeShipments,
            'wallet_amount_used' => $walletAmount,
            'card_amount' => $cardAmount,
        ]);
    }
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
                'status' => 3,
            ]);
            $user = RegisteredUser::find($shipment->user_id);
            if ($user != null) {
                MailSender::sendMail($user->email, "Shipment Picked Up", "Hello User, Your shipment is picked");
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
                MailSender::sendMail($user->email, "Shipment Delivered Up", "Hello User, Your shipment is delivered");
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
            $shipment["address_to"] = Address::find($shipment->address_to_id);
            $response[] = collect($shipment);
        }
        return response()->json($response);
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

    private function getShipmentsBasedOnCityId($request)
    {
        if (!empty($request->from_id) && !empty($request->to_id)) {
            $shipments = $this->findShipmentsWithFromAndToCity($request->city_id_from, $request->city_id_to);
        } else if (!empty($request->from_id) && empty($request->to_id)) {
            $shipments = $this->findShipmentsWithOnlyFromCity($request->city_id_from);
        } else if (empty($request->from_id) && !empty($request->to_id)) {
            $shipments = $this->findShipmentsWithOnlyToCity($request->city_id_to);
        } else {
            $shipments = Shipment::where('status', 1)->get();
        }

        return $shipments;
    }

    private function findShipmentsWithFromAndToCity($from_city, $to_city)
    {
        return Shipment::where('status', 1)->where('city_id_from', $from_city)->where('city_id_to', $to_city)->get();
    }

    private function findShipmentsWithOnlyFromCity($from_city)
    {
        return Shipment::where('status', 1)->where('city_id_from', $from_city)->get();
    }

    private function findShipmentsWithOnlyToCity($to_city)
    {
        return Shipment::where('status', 1)->where('city_id_to', $to_city)->get();
    }
}
