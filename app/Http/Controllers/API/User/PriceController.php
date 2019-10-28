<?php

namespace App\Http\Controllers\API\User;

use App\Address;
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
     *                  property="address_from",
     *                  type="integer",
     *                  description="User source address",
     *                  example=24
     *              ),
     *              @SWG\Property(
     *                  property="address_to",
     *                  type="string",
     *                  description="Address to list",
     *                  example="1,2,3,4"
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
            'address_from' => 'required|integer|exists:addresses,id',
            'address_to' => 'required|array|min:1',
            'address_to.*' => 'numeric',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError != null) {
            return $checkForError;
        }

        $address_from = Address::find($request->address_from);
        $governorate_from = Governorate::find($address_from->governorate_id);
        $exceptionCities = ExceptionCity::all();
        $price = 0;

        $fromValueExists = collect($exceptionCities)->where('city_id', $address_from->city_id)->first();

        if ($fromValueExists != null) {
            $price_from = $fromValueExists->price;
        } else {
            $price_from = $governorate_from->price;
        }

        $price = $this->calculateShipmentPrice($request->address_to, $exceptionCities, $price_from);

        return response()->json([
            'price' => $price,
        ]);
    }

    private function calculateShipmentPrice($address_to_ids, $exceptionCities, $price_from)
    {
        $price = 0;
        foreach ($address_to_ids as $address_id) {
            $address_to = Address::find($address_id);
            $governorate_to = Governorate::find($address_to->governorate_id);
            $toValueExists = collect($exceptionCities)->where('city_id', $address_to->city_id)->first();
            if ($toValueExists != null) {
                $price_to = $toValueExists->price;
            } else {
                $price_to = $governorate_to->price;
            }

            if ($price_from >= $price_to) {
                $price = $price + $price_from;
            } else {
                $price = $price + $price_to;
            }
        }
        return $price;
    }
}
