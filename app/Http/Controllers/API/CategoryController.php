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
     * Save the list of saved categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUserCategories(Request $request)
    {
        json_decode($request->getContent(),true);

        $validator = Validator::make($request->all(), [
            'categories' => 'required|array|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }
        
        if($request->categories != ""){
            foreach($request->categories as $val){
                if (!Category::where('id','=',$val)->exists()) {
                    return response()->json(['error' => trans('mobileLang.categoryInterestFailToAdd',[ 'id' => $val])], 404);
                } 
                Auth::user()->categories()->sync($val,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            }
            return response()->json(['message' => trans('mobileLang.categoryInterestSuccess')], $this->successStatus);
        } else {
            return response()->json(['message' => trans('mobileLang.categoryInterestFail')], 404);
        }
    }

    /**
     * Get the list of user selected categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserCategories()
    {
        if (Auth::user()->categories) {
            return response()->json(Auth::user()->categories, $this->successStatus);
        } else {
            return response()->json(['message' => trans('mobileLang.categoryNotFound')], 404);
        }
    }

    /**
     * Get the filtered list of user selected categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserFilteredCategories()
    {
        if (Auth::user()->categories) {
            return response()->json(Auth::user()->categories, $this->successStatus);
        } else {
            return response()->json(['message' => trans('mobileLang.categoryNotFound')], 404);
        }
    }

}
