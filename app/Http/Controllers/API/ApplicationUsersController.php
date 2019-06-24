<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App\ApplicationUsers;
use App\OneSignalApplicationUsers;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ApplicationUsersController extends Controller
{

    public $successStatus = 200;
    private $uploadPath = "uploads/appusers/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header for language before proceeding with incoming request
       $this->middleware('switch.lang');

        //middleware to check the mobile application version before proceeding with incoming request
        $this->middleware('app.version');

        //get the one signal player Id from header
        $this->playerId = isset($_SERVER['HTTP_ONESIGNAL_PLAYER_ID']) ? $_SERVER['HTTP_ONESIGNAL_PLAYER_ID'] : "";  
    }

    /**
     * Verify a registered application user from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        //check for email exists
        if (!ApplicationUsers::where('email', '=', $request->input('email'))->exists()) {
            return response()->json(['error' => trans('auth.emailNotExists')], 404);
        } 

        //check for active account
        if (!ApplicationUsers::where('email', '=', $request->input('email'))
                ->where('status', '=', 1)
                ->exists()) {
            return response()->json(['error' => trans('auth.emailInactive')], 404);
        } 

        $ApplicationUser = ApplicationUsers::where('email', $request->input('email'))->get()->first();

        if (Hash::check($request->password, $ApplicationUser->password)) {

            //check if player id is available in the header, fetch and store in the database
            if($this->playerId != ""){
                $GetPlayerID = OneSignalApplicationUsers::where('player_id','=',$this->playerId)->first();
                if(!$GetPlayerID){
                    $type = explode("-",$request->server('HTTP_APP_VERSION'));
                    $OneSignal = new OneSignalApplicationUsers();
                    $OneSignal->application_users_id = $ApplicationUser->id;
                    $OneSignal->player_id = $this->playerId;
                    $OneSignal->device_type = $type[0];
                    $OneSignal->save();
                }
            }

            // Get Token Laravel Passport
            $token = $ApplicationUser->createToken(env('APP_NAME'))->accessToken;
            return response()->json(['access_token' => $token],$this->successStatus);
        } else {
            return response()->json(['error' => trans('auth.invalidCredentials')], 404);
        }
    }

    /**
     * Store a newly registered application user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:png,jpeg,jpg,gif|max:3000',
            'name' => 'required',
            'email' => 'required|email|unique:application_users',
            'password' => 'required',
            'age' => 'required',
            'terms_conditions' => 'required',
            'gender' => 'required',
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
            'gender' => $request->gender,
            'status' => 1,
            'notification' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Get Token Laravel Passport
        $token = $ApplicationUser->createToken(env('APP_NAME'))->accessToken;

        return response()->json(['access_token' => $token],$this->successStatus);
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

    /**
     * Show the profile for the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $ApplicationUser = Auth::user();
        return response()->json($ApplicationUser, $this->successStatus);
    }

    /**
     * Logout from the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $ApplicationUser = Auth::user()->token();
        $ApplicationUser->revoke();
        return response()->json(['message' => trans('auth.successLogout')], $this->successStatus);
    }

    /**
     * Forgot password
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        return false;
    }

    /**
     * Update the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $ApplicationUser = ApplicationUsers::find(Auth::user()->id);
        if (count($ApplicationUser) > 0) {

            $validator = Validator::make($request->all(), [
                'photo' => 'mimes:png,jpeg,jpg,gif|max:3000',
                'email' => 'email|unique:application_users',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()->first()], 422);
            }

            // Start of Upload Files
            $formFileName = "photo";
            $fileFinalName_ar = "";
            if ($request->$formFileName != "") {
                $fileFinalName_ar = time() . rand(1111,9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = base_path() . "/public/" . $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName_ar);
            }
            // End of Upload Files

            $ApplicationUser->name = $request->name;
            
            //Email
            if ($request->email != "") {
                $ApplicationUser->email = $request->email;
            }

            //Password
            if ($request->password != "") {
                $ApplicationUser->password = bcrypt($request->password);
            }

            //Notification
            if ($request->notification != "") {
                $ApplicationUser->notification = $request->notification;
            }

            //Age
            if ($request->age != "") {
                $ApplicationUser->age = $request->age;
            }

            //Gender
            if ($request->gender != "") {
                $ApplicationUser->gender = $request->gender;
            }

            //Delete Photo
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
            return response()->json(['message' => trans('mobileLang.profileEditSuccess')], $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.userNotFound')], 404);
        }
    }

    /**
     * Change Password for the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        $ApplicationUser = ApplicationUsers::find(Auth::user()->id);
        if (count($ApplicationUser) > 0) {
            if (password_verify($request->old_password, $ApplicationUser->password)) {
                if($request->new_password == $request->confirm_password){
                    $ApplicationUser->password = bcrypt($request->new_password);
                    $ApplicationUser->updated_by = Auth::user()->id;
                    $ApplicationUser->updated_at = date("Y-m-d H:i:s");
                    $ApplicationUser->save();
                    return response()->json(['message' => trans('mobileLang.userPasswordChangeSuccess')], $this->successStatus);
                } else {
                    return response()->json(['error' => trans('mobileLang.userconfirmPasswordDoesNotMatch')], 404);
                }
            } else {    
                return response()->json(['error' => trans('mobileLang.userwrongOldPassword')], 404);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.userNotFound')], 404);
        }
    }

    /**
     * Delete account for the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $ApplicationUser = ApplicationUsers::find(Auth::user()->id);
        if (count($ApplicationUser) > 0) {
            $ApplicationUser->deleted = 1;
            $ApplicationUser->updated_by = Auth::user()->id;
            $ApplicationUser->updated_at = date("Y-m-d H:i:s");
            $ApplicationUser->save();
            return response()->json(['message' => trans('mobileLang.userDeleteSuccess')], $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.userNotFound')], 404);
        }
    }

}
