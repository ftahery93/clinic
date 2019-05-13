<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\API\Page;
use App\Http\Controllers\Controller;
use App\Utility;

class PagesController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        //$this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    public function getTermsAndConditions()
    {
        $page = Page::find(1);

        return response()->json([
            "terms_and_conditions" => $page->message,
        ]);
    }
}
