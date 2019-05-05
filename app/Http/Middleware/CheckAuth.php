<?php

namespace App\Http\Middleware;

use App\Models\Admin\LanguageManagement;
use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = $request->header('Accept-Language');
        if (!$request->user('api')) {
            return response()->json([
                'message' => LanguageManagement::getLabel('text_unauthorized', $language),
            ]);
        }
        return $next($request);
    }
}
