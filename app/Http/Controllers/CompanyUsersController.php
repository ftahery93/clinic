<?php

namespace App\Http\Controllers;

use App\Company;
use App\Permissions;
use Auth;
use File;
use Illuminate\Http\Request;
use Redirect;

class CompanyUsersController extends Controller
{

    private $uploadPath = "uploads/company_images/";

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
            $CompanyUsers = Company::
                 select('companies.id', 'companies.name', 'companies.email', 'companies.mobile', 'companies.phone', 'companies.status',
                  'companies.rating', 'companies.approved', 'companies.image', 'wallet.balance')
                ->orderby('id', 'asc')
                ->leftJoin('wallet', 'wallet.company_id', '=', 'companies.id')
                ->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.company_users", compact("CompanyUsers", "Permissions"));
    }

    /**
     * Show the form for editing the specified company user.
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
            $CompanyUser = Company::find($id);
        }
        if (count($CompanyUser) > 0) {
            return view("backend.company.edit", compact("CompanyUser"));
        } else {
            return redirect()->action('CompanyUsersController@index');
        }
    }

    /**
     * Update the specified company user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        $CompanyUser = Company::find($id);
        if (count($CompanyUser) > 0) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
            ]);

            $CompanyUser->name = $request->name;
            $CompanyUser->email = $request->email;
            $CompanyUser->mobile = $request->mobile;
            $CompanyUser->phone = $request->phone;
            $CompanyUser->description = $request->description;
            $CompanyUser->status = $request->status;
            $CompanyUser->updated_at = date("Y-m-d H:i:s");
            $CompanyUser->save();
            return redirect()->action('CompanyUsersController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
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
