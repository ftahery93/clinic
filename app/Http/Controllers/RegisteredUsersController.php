<?php

namespace App\Http\Controllers;

use App\Authentication;
use Auth;
use File;
use Redirect;
use App\Permissions;
use App\RegisteredUser;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisteredUsersController extends Controller
{

    private $uploadPath = "uploads/registered_users/";

    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the registered users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            if ($request->mobile){
                $RegisteredUsers = RegisteredUser::where('mobile',$request->mobile)->orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            }else{
                $RegisteredUsers = RegisteredUser::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            }
           
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.registered_users", compact("RegisteredUsers", "Permissions"));
    }

    /**
     * Show the form for editing the specified Registered user.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        if (@Auth::user()->permissionsGroup->view_status) {
            $registeredUsers = DB::table('registered_users')->find($id);
        }

        if ($registeredUsers != null) {
            return view("backend.registered_users.edit", compact("registeredUsers"));
        } else {
            return redirect()->action('RegisteredUsersController@index');
        }
    }

    public function update(Request $request, $id)
    {

        $registeredUser = RegisteredUser::find($id);
        if ($registeredUser != null) {
            $this->validate($request, [
                'status' => 'required',
            ]);
            $registeredUser->update([
                'status' => $request->status
            ]);

            if ($request->status == 0) {
                Authentication::where('user_id', $id)->delete();
            }
            return redirect()->action('RegisteredUsersController@index')->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('RegisteredUsersController@index');
        }
    }

    /**
     * Update all selected registered users.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        if (empty($request->ids)) {

            return redirect()->route('registered_users_list');
        }

        if ($request->action == "activate") {
            RegisteredUser::wherein('id', $request->ids)->update(['status' => 1]);
        } elseif ($request->action == "block") {
            RegisteredUser::wherein('id', $request->ids)->where('id', '!=', 1)->update(['status' => 0]);
        } elseif ($request->action == "delete") {
            // Delete Registered photo
            $RegisteredUsers = RegisteredUser::wherein('id', $request->ids)->where('id', '!=', 1)->get();
            foreach ($RegisteredUsers as $RegisteredUser) {
                if ($RegisteredUser->image != "") {
                    File::delete($this->getUploadPath() . $RegisteredUser->image);
                }
            }
            RegisteredUser::wherein('id', $request->ids)->where('id', "!=", 1)->delete();
        }
        return redirect()->action('RegisteredUsersController@index')->with('doneMessage', trans('backend.saveDone'));
    }
}
