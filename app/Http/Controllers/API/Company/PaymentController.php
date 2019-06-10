<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\API\FreeDelivery;
use App\Models\API\Wallet;
use App\Utility;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/company/getPaymentOptions",
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
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getPaymentOptions(Request $request)
    {
        $wallet = Wallet::where('company_id', $request->id)->get()->first();
        $freeDeliveries = FreeDelivery::where('company_id', $request->id)->get()->first();
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
}
