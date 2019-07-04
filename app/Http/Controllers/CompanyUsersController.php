<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Redirect;
use App\Permissions;
use App\Company;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;

class CompanyUsersController extends Controller
{

    private $uploadPath = "uploads/company_users/";

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
            $CompanyUsers = Company::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.company_users", compact("CompanyUsers", "Permissions"));
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
            $CompanyUser = Company::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $CompanyUser = Company::find($id);
        }
        if (count($CompanyUser) > 0 && $id != 1) {
            // Delete a User photo
            if ($CompanyUser->image != "") {
                File::delete($this->getUploadPath() . $CompanyUser->image);
            }

            $CompanyUser->delete();
            return redirect()->action('CompanyUsersController@index')->with('doneMessage', trans('backend.deleteDone'));
        } else {
            return redirect()->action('CompanyUsersController@index');
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
            Company::wherein('id', $request->ids)->update(['status' => 1]);
        } elseif ($request->action == "block") {
            Company::wherein('id', $request->ids)->where('id', '!=', 1)->update(['status' => 0]);
        } elseif ($request->action == "delete") {
            // Delete User photo
            $CompanyUsers = Company::wherein('id', $request->ids)->where('id', '!=', 1)->get();
            foreach ($CompanyUsers as $CompanyUser) {
                if ($CompanyUser->image != "") {
                    File::delete($this->getUploadPath() . $CompanyUser->image);
                }
            }
            Company::wherein('id', $request->ids)->where('id', "!=", 1)->delete();
        }
        return redirect()->action('CompanyUsersController@index')->with('doneMessage', trans('backend.saveDone'));
    }

}
