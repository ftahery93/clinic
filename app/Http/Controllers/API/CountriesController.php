<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use Helper;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    public $language;
    public $successStatus = 200;

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
       $this->middleware('switch.lang');

       //middleware to check the mobile application version before proceeding with incoming request
       $this->middleware('app.version');

        //get the language from the HTTP header
        $this->language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : "en";  
    }

    /**
     * Fetch the list of countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountries()
    {
       // Get List of Categories, Just Id & Name
       $Country = Country::get();
       if(count($Country) > 0){
            $Country = $Country->map(function ($country) {
                $Country['id'] = $country->id;
                $Country['name'] = ($this->language == "ar") ? $country->title_ar : $country->title_en;
                return $Country;
            });
            return response()->json($Country, $this->successStatus);
       } else {
            return response()->json(['error' => trans('mobileLang.countryNotFound')], 404);
       }
    }

    /**
     * Fetch the list of trend countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTrendCountries()
    {
       // Get List of Trend Countries
       $Country = Country::paginate(5);
       $next_page = Helper::getParam($Country->nextPageUrl()); 
       $total = $Country->total(); 
       if(count($Country) > 0){
            $Country = $Country->map(function ($country) {
                $Country['id'] = $country->id;
                $Country['name'] = ($this->language == "ar") ? $country->title_ar : $country->title_en;
                $Country['photo'] = !empty($country->photo) ? $country->photo : "";
                return $Country;
            });
            $Countries['countries'] = $Country;
            $Countries['next_page'] = !empty($next_page) ? $next_page : "";
            $Countries['total'] = $total;
        return response()->json($Countries, $this->successStatus);
       } else {
            return response()->json(['error' => trans('mobileLang.noCountryFound')], 404);
       }
    }

    /**
     * Search the list of trend countries by query string.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return $request->get('query');
       // Get List of Countries from Search Query 
       if($this->language == "ar") {
            $Country = Country::where('title_ar','LIKE','%'.$query.'%')->paginate(20);
       } else {
            $Country = Country::where('title_en','LIKE','%'.$query.'%')->paginate(20);
       }
       $next_page = Helper::getParam($Country->nextPageUrl()); 
       $total = $Country->total(); 
       if(count($Country) > 0){
            $Country = $Country->map(function ($country) {
                $Country['id'] = $country->id;
                $Country['name'] = ($this->language == "ar") ? $country->title_ar : $country->title_en;
                $Country['photo'] = !empty($country->photo) ? $country->photo : "";
                return $Country;
            });
            $Countries['countries'] = $Country;
            $Countries['next_page'] = !empty($next_page) ? $next_page : "";
            $Countries['total'] = $total;
        return response()->json($Countries, $this->successStatus);
       } else {
            return response()->json(['error' => trans('mobileLang.noCountryFound')], 404);
       }
    }

}
