<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\Country;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;

class CountryController extends Controller {

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:master');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('master-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('master-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('master-edit');

        $Country = Country::
                select('id', 'name_en', 'country_code', 'status', 'created_at')                
                ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Country)
                            ->editColumn('created_at', function ($Country) {
                                $newYear = new Carbon($Country->created_at);
                                return $newYear->format('d/m/Y');
                            })
                            ->editColumn('status', function ($Country) {
                                return $Country->status == 1 ? '<div class="label label-success status" sid="' . $Country->id . '" value="0"><i class="entypo-check"></i></div>' : '<div class="label label-secondary status"  sid="' . $Country->id . '" value="1"><i class="entypo-cancel"></i></div>';
                            })
                            ->editColumn('id', function ($Country) {
                                return '<input tabindex="5" type="checkbox" class="icheck-14 check"   name="ids[]" value="' . $Country->id . '">';
                            })
                            ->editColumn('action', function ($Country) {
                                if ($this->EditAccess)
                                    return '<a href="'.url('admin/countries') .'/' . $Country->id . '/edit" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a>';
                            })                            
                            ->make();
        }

        return view('admin.masters.countries.index')
                        ->with('CreateAccess', $this->CreateAccess)
                        ->with('DeleteAccess', $this->DeleteAccess)
                        ->with('EditAccess', $this->EditAccess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('master-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        return view('admin.masters.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // validate
        $validator = Validator::make($request->all(), [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'country_code' => 'required',
        ]);

        // validation failed
        if ($validator->fails()) {

            return redirect('admin/countries/create')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();

            Country::create($input);

            //logActivity
            LogActivity::addToLog('Country - ' . $request->name_en, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/countries');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('master-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        $Country = Country::find($id);


        // show the edit form and pass the nerd
        return View::make('admin.masters.countries.edit')
                        ->with('Country', $Country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('master-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {
            $Country = Country::findOrFail($id);
            $Country->update(['status' => $request->status]);
            return response()->json(['response' => config('global.statusUpdated')]);
        }
        $Country = Country::findOrFail($id);
        // validate
        $validator = Validator::make($request->all(), [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'country_code' => 'required',
        ]);

        // validation failed
        if ($validator->fails()) {

            return redirect('admin/countries/' . $id . '/edit')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();
            $Country->fill($input)->save();

            //logActivity
            LogActivity::addToLog('Country - ' . $request->name_en, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/countries');
        }
    }


    /**
     * Remove the Multiple resource from storage.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request) {

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('master-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        $all_data = $request->except('_token', 'table-4_length');

        //logActivity
        //fetch title
        $Country = Country::
                select('name_en')
                ->whereIn('id', $all_data['ids'])
                ->get();

        $name = $Country->pluck('name_en');
        $groupname = $name->toJson();

        LogActivity::addToLog('Country - ' . $groupname, 'deleted');

        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            Country::destroy($id);
        }

        // redirect
        Session::flash('message', config('global.deletedRecords'));

        return redirect('admin/countries');
    }

}
