<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App\ApplicationUsers;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ApplicationUsersController extends Controller
{

    public $successStatus = 200;
    private $uploadPath = "uploads/users/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header for language before proceeding with incoming request
       $this->middleware('switch.lang');

        //middleware to check the mobile application version before proceeding with incoming request
        $this->middleware('app.version');
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
            return response()->json(['error' => trans('auth.emailNotExists')], 417);
        } 

        //check for active account
        if (!ApplicationUsers::where('email', '=', $request->input('email'))
                ->where('status', '=', 1)
                ->exists()) {
            return response()->json(['error' => trans('auth.emailInactive')], 401);
        } 

        $ApplicationUser = ApplicationUsers::where('email', $request->input('email'))->get()->first();

        if (Hash::check($request->password, $ApplicationUser->password)) {
             // Get Token Laravel Passport
            $token = $ApplicationUser->createToken(env('APP_NAME'))->accessToken;
            return response()->json(['success' => ['token' => $token,'status' => $this->successStatus]]);
        } else {
            return response()->json(['error' => trans('auth.invalidCredentials')], 401);
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'age' => 'required',
            'terms_conditions' => 'required',
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
            'notification' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Get Token Laravel Passport
        $token = $ApplicationUser->createToken(env('APP_NAME'))->accessToken;

        return response()->json(['success' => ['message' => trans('auth.success'),'token' => $token,'status' => $this->successStatus]]);
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
        return response()->json(['success' => $ApplicationUser], $this->successStatus);
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
        return response()->json(['success' => trans('auth.successLogout')], $this->successStatus);
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
                'name' => 'required',
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
            return response()->json(['error' => trans('mobileLang.userNotFound')], $this->successStatus);
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
                    return response()->json(['success' => trans('mobileLang.userPasswordChangeSuccess')], $this->successStatus);
                } else {
                    return response()->json(['error' => trans('mobileLang.userconfirmPasswordDoesNotMatch')], $this->successStatus); 
                }
            } else {    
                return response()->json(['error' => trans('mobileLang.userwrongOldPassword')], $this->successStatus);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.userNotFound')], $this->successStatus);
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
            return response()->json(['success' => trans('mobileLang.userDeleteSuccess')], $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.userNotFound')], $this->successStatus);
        }
    }

}
