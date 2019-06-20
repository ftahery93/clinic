<?php

namespace App\Http\Controllers\API;


use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PagesController extends Controller
{
    public $language;
    public $successStatus = 200;
    private $uploadPath = "uploads/pages/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
        $this->middleware('switch.lang');

        //middleware to check the mobile application version before proceeding with incoming request
        $this->middleware('app.version');

        //get the language from the HTTP header
        $this->language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : "en";  

    }

    /**
     * Fetch page details
     *
     * @return \Illuminate\Http\Response
     */
    public function getPage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        $Page = Page::where('name','=',$request->name)->where('status','=','1')->get();
        if (count($Page) > 0) {
            return response()->json($Page, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pageNotFound')], 404);
        }
    }

}
