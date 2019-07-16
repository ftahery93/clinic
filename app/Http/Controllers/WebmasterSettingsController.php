<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\WebmasterSetting;
use App\Http\Requests;
use Illuminate\Http\Request;

class WebmasterSettingsController extends Controller
{
    // Define Default Settings ID
    private $id = 1;

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    public function edit()
    {
        $id = $this->getId();
        $WebmasterSetting = WebmasterSetting::find($id);
        if ($WebmasterSetting!=null) {
            return view("backEnd.webmaster.settings", compact("WebmasterSetting"));
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
    public function update(Request $request)
    {
        $id = $this->getId();
        $WebmasterSetting = WebmasterSetting::find($id);
        if (count($WebmasterSetting) > 0) {
            $WebmasterSetting->ar_box_status = $request->ar_box_status;
            $WebmasterSetting->en_box_status = $request->en_box_status;
            $WebmasterSetting->analytics_status = $request->analytics_status;
            $WebmasterSetting->polls_status = $request->polls_status;
            $WebmasterSetting->categories_status = $request->categories_status;
            $WebmasterSetting->appusers_status = $request->appusers_status;
            $WebmasterSetting->countries_status = $request->countries_status;
            $WebmasterSetting->notifications_status = $request->notifications_status;
            $WebmasterSetting->settings_status = $request->settings_status;
            $WebmasterSetting->updated_by =  Auth::user()->id;
            $WebmasterSetting->save();
            return redirect()->action('WebmasterSettingsController@edit')->with('doneMessage',
                trans('backLang.saveDone'));
        } else {
            return redirect()->route('adminHome');
        }
    }
}