<?php

namespace App\Http\Middleware;


use App;
use Closure;
use App\Setting;

class VerifyAppVersion
{
    /**
     * Verify mobile application version from incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //If maintenance mode is enable, don't allow incoming API requests and send JSON formatted response
        $language = !empty($request->server('HTTP_ACCEPT_LANGUAGE')) ? $request->server('HTTP_ACCEPT_LANGUAGE') : "en";  
        $Settings = Setting::find(1);
        if($Settings->maintenance_mode == 1){
            if($language == "ar"){
                $message = $Settings->maintenance_message_ar;
            } else {
                $message = $Settings->maintenance_message_en;
            }
            return response()->json(['error' => $message], 401);
        } else {
            if($request->server('HTTP_APP_VERSION')){
                $type = explode("-",$request->server('HTTP_APP_VERSION'));
                switch($type[0]){
                    case "iOS":
                        if ($Settings->ios_version != $type[1]) {
                            return response()->json(['error' => trans('auth.iosAppUpdateMsg')], 404);
                        }    
                        break;
                    case "Android":
                        if ($Settings->android_version != $type[1]) {
                            return response()->json(['error' => trans('auth.androidAppUpdateMsg')], 404);
                        }    
                        break;
                    default: 
                    return response()->json(['error' => trans('auth.commonAppUpdateMsg')], 404);
                }
            } else {
                return response()->json(['error' => trans('auth.appversionMissing')], 417);
            }
        }
        return $next($request);
    }
}