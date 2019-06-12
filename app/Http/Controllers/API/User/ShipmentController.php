<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
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
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Post(
     *         path="/masafah/public/api/user/addShipment",
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
        json_decode($request->getContent(), true);
        //return $request;
        //return $request;
        $validationMessages = [
            //'shipments' => 'required|array',
            //'shipments.*.category_id' => 'required',
            //'shipments.*.quantity' => 'required|numeric',
            'delivery_companies_id' => 'required|array',
            'address_from_id' => 'required',
            'address_to_id' => 'required',
            'pickup_time' => 'required',
        ];

        //return $request;

        //json_decode($request->input(), true);

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $price = Price::find(1);

        $shipment = Shipment::create([
            'price' => $price->price,
            'address_from_id' => $request->address_from_id,
            'address_to_id' => $request->address_to_id,
            'pickup_time' => $request->pickup_time,
            'user_id' => $request->user_id,
            'status' => 1,
            'payment_type' => 1,
        ]);

        //$deliveryCompanies = array_map('intval', explode(",", $request->delivery_companies_id));
        json_decode($request->delivery_companies_id, true);

        return $request->delivery_companies_id;
        $companies = Company::findMany($request->delivery_companies_id);
        $playerIds = [];
        foreach ($companies as $company) {
            $playerIds[] = $company->player_id;
        }
        Notification::sendNotificationToMultipleUser($playerIds);

        return response()->json([
            'message' => LanguageManagement::getLabel('add_shipment_success', $this->language),
            'shipment_id' => $shipment->id,
        ]);
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/user/getShipments",
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

        $shipments = Shipment::where('user_id', $request->user_id);

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
     *         path="/masafah/public/api/user/getShipmentDetails/{shipment_id}",
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
    public function getShipmentDetails($shipment_id, Request $request)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment != null && $shipment->user_id == $request->user_id) {
            return $shipment;
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_shipment_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Delete(
     *         path="/masafah/public/api/user/deleteShipmentById/{shipment_id}",
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
    public function deleteShipmentById($shipment_id, Request $request)
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

    public function editShipment(Request $request)
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

        $shipment = Shipment::create([
            'category_id' => $request->category_id,
            'price' => $request->price,
            'address_from_id' => $request->address_from_id,
            'address_to_id' => $request->address_to_id,
            'pickup_time' => $request->pickup_time,
            'quantity' => $request->quantity,
            'user_id' => $request->user_id,
            'status' => 1,
            'payment_type' => 1,
        ]);
    }
}
