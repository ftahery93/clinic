<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\API\FreeDelivery;
use App\Models\API\Wallet;
use App\Models\API\WalletOffer;
use App\Models\API\WalletTransaction;
use App\Utility;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    public function addToWallet(Request $request)
    {
        $validator = [
            'wallet_id' => 'required',
            'amount' => 'required',
            'isOffer' => 'required|boolean',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError != null) {
            return $checkForError;
        }

        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        if ($wallet != null) {
            WalletTransaction::create([
                'company_id' => $request->id,
                'amount' => $request->amount,
                'type' => true,
            ]);

            $balance = $wallet->balance + $request->amount;
            $wallet->update([
                'balance' => $balance,
            ]);

            if ($request->isOffer) {
                $walletOffers = WalletOffer::where('amount', $request->amount)->get()->first();
                if ($walletOffers != null) {
                    $freeDeliveries = FreeDelivery::where('company_id', $request->id)->get()->first();
                    if ($freeDeliveries != null) {
                        $quantity = $freeDeliveries->quantity;
                        $quantity += $walletOffers->free_deliveries;
                        $freeDeliveries->update([
                            'quantity' => $quantity,
                        ]);
                    } else {
                        FreeDelivery::create([
                            'company_id' => $request->id,
                            'quantity' => $walletOffers->free_deliveries,
                        ]);
                    }
                }
            }

            return response()->json([
                'id' => $wallet->id,
                'balance' => $wallet->balance,
            ]);
        } else {
            return response()->json([], 404);
        }

    }

    public function deductFromWallet(Request $request)
    {
        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        if ($wallet != null) {
            WalletTransaction::create([
                'company_id' => $request->id,
                'amount' => $request->amount,
                'type' => false,
            ]);
            $balance = $wallet->balance - $request->amount;
            $wallet->update([
                'balance' => $balance,
            ]);
        }
    }

    public function getWalletOffers()
    {
        $walletOffers = WalletOffer::all();
        return collect($walletOffers);
    }

    public function getWalletDetails(Request $request)
    {
        $validator = [
            'wallet_id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        $walletTransactions = WalletTransaction::where('company_id', $request->id)->get();
        $transactionDetails = [];
        if ($walletTransactions != null) {
            foreach ($walletTransactions as $walletTransaction) {
                $details = [];
                $details["amount"] = $walletTransaction->amount;
                $details["in"] = $walletTransaction->type;
                $transactionDetails[] = $details;
            }
        }

        $freeDeliveries = FreeDelivery::where('company_id', $request->id)->get()->first();

        return response()->json([
            'wallet_balance' => $wallet->balance,
            'transactionDetails' => $transactionDetails,
            'free_deliveries' => $freeDeliveries->quantity,
        ]);
    }
}
