<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App\Poll;
use App\Country;
use App\Category;
use App\ApplicationUsers;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PollsController extends Controller
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
    public function index(Request $request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "GET"){
            $ip = '31.203.6.12'; //test ip address
            // $ip = $_SERVER['REMOTE_ADDR']; // Get the server IP Address from where request is coming
            //  Validate IP Address format
            if(filter_var($ip, FILTER_VALIDATE_IP)){
                // $ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$ip}/json"));
                // $visitor_country_code = @$ip_details->country;
                $visitor_country_code = "KW";
                if ($visitor_country_code != "") {
                    $Country = Country::where('code', '=', $visitor_country_code)->first();
                    if (count($Country->polls) > 0) {
                        return response()->json(['polls' => $Country->polls], $this->successStatus);
                    } else {
                        return response()->json(['error' => trans('mobileLang.countryPollsNotFound')], $this->successStatus);
                    }
                } else {
                    return response()->json(['error' => trans('mobileLang.countryNotFound')], $this->successStatus);
                }
            } else {
                return response()->json(['error' => trans('mobileLang.countryIPInvalid')], $this->successStatus);
            }
        } else if($method == "POST"){
            $category_id = $request->category_id;
            if($category_id){
                $Category = Category::find($category_id);
                if (count($Category->polls) > 0) {
                    return response()->json(['polls' => $Category->polls], $this->successStatus);
                } else {
                    return response()->json(['error' => trans('mobileLang.categoryPollsNotFound')], $this->successStatus);
                }
            } else {
                return response()->json(['error' => trans('mobileLang.categoryIsMissing')], $this->successStatus);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.methodNotFound')], 404);
        }
    }

    /**
     * Store a newly created poll in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:png,jpeg,jpg,gif|max:3000',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'age' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName_ar = "";
        if ($request->$formFileName != "") {
            $fileFinalName_ar = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = base_path() . "/public/" . $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName_ar);
        }
        // End of Upload Files

        $ApplicationUser = ApplicationUsers::create([
            'photo' => $fileFinalName_ar,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'age' => $request->age,
            'terms_conditions' => $request->terms_conditions,
            'status' => 1,
        ]);

        // Get token laravel passport
        $token = $ApplicationUser->createToken(env('APP_NAME'))->accessToken;

        // Return token as response
        return response()->json([
            'success' => ['message' => trans('auth.success'),'token' => $token,'status' => $this->successStatus]]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ApplicationUser = ApplicationUsers::find($id);
        if (count($ApplicationUser) > 0) {

            $validator = Validator::make($request->all(), [
                'photo' => 'mimes:png,jpeg,jpg,gif|max:3000',
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()->first()], 422);
            }

            // Start of Upload Files
            $formFileName = "photo";
            $fileFinalName_ar = "";
            if ($request->$formFileName != "") {
                $fileFinalName_ar = time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = base_path() . "/public/" . $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName_ar);
            }
            // End of Upload Files

            $ApplicationUser->name = $request->name;
            
            if ($request->email != "") {
                $ApplicationUser->email = $request->email;
            }

            if ($request->password != "") {
                $ApplicationUser->password = bcrypt($request->password);
            }

            if ($request->notification != "") {
                $ApplicationUser->notification = $request->notification;
            }

            if ($request->photo_delete == 1) {
                // Delete a User file
                if ($ApplicationUser->photo != "") {
                    File::delete($this->getUploadPath() . $ApplicationUser->photo);
                }
                $ApplicationUser->photo = "";
            }

            if ($fileFinalName_ar != "") {
                // Delete a User file
                if ($ApplicationUser->photo != "") {
                    File::delete($this->getUploadPath() . $ApplicationUser->photo);
                }

                $ApplicationUser->photo = $fileFinalName_ar;
            }
            $ApplicationUser->updated_by = Auth::user()->id;
            $ApplicationUser->save();
            return response()->json(['success' => trans('mobileLang.profileEditSuccess')], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.userNotFound')], $this->successStatus);
        }
    }

    /**
     * Delete the specified poll resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Poll = Polls::find($id);
        if (count($Poll) > 0) {
            $Poll->deleted = 1;
            $Poll->updated_by = Auth::user()->id;
            $Poll->save();
            return response()->json(['success' => trans('mobileLang.pollDeleteSuccess')], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollNotFound')], $this->successStatus);
        }
    }

    /**
     * Mark the poll favourite from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourite($id)
    {
        $Poll = Poll::find($id);
        if(count($Poll->favourites) > 0){ 
            $Poll->favourites()->detach(Auth::user()->id);
            return response()->json(['success' => trans('mobileLang.pollUnFavourite')], $this->successStatus);
        } else {
            $Poll->favourites()->attach(Auth::user()->id,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            return response()->json(['success' => trans('mobileLang.pollFavourite')], $this->successStatus);
        }
    }

    /**
     * Fetch the list of saved polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourites()
    {
        $ApplicationUser = ApplicationUsers::find(Auth::user()->id);
        if (count($ApplicationUser->favourites) > 0) {
            return response()->json(['saved_polls' => $ApplicationUser->favourites], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollFavouriteNotFound')], $this->successStatus);
        }
    }

    /**
     * Fetch the list of my polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mypolls()
    {
        $Poll = Poll::where('created_by','=',Auth::user()->id)->get();
        if (count($Poll) > 0) {
            return response()->json(['my_polls' => $Poll], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollMyPollsNotFound')], $this->successStatus);
        }
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
