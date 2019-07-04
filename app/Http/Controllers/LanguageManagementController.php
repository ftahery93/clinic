<?php

namespace App\Http\Controllers;


use App\LanguageManagement;
use Auth;
use File;
use Redirect;
use App\Permissions;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;


class LanguageManagementController extends Controller
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
     * Display a listing of the Language message list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Languages = LanguageManagement::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.languageManagement.list", compact("Languages", "Permissions"));
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
            $Languages = LanguageManagement::find($id);
        } else {
            $Languages = LanguageManagement::find($id);
        }
       
        //if (count($Languages) > 0) {
            return view("backEnd.languageManagement.edit", compact("Languages"));
      //  } else {
           //return redirect()->action('languageManagementController@index');
       // }
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
        $Languages = LanguageManagement::find($id);
       // if (count($Languages) > 0) {

            $this->validate($request, [
                'name' => 'required',
                'label_en' => 'required',
                'label_ar' => 'required',
            ]);

          
            $Languages = $request->all();         
            $Languages->save();

            return redirect()->action('LanguageManagementController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        // } else {
        //     return redirect()->action('UsersController@index');
        // }
    }

}
