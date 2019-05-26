<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\API\WalletIn;
use App\Models\API\WalletOffer;
use App\Models\API\WalletOut;
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
        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        if ($wallet != null) {
            WalletOut::create([
                'company_id' => $request->id,
                'amount' => $request->amount,
            ]);
            $balance = $wallet->balance + $request->amount;
            $wallet->update([
                'balance' => $balance,
            ]);
        }

    }

    public function deductFromWallet(Request $request)
    {
        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        if ($wallet != null) {
            WalletIn::create([
                'company_id' => $request->id,
                'amount' => $request->amount,
            ]);
            $balance = $wallet->balance - $request->amount;
            $wallet->update([
                'balance' => $balance,
            ]);
        }
    }

    public function getWalletOffers(Request $request)
    {
        $walletOffers = WalletOffer::all();
        return collect($walletOffers);
    }
}
