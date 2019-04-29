<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\API\RegisteredUser;
use App\Models\Admin\LanguageManagement;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $lang)
    {       
        if (!$request->user('api')) {
		 return response()->json([
                    'message' => LanguageManagement::getLabel('text_unauthorized',$lang)
              ]);
        }
        return $next($request);
    }
}
