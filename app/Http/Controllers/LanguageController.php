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
        return redirect()->route("/");
    }
}
