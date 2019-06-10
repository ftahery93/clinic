<?php

namespace App\Http\Controllers\API\Company;

use App\Helpers\MailSender;
use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Company;
use App\Models\API\FreeDelivery;
use App\Models\API\RegisteredUser;
use App\Models\API\Shipment;
use App\Models\API\Wallet;
use App\Models\API\WalletOut;
use App\Utility;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/getPendingShipments",
     *         tags={"Company Shipments"},
     *         operationId="getPendingShipments",
     *         summary="Get Company pending shipments",
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
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getPendingShipments(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->id)->where('status', 1)->get();
        return collect($shipments);
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/getAcceptedShipments",
     *         tags={"Company Shipments"},
     *         operationId="getAcceptedShipments",
     *         summary="Get Company accepted shipments",
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
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getAcceptedShipments(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->id)->where('status', 2)->get();
        return collect($shipments);
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/getShipmentById/{shipment_id}",
     *         tags={"Company Shipments"},
     *         operationId="getShipmentById",
     *         summary="Get Company shipment by ID",
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
    public function getShipmentById(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);

        switch ($shipment->status) {
            case 1:
                $wallet = Wallet::where('company_id', $request->id)->get()->first();
                if ($wallet) {
                    $shipment["wallet_amount"] = $wallet->balance;
                } else {
                    $shipment["wallet_amount"] = 0;
                }
                return collect($shipment);

            case 2:
                $shipment["status"] = LanguageManagement::getLabel('booked', $this->language);
                return collect($shipment);
            case 3:
                $shipment["status"] = LanguageManagement::getLabel('picked_up', $this->language);
                return collect($shipment);
            case 4:
                $shipment["status"] = LanguageManagement::getLabel('delivered', $this->language);
                return collect($shipment);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/masafah/public/api/company/acceptShipments",
     *         tags={"Company Shipments"},
     *         operationId="acceptShipments",
     *         summary="Accept shipments by Company",
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
        $knetAmount = 0;
        $remainingAmount = 0;

        $freeDeliveries = FreeDelivery::where('company_id', $request->id)->get()->first();
        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        if ($freeDeliveries != null) {
            if ($totalShipments > $freeDeliveries->quantity) {
                $freeShipments = $freeDeliveries->quantity;
                $totalShipments -= $freeShipments;
                $freeDeliveries->update([
                    'quantity' => 0,
                ]);
            } else if ($totalShipments < $freeDeliveries->quantity) {
                $freeShipments = $totalShipments;
                $totalShipments = 0;
                $remainingFreeShipments = ($freeDeliveries->quantity) - ($totalShipments);
                $freeDeliveries->update([
                    'quantity' => $remainingFreeShipments,
                ]);
            } else {
                $freeShipments = $totalShipments;
                $totalShipments = 0;
                $freeDeliveries->update([
                    'quantity' => 0,
                ]);
            }
        }

        if ($totalShipments > 0) {
            $remainingAmount = $totalShipments * 0.10;

            if ($wallet->balance > $remainingAmount) {
                $walletAmount = $remainingAmount;
                $remainingAmount = 0;
                WalletOut::create([
                    'company_id' => $request->id,
                    'amount' => $walletAmount,
                ]);
                $remainingBalance = $wallet->balance - $walletAmount;
                $wallet->update([
                    'balance' => $remainingBalance,
                ]);
            } else if ($wallet->balance < $remainingAmount) {
                $walletAmount = $wallet->balance;
                $remainingAmount -= $walletAmount;
                WalletOut::create([
                    'company_id' => $request->id,
                    'amount' => $walletAmount,
                ]);
                $wallet->update([
                    'balance' => 0,
                ]);
            } else {
                $walletAmount = $wallet->balance;
                $remainingAmount = 0;
                WalletOut::create([
                    'company_id' => $request->id,
                    'amount' => $walletAmount,
                ]);
                $wallet->update([
                    'balance' => 0,
                ]);
            }
        }

        if ($remainingAmount > 0) {
            $knetAmount = $remainingAmount;
        }

        //$totalAmount = 0;
        foreach ($shipments as $shipment) {
            //$totalAmount += $shipment->price;
            if ($shipment->status > 1) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
                ], 404);
            }
        }

        foreach ($shipments as $shipment) {
            $shipment->update([
                'status' => 2,
                'company_id' => $request->id,
            ]);
        }

        $user = RegisteredUser::find($shipment->user_id);

        $playerIds[] = $user->player_id;
        Notification::sendNotificationToMultipleUser($playerIds);
        MailSender::sendMail($user->email, "Shipment Accepted", "Hello User, Your shipment is accepted by DHL");

        return response()->json([
            'message' => LanguageManagement::getLabel('accept_shipment_success', $this->language),
            'free_deliveries_used' => $freeDeliveries,
            'wallet_amount_used' => $walletAmount,
            'knet_amount' => $knetAmount,
        ]);
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/pickedUpShipmentById/{shipment_id}",
     *         tags={"Company Shipments"},
     *         operationId="pickedUpShipmentById",
     *         summary="Picked up shipment by ID",
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
    public function pickedUpShipmentById(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment->company_id == $request->id) {
            $shipment->update([
                'status' => 3,
            ]);
        }
        $user = RegisteredUser::find($shipment->user_id);

        MailSender::sendMail($user->email, "Shipment Picked Up", "Hello User, Your shipment is picked");
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/deliveredShipmentById/{shipment_id}",
     *         tags={"Company Shipments"},
     *         operationId="deliveredShipmentById",
     *         summary="Delivered shipment by ID",
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
    public function deliveredShipmentById(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment->company_id == $request->id) {
            $shipment->update([
                'status' => 4,
            ]);
        }
        $user = RegisteredUser::find($shipment->user_id);

        MailSender::sendMail($user->email, "Shipment Delivered Up", "Hello User, Your shipment is delivered");
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/getShipmentHistory",
     *         tags={"Company Shipments"},
     *         operationId="getShipmentHistory",
     *         summary="Get Company shipment history",
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
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getShipmentHistory(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->id)->get();
        return collect($shipments);
    }
}
