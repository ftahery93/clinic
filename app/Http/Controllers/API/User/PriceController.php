<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\API\Price;
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
     *         path="/~tvavisa/masafah/public/api/user/getShipmentPrice",
     *         tags={"User Shipment"},
     *         operationId="getShipmentPrice",
     *         summary="Get Shipment price",
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
    public function getShipmentPrice()
    {
        $price = Price::find(1);
        return response()->json([
            'price' => $price->price,
        ]);
    }
}
