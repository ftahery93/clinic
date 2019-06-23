<?php

namespace App\Http\Middleware;

use Closure;
use App;
use App\Setting;

class MaintenanceMode
{
    /**
     * Handle an incoming request from api route.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //If maintenance mode is enable, don't allow incoming API requests and send JSON formatted response
        $language = !empty($request->server('HTTP_ACCEPT_LANGUAGE')) ? $request->server('HTTP_ACCEPT_LANGUAGE') : "en";  
        if (Setting::where('maintenance_mode', '=', '1')->exists()) {
            $Setting = Setting::where('maintenance_mode', '=', '1')->first();
            if($language == "ar"){
                $message = $Setting->maintenance_message_ar;
            } else {
                $message = $Setting->maintenance_message_en;
            }
            return response()->json(['error' => $message], 401);
        } else {
            return $next($request);
        }
    }
}
