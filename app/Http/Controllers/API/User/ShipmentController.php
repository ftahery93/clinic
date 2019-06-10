<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Company;
use App\Models\API\Price;
use App\Models\API\Shipment;
use App\Utility;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Post(
     *         path="/masafah_upgrade/public/api/user/addShipment",
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
     *             name="Add Shipment Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="category_id",
     *                  type="integer",
     *                  description="Category of the shipment",
     *                  example=1
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
     *                  property="pickup_time",
     *                  type="string",
     *                  description="Parcel pickup time",
     *                  example="1"
     *              ),
     *              @SWG\Property(
     *                  property="quantity",
     *                  type="integer",
     *                  description="shipment quantity",
     *                  example=3
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
        $validationMessages = [
            'category_id' => 'required',
            'delivery_companies_id' => 'required',
            'address_from_id' => 'required',
            'address_to_id' => 'required',
            'pickup_time' => 'required',
            'quantity' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $price = Price::find(1);

        $shipment = new Shipment();
        $shipment->category_id = $request->category_id;
        $shipment->price = $price->price;
        $shipment->address_from_id = $request->address_from_id;
        $shipment->address_to_id = $request->address_to_id;
        $shipment->pickup_time = $request->pickup_time;
        $shipment->quantity = $request->quantity;
        $shipment->user_id = $request->id;
        $shipment->status = 1;
        $shipment->payment_type = 1;

        $deliveryCompanies = array_map('intval', explode(",", $request->delivery_companies_id));
        $companies = Company::findMany($deliveryCompanies);
        $playerIds = [];
        foreach ($companies as $company) {
            $playerIds[] = $company->player_id;
        }
        Notification::sendNotificationToMultipleUser($playerIds);

        $shipment->save();

        return response()->json([
            'message' => LanguageManagement::getLabel('add_shipment_success', $this->language),
            'shipment_id' => $shipment->id,
        ]);
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/user/getShipments",
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
        $pickedUp = [];
        $delivered = [];

        $shipments = Shipment::where('user_id', $request->ustger('api')->id);

        if ($shipments) {
            foreach ($shipments as $shipment) {
                switch ($shipment->status) {
                    case 1:
                        $pending[] = $shipment;
                        break;
                    case 2:
                        $accepted[] = $shipment;
                        break;
                    case 3:
                        $pickedUp[] = $shipment;
                        break;
                    case 4:
                        $delivered[] = $shipment;
                        break;
                }
            }

            return response()->json([
                'pending' => $pending,
                'accepted' => $accepted,
                'pickedUp' => $pickedUp,
                'delivered' => $delivered,
            ]);
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/user/getShipmentDetails/{shipment_id}",
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
    public function getShipmentDetails($shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment != null) {
            return $shipment;
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }
}
