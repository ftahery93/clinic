<?php

namespace App\Http\Controllers;

use App;
use Session;
use Illuminate\Http\Request;
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
        $Languages = ['en' => "English",'ar' => "Arabic"];
        $LanguagesTemp = ['backLang' => "Backend",'mobileLang' => "Mobile Application"];

        return view("backEnd.languages", compact("Languages","LanguagesTemp"));
    }

    public function showLanguages(Request $request){

        $lang = $request->language_id;
        $key = $request->language_key;
        $resource =  base_path('resources')."/lang/{$lang}/{$key}.php";

        if(file_exists($resource)){
            // Get the contents of the array file 
            $Languages = include $resource;
            $Languages = collect($Languages);
            
            return view("backEnd.languages.list", compact("Languages"));
        } else {
            abort('404');
        }
    }
}
