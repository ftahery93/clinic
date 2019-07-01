<?php

namespace App\Http\Controllers\API;

use DB;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SettingsController extends Controller
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
     * Get list of configuration from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConfiguration()
    {
        // Get List of Categories
        $Setting = Setting::first();
        if(count($Setting) > 0){ 
          return response()->json(collect($Setting)->only('min_options','max_options'), $this->successStatus);
        } else {
          return response()->json(['error' => trans('mobileLang.configNotFound')], 404);
        }
    }

    /**
     * Get durations from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDurations()
    {
        // Get List of Durations
        $Duration = DB::table('poll_durations')->select('id','duration','is_hour')->get()->keyBy('id');
        if(count($Duration) > 0){ 
            foreach($Duration as $key => $value){
                $duration = 0;
                foreach($value as $k => $v){
                    if($k == "duration") $duration = $v;
                    if($k == "is_hour" && $v == 1){
                        if($duration == 1){
                            $durations[$key]['id'] = $key;
                            $durations[$key]['duration'] = $duration." ".trans('mobileLang.durationHourSingular');
                        } else {
                            $durations[$key]['id'] = $key;
                            $durations[$key]['duration'] = $duration." ".trans('mobileLang.durationHourPlural');
                        }
                    } 
                    if($k == "is_hour" && $v == 0){
                        if($duration == 1){
                            $durations[$key]['id'] = $key;
                            $durations[$key]['duration'] = $duration." ".trans('mobileLang.durationDaySingular');
                        } else {
                            $durations[$key]['id'] = $key;
                            $durations[$key]['duration'] = $duration." ".trans('mobileLang.durationDayPlural');
                        }
                    } 
                }
            }
            return response()->json(array_values($durations), $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.durationNotFound')], 404);
        }
    }

}
