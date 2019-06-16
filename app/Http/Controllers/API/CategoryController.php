<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public $language;
    public $successStatus = 200;
    private $uploadPath = "uploads/users/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
       $this->middleware('switch.lang');

       //middleware to check the mobile application version before proceeding with incoming request
       $this->middleware('app.version');

        //get the language from the HTTP header
        $this->language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];  
    }

    /**
     * Fetch the list of polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //fetch the category list from here..
    }

    /**
     * Get Upload Path resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    /**
     * Set Upload Path resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}
