<?php

namespace App\Http\Middleware;

use App;
use App\LanguageManagement;
use App\Version;
use Closure;
use Illuminate\Support\Str;

class CheckVersion
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
            if (Str::startsWith($appVersion, 'Android-')) {
                $version = Version::find(2);
            } else if (Str::startsWith($appVersion, "iOS-")) {
                $version = Version::find(1);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('update_app_request', $language),
                ], 405);
            }

            $versionArray = explode("-", $appVersion);
            if ($versionArray[1] == $version->version) {
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
