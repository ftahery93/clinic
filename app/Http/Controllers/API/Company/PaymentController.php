<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\API\Company;
use App\Models\API\Payment;
use function GuzzleHttp\json_decode;

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
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/company/getPaymentOptions",
     *         tags={"Company Payment"},
     *         operationId="getPaymentOptions",
     *         summary="Get payment options",
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

    /**
     *
     * @SWG\Get(
     *         path="/company/payOrder/{order_id}",
     *         tags={"Company Shipments"},
     *         operationId="payShipments",
     *         summary="Pay shipments",
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
     *             name="order_id",
     *             in="path",
     *             required=true,
     *             type="integer",
     *             description="Order ID",
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
     *             response=404,
     *             description="Order not found"
     *        ),
     *     )
     *
     */
    public function payOrder($order_id, Request $request)
    {

        $order = Order::find($order_id);

        if ($order->company_id != $request->company_id) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_order_found', $this->language),
            ], 404);

        }

        $isUpdateSuccess = $this->updateShipmentStatus($order);

        if (!$isUpdateSuccess) {
            return response()->json([
                'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
            ], 409);
        }

        if ($order->card_amount > 0) {
            $company = Company::find($request->company_id);
            $invoiceString = $this->createInvoice($company, $order);
            $response_data = $this->makeInvoiceCreateIsoRequest($invoiceString);
            $response_data = json_decode($response_data, true);

            $paymentMethods = $response_data['PaymentMethods'];
            $extractedPaymentMethods = $this->extractPaymentMethods($paymentMethods);
            return response()->json($extractedPaymentMethods);

        } else {
            $this->bookOrder($order);
            return response()->json([
                'message' => LanguageManagement::getLabel('order_placed_success', $this->language),
            ]);
        }
    }

    public function payment(Request $request)
    {
        $paymentId = $request->paymentId;
        $orderId = $request->order_id;

        $response = $this->makeTransactionRequest($paymentId);

        $order = Order::find($orderId);
        if ($order == null) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_order_found', $this->language),
            ], 404);
        }

        $payment = Payment::create([
            'reference_id' => $response['ReferenceId'],
            'track_id' => $response['TrackId'],
            'transaction_id' => $response['TransactionId'],
            'payment_id' => $response['PaymentId'],
            'transaction_status' => $response['TransactionStatus'],
            'payment_gateway'=>$response['PaymentGateway'],
            'order_id' => $order->id,
        ]);

        if ($response['TransactionStatus'] == 2) {

            $this->bookOrder($order);

            return response()->json([
                'message' => LanguageManagement::getLabel('payment_success', $this->language),
            ]);
        } else {
            $this->updateOrderOnFailedTransaction($order);
            return response()->json([
                'error' => LanguageManagement::getLabel('payment_failed', $this->language),
            ], 424);
        }
    }

    private function extractPaymentMethods($paymentMethods)
    {
        $extractedPaymentMethods = [];
        foreach ($paymentMethods as $paymentMethod) {
            if ($paymentMethod['PaymentMethodCode'] == 'kn' || $paymentMethod['PaymentMethodCode'] == 'vm') {
                $extractedPaymentMethods[] = $paymentMethod;
            }
        }
        return $extractedPaymentMethods;
    }

    private function bookOrder($order)
    {
        $freeDeliveries = FreeDelivery::where('company_id', $order->company_id)->get()->first();
        $wallet = Wallet::where('company_id', $order->company_id)->get()->first();

        $remainingQuantity = $freeDeliveries->quantity - $order->free_deliveries;
        $walletBalance = $wallet->balance - $order->wallet_amount;

        $freeDeliveries->update([
            'quantity' => $remainingQuantity,
        ]);

        $this->createWalletTransaction($order);
        $this->updateWalletBalance($wallet, $walletBalance);
        $this->updateOrderStatus($order, 2);
    }

    private function createWalletTransaction($order)
    {
        WalletTransaction::create([
            'company_id' => $order->company_id,
            'amount' => $order->wallet_amount,
            'wallet_in' => 0,
        ]);
    }

    private function updateWalletBalance($wallet, $walletBalance)
    {
        $wallet->update([
            'balance' => $walletBalance,
        ]);
    }

    private function updateOrderStatus($order, $orderStatus)
    {
        $order->update([
            'status' => $orderStatus,
        ]);
    }

    private function updateShipmentStatus($order)
    {
        $shipments = $order->shipments()->get();
        foreach ($shipments as $shipment) {
            if ($shipment->status == 1) {
                $shipment->update([
                    'status' => 2,
                    'company_id' => $order->company_id,
                ]);
            } else {
                return false;
            }
        }
        return true;
    }

    private function createInvoice($company, $order)
    {
        $callBackUri = url('/admin/payment?order_id=' . $order->id);
        $callBackUri = str_replace("localhost", "127.0.0.1", $callBackUri);

        $invoiceString = '{"InvoiceValue": "' . $order->id . '",
        "CustomerName": "' . $company->name . '",
        "CustomerBlock": "' . $order->id . '",
        "CustomerStreet": "' . $order->id . '",
        "CustomerHouseBuildingNo": "' . $order->id . '",
        "CustomerCivilId": "' . $order->id . '",
        "CustomerAddress": "' . $order->id . '",
        "CustomerReference": "' . $order->id . '",
        "DisplayCurrencyIsoAlpha": "KWD",
        "CountryCodeId": 1,
        "CustomerMobile": "' . $company->mobile . '",
        "CustomerEmail": "' . $company->email . '",
        "SendInvoiceOption": 2,
        "InvoiceItemsCreate": [{"ProductId":null,
        "ProductName": "Shipments",
        "Quantity": 1,
        "UnitPrice": "' . $order->card_amount . '"}],
        "CallBackUrl": "' . $callBackUri . '",
        "Language": 2,
        "ExpireDate": "' . date("Y-m-d H:i:s", strtotime('+2 hours')) . '",
        "ApiCustomFileds": "string",
        "ErrorUrl": "' . $callBackUri . '"}';

        //$invoiceString = json_encode($invoiceString, true);
        //echo $invoiceString;
        //die;
        return $invoiceString;

    }

    private function makeInvoiceCreateIsoRequest($invoiceString)
    {
        $url = "https://apidemo.myfatoorah.com/ApiInvoices/CreateInvoiceIso";
        $header[] = 'Content-Type: application/json';
        $header[] = 'Accept: application/json';
        $header[] = 'authorization: bearer ' . env('MY_FATOORAH_API_KEY');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $invoiceString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $response_data = curl_exec($ch);

        return $response_data;
    }

    private function makeTransactionRequest($paymentId)
    {
        $header[] = 'Content-Type: application/json';
        $header[] = 'Accept: application/json';
        $header[] = 'authorization: bearer ' . env('MY_FATOORAH_API_KEY');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://apidemo.myfatoorah.com/ApiInvoices/Transaction/" . $paymentId);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $response = json_decode($response, true);
        return $response;
    }

    private function updateOrderOnSuccessfulTransaction($order)
    {
        $order->update([
            'status' => 1,
        ]);
    }

    private function updateOrderOnFailedTransaction($order)
    {
        $order->update([
            'status' => 2,
        ]);
        $shipments = $order->shipments()->get();
        foreach ($shipments as $shipment) {
            $shipment->update([
                'status' => 1,
            ]);
        }
    }

}
