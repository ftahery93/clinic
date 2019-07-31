<?php
namespace App\Http\Controllers\API\Company;

use App\Company;
use App\FreeDelivery;
use App\Helpers\Notification;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\OneSignalUser;
use App\Order;
use App\Payment;
use App\Utility;
use App\Wallet;
use App\WalletOffer;
use App\WalletTransaction;
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
    public function payOrder(Request $request)
    {
        $order = Order::find($request->order_id);

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
            $callBackUri = $this->createCallBackUriForOrder($order->id);
            $invoiceString = $this->createInvoice($company, $order, $callBackUri);
            $response_data = $this->makeInvoiceCreateIsoRequest($invoiceString);
            $response_data = json_decode($response_data, true);
            $paymentMethods = $response_data['PaymentMethods'];
            $extractedPaymentMethods = $this->extractPaymentMethods($paymentMethods);
            return response()->json([
                'message' => LanguageManagement::getLabel('redirect_to_payment', $this->language),
                'payment_methods' => $extractedPaymentMethods,
            ]
            );
        } else {
            $this->bookOrder($order);
            $this->sendNotificationForAcceptedShipments($order->shipments()->get());
            return response()->json([
                'message' => LanguageManagement::getLabel('order_placed_success', $this->language),
            ]);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/company/addToWallet",
     *         tags={"Company Wallet"},
     *         operationId="addToWallet",
     *         summary="Add to company's wallet",
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
     *             name="Update profile body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="offer_id",
     *                  type="integer",
     *                  description="Wallet offer ID",
     *                  example=34
     *              ),
     *              @SWG\Property(
     *                  property="amount",
     *                  type="double",
     *                  description="Amount to be added",
     *                  example=50.00
     *              ),
     *              @SWG\Property(
     *                  property="isOffer",
     *                  type="boolean",
     *                  description="Amount added to wallet is under offers - *(Required)",
     *                  example=true
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
    public function addToWallet(Request $request)
    {
        $validator = [
            'isOffer' => 'required|boolean',
            'offer_id' => 'required_if:isOffer,true|exists:wallet_offers,id',
            'amount' => 'required_if:isOffer,false',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError != null) {
            return $checkForError;
        }

        $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
        $company = Company::find($request->company_id);

        if ($request->isOffer) {
            $walletOffers = WalletOffer::find($request->offer_id);
            $wallet['card_amount'] = $walletOffers->amount;
        } else {
            $wallet['card_amount'] = $request->amount;
        }
        $request->isOffer = ($request->isOffer) == true ? 1 : 0;
        $request->offer_id = empty($request->offer_id) ? 0 : $request->offer_id;
        $callBackUri = $this->createCallBackUriForWallet($wallet->id, $request->isOffer, $request->company_id, $request->offer_id);
        $invoiceString = $this->createInvoice($company, $wallet, $callBackUri);
        $response_data = $this->makeInvoiceCreateIsoRequest($invoiceString);
        $response_data = json_decode($response_data, true);

        $paymentMethods = $response_data['PaymentMethods'];
        $extractedPaymentMethods = $this->extractPaymentMethods($paymentMethods);
        return response()->json([
            'message' => LanguageManagement::getLabel('redirect_to_payment', $this->language),
            'payment_methods' => $extractedPaymentMethods,
        ]
        );
    }

    public function payment(Request $request)
    {
        $validator = [
            'order_id' => 'required|exists:orders,id',
            'paymentId' => 'required',
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

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
            'payment_gateway' => $response['PaymentGateway'],
            'order_id' => $order->id,
        ]);
        if ($response['TransactionStatus'] == 2) {
            $this->bookOrder($order);
            $this->sendNotificationForAcceptedShipments($order->shipments()->get());
            echo "<input type='hidden' name='is_captured' id='is_captured' value='1'>";
            echo "<input type='hidden' name='payment_id' id='payment_id' value='" . $paymentId . "'>";
        } else {
            $this->updateOrderOnFailedTransaction($order);
            echo "<input type='hidden' name='is_captured' id='is_captured' value='0'>";
            echo "<input type='hidden' name='payment_id' id='payment_id' value='" . $paymentId . "'>";
        }
    }

    public function paymentForWallet(Request $request)
    {
        $paymentId = $request->paymentId;
        $wallet_id = $request->wallet_id;

        $wallet = Wallet::find($wallet_id);

        $response = $this->makeTransactionRequest($paymentId);
        $amount = $response['InvoiceValue'];

        $walletModel["isOffer"] = $request->isOffer;
        $walletModel["offer_id"] = $request->offer_id;
        $walletModel["company_id"] = $request->company_id;
        $walletModel["amount"] = $amount;
        $walletModel["wallet"] = $wallet;

        $payment = Payment::create([
            'reference_id' => $response['ReferenceId'],
            'track_id' => $response['TrackId'],
            'transaction_id' => $response['TransactionId'],
            'payment_id' => $response['PaymentId'],
            'transaction_status' => $response['TransactionStatus'],
            'payment_gateway' => $response['PaymentGateway'],
            'order_id' => 0,
            'wallet_id' => $wallet->id,
        ]);

        if ($response['TransactionStatus'] == 2) {
            $this->addAmountToWallet($walletModel);
            echo "<input type='hidden' name='is_captured' id='is_captured' value='1'>";
            echo "<input type='hidden' name='payment_id' id='payment_id' value='" . $paymentId . "'>";
        } else {
            echo "<input type='hidden' name='is_captured' id='is_captured' value='0'>";
            echo "<input type='hidden' name='payment_id' id='payment_id' value='" . $paymentId . "'>";
        }
    }

    private function addAmountToWallet($walletModel)
    {
        if ($walletModel['isOffer'] == "1") {
            $walletOffers = WalletOffer::find($walletModel['offer_id']);
            $freeDeliveries = FreeDelivery::where('company_id', $walletModel['company_id'])->get()->first();
            $quantity = $freeDeliveries->quantity;
            $quantity = $quantity + $walletOffers->free_deliveries;

            $freeDeliveries->update([
                'quantity' => $quantity,
            ]);

            WalletTransaction::create([
                'company_id' => $walletModel['company_id'],
                'amount' => $walletOffers->amount,
                'wallet_in' => 1,
            ]);

            $balance = $walletModel['wallet']->balance + $walletOffers->amount;
        } else {
            $balance = $walletModel['wallet']->balance + $walletModel['amount'];
            WalletTransaction::create([
                'company_id' => $walletModel['company_id'],
                'amount' => $walletModel['amount'],
                'wallet_in' => 1,
            ]);
        }
        $walletModel['wallet']->update([
            'balance' => $balance,
        ]);

        // return response()->json([
        //     'id' => $wallet->id,
        //     'balance' => $wallet->balance,
        // ]);
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
        $this->updateOrderOnSuccessfulTransaction($order);
    }
    private function createWalletTransaction($order)
    {
        WalletTransaction::create([
            'company_id' => $order->company_id,
            'amount' => $order->wallet_amount,
            'wallet_in' => 0,
            'order_id' => $order->id,
        ]);
    }
    private function updateWalletBalance($wallet, $walletBalance)
    {
        $wallet->update([
            'balance' => $walletBalance,
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

    private function createCallBackUriForOrder($id)
    {
        $callBackUri = url('/admin/payment?order_id=' . $id);
        $callBackUri = str_replace("localhost", "127.0.0.1", $callBackUri);
        return $callBackUri;
    }

    private function createCallBackUriForWallet($wallet_id, $isOffer = 0, $company_id, $offerId = 0)
    {
        $callBackUri = url('/admin/paymentForWallet?wallet_id=' . $wallet_id . '&isOffer=' . $isOffer . '&offer_id=' . $offerId . '&company_id=' . $company_id);
        $callBackUri = str_replace("localhost", "127.0.0.1", $callBackUri);
        return $callBackUri;
    }

    private function createInvoice($company, $order, $callBackUri)
    {
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

    private function sendNotificationForAcceptedShipments($shipments)
    {
        foreach ($shipments as $shipment) {
            $oneSignalUser = OneSignalUser::where('user_id', $shipment->user_id)->get();
            $company = Company::find($shipment->company_id);
            foreach ($oneSignalUser as $eachOneSignalUser) {
                $playerIds[] = $eachOneSignalUser->player_id;
            }
            $message_en = "Shipment #" . $shipment->id . " Accepted by " . $company->name;
            $message_ar = "شحنة #" . $shipment->id . " قبلها " . $company->name;
            Notification::sendNotificationToMultipleForUser($playerIds, $message_en, $message_ar);
        }
    }
}
