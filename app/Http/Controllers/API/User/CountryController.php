<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\API\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/~tvavisa/masafah/public/api/user/getCountries",
     *         tags={"Countries"},
     *         operationId="getCountries",
     *         summary="Get all available countries",
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
    public function getCountries()
    {
        $countries = Country::all();
        $response = [];
        if ($this->language == 'ar') {
            foreach ($countries as $country) {
                $country["name"] = $country["name_ar"];
                $response[] = collect($country);
            }
        } else {
            foreach ($countries as $country) {
                $country["name"] = $country["name_en"];
                $response[] = collect($country);
            }
        }
        return $response;
    }
}
