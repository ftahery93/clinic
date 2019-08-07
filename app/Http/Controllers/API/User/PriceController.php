<?php

namespace App\Http\Controllers\API\User;

use App\ExceptionCity;
use App\Governorate;
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
     * @SWG\Post(
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
     *        @SWG\Parameter(
     *             name="Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="governorate_id_from",
     *                  type="integer",
     *                  description="Governorate ID from - * Required",
     *                  example=24
     *              ),
     *              @SWG\Property(
     *                  property="governorate_id_to",
     *                  type="integer",
     *                  description="Governorate ID To - * Required",
     *                  example=24
     *              ),
     *              @SWG\Property(
     *                  property="city_id_from",
     *                  type="integer",
     *                  description="City ID from - * Required",
     *                  example=24
     *              ),
     *              @SWG\Property(
     *                  property="city_id_to",
     *                  type="integer",
     *                  description="City ID To - * Required",
     *                  example=24
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getShipmentPrice(Request $request)
    {

        $validator = [
            'governorate_id_from' => 'required|integer|exists:governorates,id',
            'governorate_id_to' => 'required|integer|exists:governorates,id',
            'city_id_from' => 'required|integer|exists:cities,id',
            'city_id_to' => 'required|integer|exists:cities,id',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError != null) {
            return $checkForError;
        }

        $governorate_from = Governorate::find($request->governorate_id_from);
        $governorate_to = Governorate::find($request->governorate_id_to);
        $exceptionCities = ExceptionCity::all();
        $price = 0;

        $fromValueExists = collect($exceptionCities)->where('city_id', $request->city_id_from)->first();

        if ($fromValueExists != null) {
            $price_from = $fromValueExists->price;
        } else {
            $price_from = $governorate_from->price;
        }

        $toValueExists = collect($exceptionCities)->where('city_id', $request->city_id_to)->first();

        if ($toValueExists != null) {
            $price_to = $toValueExists->price;
        } else {
            $price_to = $governorate_to->price;
        }

        if ($price_from >= $price_to) {
            $price = $price_from;
        } else {
            $price = $price_to;
        }

        return response()->json([
            'price' => $price,
        ]);
    }
}
