<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Redirect;
use App\Http\Requests;
use App\Permissions;
use App\ApplicationUsers;
use Illuminate\Config;
use Illuminate\Http\Request;

class ApplicationUsersController extends Controller
{

    private $uploadPath = "uploads/appusers/";

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
     * Display a listing of the application users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $ApplicationUsers = ApplicationUsers::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backEnd.appusers", compact("ApplicationUsers", "Permissions"));
    }

    /**
     * Delete the application user.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (@Auth::user()->permissionsGroup->delete_status) {
            $ApplicationUser = ApplicationUsers::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $ApplicationUser = ApplicationUsers::find($id);
        }
        if (count($ApplicationUser) > 0 && $id != 1) {
            // Delete a User photo
            if ($ApplicationUser->photo != "") {
                File::delete($this->getUploadPath() . $ApplicationUser->photo);
            }

            $ApplicationUser->delete();
            return redirect()->action('ApplicationUsersController@index')->with('doneMessage', trans('backLang.deleteDone'));
        } else {
            return redirect()->action('ApplicationUsersController@index');
        }
    }

    /**
     * Update all selected application users.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        if ($request->action == "activate") {
            ApplicationUsers::wherein('id', $request->ids)->update(['status' => 1]);
        } elseif ($request->action == "block") {
            ApplicationUsers::wherein('id', $request->ids)->where('id', '!=', 1)->update(['status' => 0]);
        } elseif ($request->action == "delete") {
            // Delete User photo
            $ApplicationUsers = ApplicationUsers::wherein('id', $request->ids)->where('id', '!=', 1)->get();
            foreach ($ApplicationUsers as $ApplicationUser) {
                if ($ApplicationUser->photo != "") {
                    File::delete($this->getUploadPath() . $ApplicationUser->photo);
                }
            }
            ApplicationUsers::wherein('id', $request->ids)->where('id', "!=", 1)->delete();
        }
        return redirect()->action('ApplicationUsersController@index')->with('doneMessage', trans('backLang.saveDone'));
    }

}
