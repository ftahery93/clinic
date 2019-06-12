<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App\Polls;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PollsController extends Controller
{

    public $successStatus = 200;
    private $uploadPath = "uploads/users/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
       $this->middleware('switch.lang');
    }

    /**
     * Fetch the list of polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = '31.203.6.20';
        $ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$ip}/json"));
        $visitor_country_code = @$ip_details->country;
        if ($visitor_country_code != "") {
            $v_country = Country::where('code', '=', $visitor_country_code)->with('polls')->get();
            
            return ($lang == "en") ? $v_country->pluck('polls','title_en') : $v_country->pluck('polls','title_ar');
        } else {
            return response()->json([
                'error' => trans('mobileLang.countryIPInvalid')
            ], $this->successStatus);
        }
        $Polls = Polls::where('status', '=', 1)
            ->where('deleted', '=', 0)
            ->with('Countries')
            ->get();
        return App\PollCountries::find(1);
        if(count($Polls) > 0){
            return response()->json([
                'polls' => $Polls,
            ], $this->successStatus);
        } else {
            return response()->json([
                'error' => trans('mobileLang.pollsNotFound')
            ], $this->successStatus);
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
            return response()->json([
                'error' => $validator->messages()->first(),
            ], 422);
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

        // Get Token Laravel Passport
        $token = $ApplicationUser->createToken(env('APP_NAME'))->accessToken;

        return response()->json([
            'success' => [
                'message' => trans('auth.success'),
                'token' => $token,
                'status' => $this->successStatus
            ],
        ]);
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
                return response()->json([
                    'error' => $validator->messages()->first(),
                ], 422);
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

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}
