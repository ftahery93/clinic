<?php

namespace App\Http\Controllers;


use Auth;
use File;
use Redirect;
use App\Country;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;


class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->countries_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Countries = Country::orderby('created_at','asc')->paginate(env('BACKEND_PAGINATION'));
        }
       return view("backEnd.countries", compact("Countries"));
    }
    
   /**
     * Show the form for creating a add country
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

        return view("backEnd.countries.create");
    }

    /**
     * Add new country.
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'code' => 'required'
        ]);

        $Country = new Country;
        $Country->title_ar = $request->title_ar;
        $Country->title_en = $request->title_en;
        $Country->tel = $request->tel;
        $Country->code = $request->code;
        $Country->sort_order = $request->sort_order;
        $Country->created_at = date("Y-m-d H:i:s");
        $Country->save();

        return redirect()->action('CountriesController@index')->with('doneMessage', trans('backLang.addDone'));
    }

    /**
     * Show the form for editing the specified country.
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
            $Country = Country::find($id);
        }
        if (count($Country) > 0) {
            return view("backEnd.countries.edit", compact("Country"));
        } else {
            return redirect()->action('CountriesController@index');
        }
    }

    /**
     * Update the specified country in storage.
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

        $Country = Country::find($id);
        if (count($Country) > 0) {
            $this->validate($request, [
                'title_en' => 'required',
                'title_ar' => 'required',
                'code' => 'required',
            ]);

            $Country->title_en = $request->title_en;
            $Country->title_ar = $request->title_ar;
            $Country->code = $request->code;
            $Country->tel = $request->tel;
            $Country->sort_order = $request->sort_order;
            $Country->updated_at = date("Y-m-d H:i:s");
            $Country->save();
            return redirect()->action('CountriesController@edit', $id)->with('doneMessage', trans('backLang.saveDone'));
        } else {
            return redirect()->action('CountriesController@index');
        }
    }

}