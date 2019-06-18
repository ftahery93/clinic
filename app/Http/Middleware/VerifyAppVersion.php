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
        if($request->server('HTTP_APP_VERSION')){
            $type = explode("-",$request->server('HTTP_APP_VERSION'));
            switch($type[0]){
                case "iOS":
                    if (!Setting::where('ios_version', '=', $type[1])->exists()) {
                        return response()->json(['error' => trans('auth.iosAppUpdateMsg')], 404);
                    }    
                    break;
                case "Android":
                    if (!Setting::where('android_version', '=', $type[1])->exists()) {
                        return response()->json(['error' => trans('auth.androidAppUpdateMsg')], 404);
                    }    
                    break;
                default: 
                return response()->json(['error' => trans('auth.commonAppUpdateMsg')], 404);
            }
        } else {
            return response()->json(['error' => trans('auth.appversionMissing')], 417);
        }
        return $next($request);
    }
}
