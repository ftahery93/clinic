<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
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
        $this->language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];  
    }

    /**
     * Fetch the list of polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountries()
    {
       // Get List of Categories
       $Country = Country::all();
       if(count($Country) > 0){
            if($this->language == "ar"){
                return response()->json(collect($Country)->pluck('title_ar','id'), $this->successStatus);
            } else {
                return response()->json(collect($Country)->pluck('title_en','id'), $this->successStatus);
            }
       } else {
            return response()->json(['error' => trans('mobileLang.countryNotFound')], 404);
       }
    }

}
