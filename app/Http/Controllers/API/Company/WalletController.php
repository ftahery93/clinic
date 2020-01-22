<?php

namespace App\Http\Controllers\API\Company;

use App\FreeDelivery;
use App\Http\Controllers\Controller;
use App\Utility;
use App\Wallet;
use App\WalletOffer;
use App\WalletTransaction;
use Illuminate\Http\Request;

class WalletController extends Controller
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
     *         path="/company/getWalletOffers",
     *         tags={"Company Wallet"},
     *         operationId="getWalletOffers",
     *         summary="Get Wallet offers",
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
    public function getWalletOffers()
    {
        $walletOffers = WalletOffer::all();
        return collect($walletOffers);
    }

/**
 *
 * @SWG\Get(
 *         path="/company/getWalletDetails",
 *         tags={"Company Wallet"},
 *         operationId="getWalletDetails",
 *         summary="Get Wallet Details",
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
    public function getWalletDetails(Request $request)
    {
        $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
        $walletTransactions = WalletTransaction::where('company_id', $request->company_id)->orderBy('created_at', 'DESC')->get();
        $transactionDetails = [];
        if ($walletTransactions != null) {
            foreach ($walletTransactions as $walletTransaction) {
                $transactionDetails[] = $walletTransaction;
            }
        }

        $freeDeliveries = FreeDelivery::where('company_id', $request->company_id)->get()->first();

        return response()->json([
            'wallet_balance' => $wallet->balance,
            'transactionDetails' => $transactionDetails,
            'free_deliveries' => $freeDeliveries->quantity,
        ]);
    }
}
