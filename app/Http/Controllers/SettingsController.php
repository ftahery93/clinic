<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Redirect;
use App\Price;
use App\Setting;
use App\Commission;
use App\Http\Requests;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Define Default Settings ID
    private $id = 1;

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    // Edit Settings
    public function edit()
    {
        $id = $this->getId();
        $Setting = Setting::find($id);
        if (count($Setting) > 0) {
            return view("backend.settings.settings", compact("Setting"));
        } else {
            return redirect()->route('adminHome');
        }
    }

    // Show Commission settings
    public function showCommission()
    {
        $Commission = Commission::find(1);
        if (count($Commission) > 0) {
            return view("backend.commissions", compact("Commission"));
        } else {
            return redirect()->route('adminHome');
        }
    }

    // Update Commission settings
    public function updateCommission(Request $request)
    {
        $Commission = Commission::find(1);
        if (count($Commission) > 0) {
            $Commission->percentage = $request->percentage;
            $Commission->save();
            return redirect()->action('SettingsController@showCommission')->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->route('adminHome');
        }
    }

    // Show Price settings
    public function showPrice()
    {
        $Price = Price::find(1);
        if (count($Price) > 0) {
            return view("backend.prices", compact("Price"));
        } else {
            return redirect()->route('adminHome');
        }
    }

    // Update Price settings
    public function updatePrice(Request $request)
    {
        $Price = Price::find(1);
        if (count($Price) > 0) {
            $Price->price = $request->price;
            $Price->save();
            return redirect()->action('SettingsController@showPrice')->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->route('adminHome');
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id = 1 for default settings
     * @return \Illuminate\Http\Response
     */
    public function updateSiteInfo(Request $request)
    {
        //
        $id = $this->getId();
        $Setting = Setting::find($id);
        if (count($Setting) > 0) {
            $Setting->site_url = $request->site_url;
            $Setting->site_title_en = $request->site_title_en;
            $Setting->site_title_ar = $request->site_title_ar;
            $Setting->updated_by = Auth::user()->id;
            $Setting->save();
            return redirect()->action('SettingsController@edit')
                ->with('doneMessage', trans('backend.saveDone'))
                ->with('infoTab', 'active');
        } else {
            return redirect()->route('adminHome');
        }
    }
}
