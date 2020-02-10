<?php

namespace App\Http\Controllers;


use App\Governorate;
use App\Permissions;
use App\Country;
use Auth;
use DB;
use Illuminate\Http\Request;
use Redirect;


class GovernorateController extends Controller
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
            $Governorates = Governorate::select('governorates.*', 'countries.name_en AS country_name')
                ->leftJoin('countries', 'countries.id', '=', 'governorates.country_id')
                ->orderby('governorates.updated_at', 'DESC')
                ->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.governorates", compact("Governorates", "Permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countries = Country::all();

        return view("backend.governorate.create", compact("Countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
            'price' => 'required',
            'country_id' => 'required|exists:countries,id'
        ]);


        $Governorate = new Governorate;
        $Governorate->name_en = $request->name_en;
        $Governorate->name_ar = $request->name_ar;
        $Governorate->country_id = $request->country_id;
        $Governorate->price = $request->price;

        //Get Country Code
        $Country = Country::find($request->country_id);
        if ($Country) {
            $Governorate->code = $Country->iso_code_2;
        }


        $Governorate->status = 1;
        $Governorate->save();

        return redirect()->action('GovernorateController@index')->with('doneMessage', trans('backend.addDone'));
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
            $Governorate = DB::table('governorates')->find($id);
        }

        $Countries = Country::all();

        if ($Governorate != null) {
            return view("backend.governorate.edit", compact("Governorate", "Countries"));
        } else {
            return redirect()->action('GovernorateController@index');
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

        $Governorate = Governorate::find($id);
        if ($Governorate != null) {
            $this->validate($request, [
                'name_en' => 'required',
                'name_ar' => 'required',
                'price' => 'required',
                'country_id' => 'required|exists:countries,id'
            ]);


            $Governorate->name_en = $request->name_en;
            $Governorate->name_ar = $request->name_ar;
            $Governorate->country_id = $request->country_id;
            $Governorate->price = $request->price;

            //Get Country Code
            $Country = Country::find($request->country_id);
            if ($Country) {
                $Governorate->code = $Country->iso_code_2;
            }


            $Governorate->status = $request->status;
            $Governorate->updated_at = date("Y-m-d H:i:s");

            $Governorate->save();
            return redirect()->action('GovernorateController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('GovernorateController@index');
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

        if (empty($request->ids)) {

            return redirect()->route('company_users_list');
        }

        if ($request->action == "activate") {
            Governorate::wherein('id', $request->ids)->update(['status' => 1]);
        } elseif ($request->action == "block") {
            Governorate::wherein('id', $request->ids)->where('id', '!=', 1)->update(['status' => 0]);
        } elseif ($request->action == "delete") {
            Governorate::wherein('id', $request->ids)->where('id', "!=", 1)->delete();
        }

        return redirect()->action('GovernorateController@index')->with('doneMessage', trans('backend.saveDone'));
    }
}
