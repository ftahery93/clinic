<?php

namespace App\Http\Controllers\API\User;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->language = $request->header('Accept-Language');
        App::setLocale($this->language);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getCountries",
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
        return response()->json($countries);
        // $response = [];
        // if ($this->language == 'ar') {
        //     foreach ($countries as $country) {
        //         $country["name"] = $country["name_ar"];
        //         $response[] = collect($country);
        //     }
        // } else {
        //     foreach ($countries as $country) {
        //         $country["name"] = $country["name_en"];
        //         $response[] = collect($country);
        //     }
        // }
        // return $response;
    }
}
