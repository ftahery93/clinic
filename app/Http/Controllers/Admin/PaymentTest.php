<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentTest extends Controller
{
    public function checkPaymentStatus($id, $payID, Request $request)
    {
        echo "Yes I have reached here";
        echo "This is the ID and Payment ID" . $id . " " . $payID;
    }

    public function knetTest(Request $request)
    {
        $paymentId = $request->paymentId;

        $header[] = 'Content-Type: application/json';
        $header[] = 'Accept: application/json';
        $header[] = 'authorization: bearer kAsZufJJ7bbv1IuI6GxyWLD3QavWNYXChIPxA_hsiAztBsajRjlYXauRTW4-b5TiZVMyMQhNTuM2vovvH_4PieArlEqy2_1JRBIQf9Cn2QnJNkIOmUXiZdqLNacGPpDtjotOd0jWvDOFknp9OTVYfJnosuat21SPUdCweefE08qiuTRzgg6xjnfc1ax-qiw8ApRkJoFrp4IuFgdGwZKtoSI7q-qQ7DQvj1d2ZmcFo-IS9tfRrHVTt72zW9OyDeZiO5OsCdO9AC7AGI5ZGj_NTXdiGxf7l0vWS-2ppGRA-uJjY0zGpIQWCzOp843VyBVeOjYwcJgWvNRb4sXO5Iqv7YjL4JROeMCNE1x93x6XU-CnvK-yDdGA6mz1q1736zm2F9WcVeSpuha9VDU88GIL8KTai4xXj4vLaaHIy2sZcMozfKZJtzR-PY4o_aSO6AqQ2xEYoei1NYaEpuQfYmDhaLpylDgN9T1nZSh_-CmIFy8wfLmrJjEW3KZYtUcufQEBpdKEZ5vdWG9qLLuk-JtS9Frr4MrIT5yNr17-TghQxeBPrFuY5yXoJ_2HPqEdr6_tnRMweH-Qedg_C-sV4-riRI6HcfeFRgdxQPiYGu_XcyjFgr1TgNN-UdN1kLfilp-qO_VAxw';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://apidemo.myfatoorah.com/ApiInvoices/Transaction/" . $paymentId);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, false);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $response = json_decode($response, true);
        echo $response['TransactionStatus'];
        //return response()->json($response);

        //

        //echo "Transaction status => " . $response->TransactionStatus;
    }
}
