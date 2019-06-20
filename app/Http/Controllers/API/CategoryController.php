<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public $language;
    public $successStatus = 200;

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
     * Fetch the list of categories from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
       // Get List of Active Categories
       $Category = Category::where('status','=','1')->get();
       if(count($Category) > 0){ 
            if($this->language == "ar"){
                $Category = $Category->map(function ($category) {
                    $Category['id'] = $category->id;
                    $Category['name'] = $category->title_ar;
                    $Category['photo'] = $category->photo;
                    return $Category;
                });
                return response()->json($Category, $this->successStatus);
            } else {
                $Category = $Category->map(function ($category) {
                    $Category['id'] = $category->id;
                    $Category['name'] = $category->title_en;
                    $Category['photo'] = $category->photo;
                    return $Category;
                });
                return response()->json($Category, $this->successStatus);
            }
       } else {
            return response()->json(['error' => trans('mobileLang.categoryNotFound')], 404);
       }
    }

    /**
     * Save the list of saved categories from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUserCategories(Request $request)
    {
        //save the user specific categories and fetch them on their home screen along with polls
    }

}
