<?php

namespace App\Http\Controllers\API;

use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Permissions;
use App\ApplicationUsers;
use App\WebmasterSection;
use Auth;
use File;
use Redirect;

class ApplicationUsersController extends Controller
{

    private $uploadPath = "uploads/users/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
        $this->middleware('checkAuthApi');
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
            return response()->json([
                'error' => $validator->messages()->first(),
            ], 422);
        }

        if (!ApplicationUsers::where('email', '=', $request->input('email'))->exists()) {
            return response()->json([
                'error' => trans('auth.emailNotExists'),
            ], 417);
        } elseif (!ApplicationUsers::where('email', '=', $request->input('email'))
                ->where('status', '=', 1)
                ->exists()) {
            return response()->json([
                'error' => trans('auth.emailInactive'),
            ], 401);
        }

        $ApplicationUser = ApplicationUsers::where('email', $request->input('email'))->get()->first();

        if (Hash::check($request->password, $ApplicationUser->password)) {
            return response()->json([
                'user' => collect($ApplicationUser)->only('id', 'name', 'email'),
            ]);
        } else {
            return response()->json([
                'error' => trans('auth.invalidCredentials')
            ], 401);
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
        
        return response()->json([
            'message' => trans('auth.success'),
        ]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        $Permissions = Permissions::orderby('id', 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            $Users = User::where('created_by', '=', Auth::user()->id)->orwhere('id', '=', Auth::user()->id)->find($id);
        } else {
            $Users = User::find($id);
        }
        if (count($Users) > 0) {
            return view("backEnd.users.edit", compact("Users", "Permissions", "GeneralWebmasterSections"));
        } else {
            return redirect()->action('UsersController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $User = User::find($id);
        if (count($User) > 0) {


            $this->validate($request, [
                'photo' => 'mimes:png,jpeg,jpg,gif|max:3000',
                'name' => 'required',
                'permissions_id' => 'required'
            ]);

            if ($request->email != $User->email) {
                $this->validate($request, [
                    'email' => 'required|email|unique:users',
                ]);
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

            //if ($id != 1) {
            $User->name = $request->name;
            $User->email = $request->email;
            if ($request->password != "") {
                $User->password = bcrypt($request->password);
            }
            $User->permissions_id = $request->permissions_id;
            //}
            if ($request->photo_delete == 1) {
                // Delete a User file
                if ($User->photo != "") {
                    File::delete($this->getUploadPath() . $User->photo);
                }

                $User->photo = "";
            }
            if ($fileFinalName_ar != "") {
                // Delete a User file
                if ($User->photo != "") {
                    File::delete($this->getUploadPath() . $User->photo);
                }

                $User->photo = $fileFinalName_ar;
            }

            $User->connect_email = $request->connect_email;
            if ($request->connect_password != "") {
                $User->connect_password = $request->connect_password;
            }

            $User->status = $request->status;
            $User->updated_by = Auth::user()->id;
            $User->save();
            return redirect()->action('UsersController@edit', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('UsersController@index');
        }
    }

}
