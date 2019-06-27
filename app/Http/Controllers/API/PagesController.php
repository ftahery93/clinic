<?php

namespace App\Http\Controllers\API;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
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
     * Fetch page details
     *
     * @return \Illuminate\Http\Response
     */
    public function getPage($name)
    {
        $Page = Page::where('name','=',$name)->where('status','=','1')->first();
        if(!empty($Page)){
            $Pages['name'] = ($this->language == "ar") ? $Page->title_ar : $Page->title_en;
            $Pages['content'] = ($this->language == "ar") ? $Page->details_ar : $Page->details_en;
            return response()->json($Pages, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pageNotFound')], 404);
        }
    }

}
