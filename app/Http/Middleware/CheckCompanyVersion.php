<?php

namespace App\Http\Middleware;

use App\CompanyVersion;
use App\LanguageManagement;
use Closure;

class CheckCompanyVersion
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
        if ($request->header('Version')) {
            $appVersion = $request->header('Version');

            $android = CompanyVersion::find(2);
            $ios = $version = CompanyVersion::find(1);
            if ($appVersion == "Android-" . $android->version || $appVersion == "iOS-" . $ios->version) {
                return $next($request);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('update_app_request', $language),
                ], 405);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('invalid_api_request', $language),
            ], 400);
        }
    }
}
