<?php

namespace App\Http\Controllers;

use App\AddressTitle;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the Address.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $AddressTitles = AddressTitle::orderby('created_at', 'asc')->paginate(env('BACKEND_PAGINATION'));
        }
        return view("backend.addressTitles", compact("AddressTitles"));
    }

    /**
     * Show the form for creating a new category
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

        return view("backend.address_titles.create");
    }

    /**
     * Create category
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
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $addressTitle = new AddressTitle;
        $addressTitle->name_en = $request->name_en;
        $addressTitle->name_ar = $request->name_ar;
        $addressTitle->save();

        return redirect()->action('AddressController@index')->with('doneMessage', trans('backend.addDone'));
    }

    /**
     * Show the form for editing the specified resource.
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
            $addressTitle = AddressTitle::find($id);
            if ($addressTitle != null) {
                return view("backend.address_titles.edit", compact("addressTitle"));
            }
        } else {
            return redirect()->action('AddressController@index');
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
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        $addressTitle = AddressTitle::find($id);
        if ($addressTitle != null) {

            $this->validate($request, [
                'name_en' => 'required',
                'name_ar' => 'required',
            ]);

            $addressTitle->name_en = $request->name_en;
            $addressTitle->name_ar = $request->name_ar;           
            $addressTitle->save();
            return redirect()->action('AddressController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('AddressController@index');
        }
    }

    /**
     * Remove the specified category.
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
            $addressTitle = AddressTitle::find($id);
        }
        if ($addressTitle != null) {
            $addressTitle->delete();
            return redirect()->action('AddressController@index')->with('doneMessage', trans('backend.deleteDone'));
        } else {
            return redirect()->action('AddressController@index');
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

        if(empty($request->ids)){
             
            return redirect()->route('addressTitle_list');
        }
        
      if ($request->action == "delete") {
            // Check Permissions
            if (!@Auth::user()->permissionsGroup->delete_status) {
                return Redirect::to(route('NoPermission'))->send();
            }

            AddressTitle::wherein('id', $request->ids)
                ->delete();

        }
        return redirect()->action('AddressController@index')->with('doneMessage', trans('backend.saveDone'));
    }
}
