<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\FreeDelivery;
use App\Order;
use App\Wallet;
use App\WalletTransaction;
use App\Utility;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        //$this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/~tvavisa/masafah/public/api/company/getPaymentOptions",
     *         tags={"Company Payment"},
     *         operationId="getPaymentOptions",
     *         summary="Get payment options",
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
    public function getPaymentOptions(Request $request)
    {
        $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
        $freeDeliveries = FreeDelivery::where('company_id', $request->company_id)->get()->first();
        if ($freeDeliveries != null) {
            return response()->json([
                'wallet' => $wallet->balance,
                'free_deliveries' => $freeDeliveries->quantity,
            ]);
        } else {
            return response()->json([
                'wallet' => $wallet->balance,
                'free_deliveries' => 0,
            ]);
        }
    }

    public function paymentFailed(Request $request)
    {
        $validator = [
            'order_id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $order = Order::find($request->order_id);
        if ($order != null) {
            $order->update([
                'status' => 2,
            ]);

            $freeDeliveries = FreeDelivery::where('company_id', $order->company_id)->get()->first();
            $wallet = Wallet::where('company_id', $order->company_id)->get()->first();
            $freeDeliveries->update([
                'quantity' => $freeDeliveries->quantity + $order->freeDeliveries,
            ]);

            if ($order->wallet_amount > 0) {
                WalletTransaction::create([
                    'company_id' => $order->company_id,
                    'amount' => $order->wallet,
                    'type' => true,
                ]);

                $wallet->update([
                    'balance' => $wallet->balance + $order->wallet_amount,
                ]);
            }

            return response()->json([
                'message' => LanguageManagement::getLabel('shipment_accept_failed', $this->language),
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_order_found', $this->language),
            ], 404);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $validator = [
            'order_id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $order = Order::find($request->order_id);
        if ($order != null) {
            $order->update([
                'status' => 1,
            ]);
            return response()->json([
                'message' => LanguageManagement::getLabel('shipment_accept_success', $this->language),
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_order_found', $this->language),
            ], 404);
        }

    }
}
