<?php

namespace App\Http\Controllers;

use App\ExceptionalCity;
use App\City;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use DB;

class ExceptionalCityController extends Controller
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
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $exceptionalCities = ExceptionalCity::select('exception_cities.id','cities.name_en As name')
            ->join('cities','cities.id','=','exception_cities.city_id')->paginate(env('BACKEND_PAGINATION'));          
        }       
       
        return view("backend.exceptionalCities", compact("exceptionalCities"));
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

        $cities= City::select('id', 'name_en')
        ->whereNotIn('id', DB::table('exception_cities')->pluck('city_id'))
        ->get();
        

        return view("backend.exceptional_cities.create", compact("cities"));
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
            'city_id' => 'required',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ]);

        $Category = new ExceptionalCity;
        $Category->city_id = $request->city_id;
        $Category->price = $request->price;
        $Category->save();

        return redirect()->action('ExceptionalCityController@index')->with('doneMessage', trans('backend.addDone'));
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
            $ExceptionalCity = ExceptionalCity::find($id);
        }
        if ($ExceptionalCity != null) {
            $ExceptionalCity->delete();
            return redirect()->action('ExceptionalCityController@index')->with('doneMessage', trans('backend.deleteDone'));
        } else {
            return redirect()->action('ExceptionalCityController@index');
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
             
            return redirect()->route('exceptionalCity_list');
        }

        if ($request->action == "delete") {
            // Check Permissions
            if (!@Auth::user()->permissionsGroup->delete_status) {
                return Redirect::to(route('NoPermission'))->send();
            }

            ExceptionalCity::wherein('id', $request->ids)
                ->delete();

        }
        return redirect()->action('ExceptionalCityController@index')->with('doneMessage', trans('backend.saveDone'));
    }
}
