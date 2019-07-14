<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function payment(Request $request)
    {
        $paymentId = $request->paymentId;
        $orderId = $request->id;

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

        if ($response['TransactionStatus'] == 2) {
            return response()->json([
                'message' => LanguageManagement::getLabel('payment_success', 'en'),
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('payment_failed', 'en'),
            ]);
        }

    }
}
