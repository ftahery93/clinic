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
        //$this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/company/addToWallet",
     *         tags={"Company Wallet"},
     *         operationId="addToWallet",
     *         summary="Add to company's wallet",
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
     *                  property="wallet_id",
     *                  type="integer",
     *                  description="Company Wallet ID - *(Required)",
     *                  example=34
     *              ),
     *              @SWG\Property(
     *                  property="amount",
     *                  type="double",
     *                  description="Amount to be added - *(Required)",
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
            'wallet_id' => 'required',
            'amount' => 'required',
            'isOffer' => 'required|boolean',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError != null) {
            return $checkForError;
        }

        $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
        if ($wallet != null) {
            WalletTransaction::create([
                'company_id' => $request->company_id,
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
                    $freeDeliveries = FreeDelivery::where('company_id', $request->company_id)->get()->first();
                    if ($freeDeliveries != null) {
                        $quantity = $freeDeliveries->quantity;
                        $quantity += $walletOffers->free_deliveries;
                        $freeDeliveries->update([
                            'quantity' => $quantity,
                        ]);
                    } else {
                        FreeDelivery::create([
                            'company_id' => $request->company_id,
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
    /*
    public function deductFromWallet(Request $request)
    {
    $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
    if ($wallet != null) {
    WalletTransaction::create([
    'company_id' => $request->company_id,
    'amount' => $request->amount,
    'type' => false,
    ]);
    $balance = $wallet->balance - $request->amount;
    $wallet->update([
    'balance' => $balance,
    ]);
    }
    }
     */

    /**
     *
     * @SWG\Get(
     *         path="/~tvavisa/masafah/public/api/company/getWalletOffers",
     *         tags={"Company Wallet"},
     *         operationId="getWalletOffers",
     *         summary="Get Wallet offers",
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
    public function getWalletOffers()
    {
        $walletOffers = WalletOffer::all();
        return collect($walletOffers);
    }

/**
 *
 * @SWG\Get(
 *         path="/~tvavisa/masafah/public/api/company/getWalletDetails",
 *         tags={"Company Wallet"},
 *         operationId="getWalletDetails",
 *         summary="Get Wallet Details",
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
    public function getWalletDetails(Request $request)
    {
        $wallet = Wallet::where('company_id', $request->company_id)->get()->first();
        $walletTransactions = WalletTransaction::where('company_id', $request->company_id)->get();
        $transactionDetails = [];
        if ($walletTransactions != null) {
            foreach ($walletTransactions as $walletTransaction) {
                $details = [];
                $details["amount"] = $walletTransaction->amount;
                $details["in"] = $walletTransaction->type;
                $transactionDetails[] = $details;
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
