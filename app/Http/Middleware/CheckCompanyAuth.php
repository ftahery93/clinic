<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompanyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'trainer')
    {

        $language = $request->header('Accept-Language');
        if (!$request->user('company')) {
            return response()->json([
                'message' => LanguageManagement::getLabel('text_unauthorized', $language),
            ]);
        }
        return $next($request);
    }
}
