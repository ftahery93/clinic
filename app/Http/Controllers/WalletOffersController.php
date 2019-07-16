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
     * Show the form for creating a Wallet Offer
     *
     * @param  \Illuminate\Http\Request $webmasterId
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // Check Permissions
         if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        return view("backend.wallet.create");
    }

   /**
     * Create Wallet Offer
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        

        $this->validate($request, [
            'amount' => 'required',
            'free_deliveries' => 'required'
        ]);

        $WalletOffer = new WalletOffer;
        $WalletOffer->amount = $request->amount;
        $WalletOffer->free_deliveries = $request->free_deliveries;
        $WalletOffer->created_at = date("Y-m-d H:i:s");
        $WalletOffer->updated_at = date("Y-m-d H:i:s");
        $WalletOffer->save();

        return redirect()->action('WalletOffersController@index')->with('doneMessage', trans('backend.addDone'));
    }

    /**
     * Show the form for editing the specified Wallet Offer.
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
            $WalletOffer = WalletOffer::find($id);
        }
        if (count($WalletOffer) > 0) {
            return view("backend.wallet.edit", compact("WalletOffer"));
        } else {
            return redirect()->action('WalletOffersController@index');
        }
    }

    /**
     * Update the specified Wallet Offer.
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

        $WalletOffer = WalletOffer::find($id);
        if (count($WalletOffer) > 0) {
            $this->validate($request, [
                'amount' => 'required',
                'free_deliveries' => 'required',
            ]);

            $WalletOffer->amount = $request->amount;
            $WalletOffer->free_deliveries = $request->free_deliveries;
            $WalletOffer->updated_at = date("Y-m-d H:i:s");
            $WalletOffer->save();
            return redirect()->action('WalletOffersController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('WalletOffersController@index');
        }
    }

    /**
     * Remove the specified Wallet Offer.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $WalletOffer = WalletOffer::find($id);
        }
        if (count($WalletOffer) > 0) {
            $WalletOffer->delete();
            return redirect()->action('WalletOffersController@index')->with('doneMessage', trans('backend.deleteDone'));
        } else {
            return redirect()->action('WalletOffersController@index');
        }
    }


    /**
     * Update all selected resources in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
       if ($request->action == "delete") {
            // Check Permissions
            if (!@Auth::user()->permissionsGroup->delete_status) {
                return Redirect::to(route('NoPermission'))->send();
            }
            WalletOffer::wherein('id', $request->ids)->delete();
        }
        return redirect()->action('WalletOffersController@index')->with('doneMessage', trans('backend.saveDone'));
    }
}
