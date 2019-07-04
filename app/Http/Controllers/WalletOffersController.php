<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\Permissions;
use App\WalletOffer;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;

class WalletOffersController extends Controller
{

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
            $WalletOffers = WalletOffer::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.wallet.offers", compact("WalletOffers", "Permissions"));
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

}
