<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\Information;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;

class InformationController extends Controller {

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:information');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('information-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('information-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('information-edit');


        $Information = Information::
                select('id', 'name_en', 'status', 'created_at')
                ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Information)
                            ->editColumn('created_at', function ($Information) {
                                $newYear = new Carbon($Information->created_at);
                                return $newYear->format('d/m/Y');
                            })                            
                            ->editColumn('status', function ($Information) {
                                return $Information->status == 1 ? '<div class="label label-success status" sid="' . $Information->id . '" value="0"><i class="entypo-check"></i></div>' : '<div class="label label-secondary status"  sid="' . $Information->id . '" value="1"><i class="entypo-cancel"></i></div>';
                            })
                            ->editColumn('id', function ($Information) {
                                return '<input tabindex="5" type="checkbox" class="icheck-14 check"   name="ids[]" value="' . $Information->id . '">';
                            })
                            ->editColumn('action', function ($Information) {
                                if ($this->EditAccess)
                                    return '<a href="'.url('admin/information') .'/' . $Information->id . '/edit" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a>';
                            })
                            ->make();
        }

        return view('admin.information.index')
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
        $this->CreateAccess = Permit::AccessPermission('information-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // validate
        $validator = Validator::make($request->only(['name_en', 'name_ar', 'description_en', 'description_ar']), [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'description_en' => 'required',
                    'description_ar' => 'required'
        ]);


        // validation failed
        if ($validator->fails()) {

            return redirect('admin/information/create')
                            ->withErrors($validator)->withInput();
        } else {
            $input = $request->all();

            Information::create($input);

            //logActivity
            LogActivity::addToLog('Information - ' . $request->name_en, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/information');
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
        $this->EditAccess = Permit::AccessPermission('information-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        $Information = Information::find($id);

        // show the edit form and pass the nerd
        return View::make('admin.information.edit')
                        ->with('Information', $Information);
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
        $this->EditAccess = Permit::AccessPermission('information-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {
            $Information = Information::findOrFail($id);
            $Information->update(['status' => $request->status]);
            return response()->json(['response' => config('global.statusUpdated')]);
        }
        $Information = Information::findOrFail($id);
        // validate
        $validator = Validator::make($request->only(['name_en', 'name_ar', 'description_en', 'description_ar']), [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'description_en' => 'required',
                    'description_ar' => 'required'
        ]);


        // validation failed
        if ($validator->fails()) {
            return redirect('admin/information/' . $id . '/edit')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();

            $Information->fill($input)->save();

            //logActivity
            LogActivity::addToLog('Information - ' . $request->name_en, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/information');
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
        $this->DeleteAccess = Permit::AccessPermission('information-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        $all_data = $request->except('_token', 'table-4_length');

        //logActivity
        //fetch title
        $Information = Information::
                select('name_en')
                ->whereIn('id', $all_data['ids'])
                ->get();

        $name = $Information->pluck('name_en');
        $groupname = $name->toJson();

        LogActivity::addToLog('Information - ' . $groupname, 'deleted');
   
        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            Information::destroy($id);
        }

        // redirect
        Session::flash('message', config('global.deletedRecords'));

        return redirect('admin/information');
    }

}
