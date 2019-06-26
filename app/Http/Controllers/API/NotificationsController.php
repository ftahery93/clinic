<?php

namespace App\Http\Controllers\API;

use DB;
use App;
use Auth;
use File;
use Helper;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NotificationsController extends Controller
{
    public $language;
    public $successStatus = 200;

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
     * Fetch the list of notifications 
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotifications()
    {
        return response()->json(['message' => 'Notifications feature is coming soon...'], $this->successStatus);
    }

    /**
     * Read notification
     * 
     * @return \Illuminate\Http\Response
     */
    public function read(Request $request)
    {
        return response()->json(['message' => 'Notifications feature is coming soon...'], $this->successStatus);
    }

}
