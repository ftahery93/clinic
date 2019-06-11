<?php

namespace App\Http\Middleware;

use Closure;
use App;

class AuthApi
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
        $header = $request->headers;
        if($header){
            $lang = $request->server('HTTP_ACCEPT_LANGUAGE');
            App::setLocale($lang ? $lang : Config::get('app.locale'));
            return $next($request);
        } else {
            return response()->json([
                'error' => trans('requests.400'),
            ], 400);
        }
    }
}
