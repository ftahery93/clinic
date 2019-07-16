<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Price;
use App\Utility;
use Illuminate\Http\Request;

class PriceController extends Controller
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
     *         path="/user/getShipmentPrice",
     *         tags={"User Shipment"},
     *         operationId="getShipmentPrice",
     *         summary="Get Shipment price",
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
    public function getShipmentPrice()
    {
        $price = Price::find(1);
        return response()->json([
            'price' => $price->price,
        ]);
    }
}
