<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Company;
use App\Models\API\FreeDelivery;
use App\Models\API\Order;
use App\Models\API\Wallet;
use App\Models\API\WalletTransaction;
use App\Utility;
use function GuzzleHttp\json_decode;
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

        $this->updateShipmentStatus($order, $request);

        if ($order->card_amount > 0) {
            $company = Company::find($request->company_id);
            $invoiceString = $this->createInvoice($company, $order);
            $response_data = $this->makeInvoiceCreateIsoRequest($invoiceString);
            echo $response_data;
            die;
            $response_data = json_decode($response_data, true);

            $paymentMethods = $response_data['PaymentMethods'];
            $extractedPaymentMethods = $this->extractPaymentMethods($paymentMethods);
            return response()->json($extractedPaymentMethods);

        } else {
            $freeDeliveries = FreeDelivery::where('company_id', $request->company_id)->get()->first();
            $wallet = Wallet::where('company_id', $request->company_id)->get()->first();

            $remainingQuantity = $freeDeliveries->quantity - $order->free_deliveries;
            $walletBalance = $wallet->balance - $order->wallet_amount;

            $freeDeliveries->update([
                'quantity' => $remainingQuantity,
            ]);

            $this->createWalletTransaction($request);
            $this->updateWalletBalance($wallet, $walletBalance);
            $this->updateOrderStatus($order, 2);

            return response()->json([
                'message' => LanguageManagement::getLabel('order_placed_success', $this->language),
            ]);
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

    private function createWalletTransaction($request)
    {
        WalletTransaction::create([
            'company_id' => $request->company_id,
            'amount' => $$request->wallet_amount,
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

    private function updateShipmentStatus($order, $request)
    {
        $shipments = $order->shipments()->get();
        foreach ($shipments as $shipment) {
            $shipment->update([
                'status' => 2,
                'company_id' => $request->company_id,
            ]);
        }
    }

    private function createInvoice($company, $order)
    {
        $callBackUri = url('/public/admin/payment?id=' . $order->id);

        $invoiceString = "{\"InvoiceValue\": \"" . $order->id . "\",";
        $invoiceString .= "\"CustomerName\": \"" . $company->name . "\",";
        $invoiceString .= "\"CustomerBlock\": \"" . $order->id . "\",";
        $invoiceString .= "\"CustomerStreet\": \"" . $order->id . "\",";
        $invoiceString .= "\"CustomerHouseBuildingNo\": \"" . $order->id . "\",";
        $invoiceString .= "\"CustomerCivilId\": \"" . $order->id . "\",";
        $invoiceString .= "\"CustomerAddress\": \"" . $order->id . "\",";
        $invoiceString .= "\"CustomerReference\": \"" . $order->id . "\",";
        $invoiceString .= "\"DisplayCurrencyIsoAlpha\": \"KWD\",";
        $invoiceString .= "\"CountryCodeId\": 1,";
        $invoiceString .= "\"CustomerMobile\": \"" . $company->mobile . "\",";
        $invoiceString .= "\"CustomerEmail\": \"" . $order->email . "\",";
        $invoiceString .= "\"SendInvoiceOption\": 2,";
        $invoiceString .= "\"InvoiceItemsCreate\": [";

        $invoiceString .= "{\"ProductId\": " . $order->id . ",";
        $invoiceString .= "\"ProductName\": \"" . $order->id . "\",";
        $invoiceString .= "\"Quantity\": 1,";
        $invoiceString .= "\"UnitPrice\": \"" . $order->cart_amount . "\"}";

        $invoiceString .= "],";
        $invoiceString .= "\"CallBackUrl\": \"" . $callBackUri . "\",";
        $invoiceString .= "\"Language\": 2,";
        $invoiceString .= "\"ExpireDate\": \"" . date("Y-m-d H:i:s", strtotime('+2 hours')) . "\",";
        $invoiceString .= "\"ApiCustomFileds\": \"string\",";
        $invoiceString .= "\"ErrorUrl\": \"" . $callBackUri . "\"}";

        $invoiceString = json_encode($invoiceString, true);

        return $invoiceString;

    }

    private function makeInvoiceCreateIsoRequest($invoiceString)
    {
        $url = "https://apikw.myfatoorah.com/Invoices/CreateInvoiceIso";
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
}
