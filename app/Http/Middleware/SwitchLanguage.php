<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SwitchLanguage
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
        if($request->server('HTTP_ACCEPT_LANGUAGE')){
            App::setLocale($request->server('HTTP_ACCEPT_LANGUAGE') ? $request->server('HTTP_ACCEPT_LANGUAGE') : Config::get('app.locale'));
        } else {
            return response()->json(['error' => trans('auth.acceptLanguageMissing')], 404);
        }

        if($request->server('Authorization')){
            $header = $request->server('Authorization');
            return response()->json(['error' => $header], 404);
        }

        return $next($request);
    }
}
