<?php

namespace App\Http\Controllers\API\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utility;
use App;
use App\City;
use App\ExceptionCity;
use App\Helpers\Common;
use App\Http\Controllers\API\User\ShipmentController;

class CommonController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
        App::setlocale($this->language);
    }

    /**
     *
     * @SWG\Post(
     *         path="/user/getDeliveryPrice",
     *         tags={"Pricing"},
     *         operationId="getDeliveryPrice",
     *         summary="Get Delivery prices",
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
     *             name="Registration Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="from_cityid",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1018
     *              ),
     *              @SWG\Property(
     *                  property="to_cityid",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1080
     *              ),
     *          ),
     *        ),
     *                 
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getDeliveryPrice(Request $request)
    {
        $price = $this->getPrice($request);
        return response()->json([
            'price' => $price
        ]);
    }

    /**
     *
     * @SWG\Post(
     *         path="/company/getDeliveryPrice",
     *         tags={"Pricing"},
     *         operationId="getDeliveryPriceForCompany",
     *         summary="Get Delivery prices",
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
     *             name="Registration Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="from_cityid",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1018
     *              ),
     *              @SWG\Property(
     *                  property="to_cityid",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1080
     *              ),
     *          ),
     *        ),
     *                 
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getDeliveryPriceForCompany(Request $request)
    {
        $price = $this->getPrice($request);
        return response()->json([
            'price' => $price
        ]);
    }

    public function getPrice($request)
    {
        $validator = [
            'from_cityid' => 'required|exists:cities,id',
            'to_cityid' => 'required|exists:cities,id',
        ];
        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }
        $exceptionCities = ExceptionCity::all();
        $fromCity = City::find($request->from_cityid);
        $toCity = City::find($request->to_cityid);
        $price = Common::getDeliveryPrice($exceptionCities, $fromCity->governorate_id, $toCity->governorate_id, $request->from_cityid, $request->to_cityid);
        return $price;
    }
}
