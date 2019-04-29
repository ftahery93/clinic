<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\API\RegisteredUser;
use App\Models\Admin\LanguageManagement;

class Localization
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
        if (!RegisteredUser::checkLanguage($lang)) {
		 return response()->json([
                    'message' => LanguageManagement::getLabel('text_languageError','en')
              ]);
        }
		return $next($request);
    }
    
}
