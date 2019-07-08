<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\API\Page;
use App\Utility;
use Illuminate\Http\Request;

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

    /**
     *
     * @SWG\Get(
     *         path="/user/getTermsAndConditions",
     *         tags={"User Pages"},
     *         operationId="getTermsAndConditions",
     *         summary="Get Masafah's Terms and Conditions",
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getTermsAndConditions()
    {
        $page = Page::find(1);

        return response()->json([
            "terms_and_conditions" => $page->message,
        ]);
    }
}
