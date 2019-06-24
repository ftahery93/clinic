<?php

namespace App\Http\Controllers;

use App;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class LanguageController extends Controller
{
    public function index()
    {

        if (!\Session::has('locale')) {
            \Session::put('locale', Input::get('locale'));
        } else {
            \Session::put('locale', Input::get('locale'));
        }
        return redirect()->back();

    }

    public function change($lang)
    {
        \Session::put('locale', $lang);
        return redirect()->route("Home");

    }

    public function getList(){

        //Languages
        $Languages = [
            'en' => "English",
            'ar' => "Arabic"
        ];

        //Template you willing to modify
        $LanguagesTemp = [
            'backLang' => "Backend",
            'mobileLang' => "Mobile Application"
        ];

        return view("backEnd.languages", compact("Languages","LanguagesTemp"));
    }

    public function showLanguages(){

        return array();

        $resource =  base_path('resources')."/lang/en/auth.php";

        // Get the contents of the JSON file 
        $Languages = include $resource;
        
        return $Languages;
    }
}
