<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\Category;
use App\Models\Admin\Service;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;

class ServiceController extends Controller {

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:services');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $category_id = $request->category_id;
        $Category = Category::select('name_en')->where('id', $category_id)->first();

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('services-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('services-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('services-edit');

        $Service = Service::
                select('id', 'name_en', 'status', 'created_at')
                ->where('category_id',$category_id)
                ->get();
        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Service)
                            ->editColumn('created_at', function ($Service) {
                                $newYear = new Carbon($Service->created_at);
                                return $newYear->format('d/m/Y');
                            })
                            ->editColumn('status', function ($Service) {
                                return $Service->status == 1 ? '<div class="label label-success status" sid="' . $Service->id . '" value="0"><i class="entypo-check"></i></div>' : '<div class="label label-secondary status"  sid="' . $Service->id . '" value="1"><i class="entypo-cancel"></i></div>';
                            })
                            ->editColumn('id', function ($Service) {
                                return '<input tabindex="5" type="checkbox" class="icheck-14 check"   name="ids[]" value="' . $Service->id . '">';
                            })
                            ->editColumn('action', function ($Service) use($category_id) {
                                if ($this->EditAccess)
                                    return '<a href="' . url('admin/services') . '/' . $Service->id . '/edit/'. $category_id.'" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a> ';
                            })
                            ->make();
        }

        return view('admin.services.index')
                        ->with('category_id', $category_id)
                        ->with('category_name', $Category->name_en)
                        ->with('CreateAccess', $this->CreateAccess)
                        ->with('DeleteAccess', $this->DeleteAccess)
                        ->with('EditAccess', $this->EditAccess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('services-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $category_id = $request->category_id;

        $Category = Category::select('name_en')->where('id', $category_id)->first();

        return view('admin.services.create', compact('category_id'))->with('category_name', $Category->name_en);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $category_id = $request->category_id;
            
        // validate
        $validator = Validator::make($request->all(), [
                    'name_en' => 'required',
                    'name_ar' => 'required'
        ]);

        // validation failed
        if ($validator->fails()) {

            return redirect('admin/services/create')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();            
            $input['category_id']=$category_id;

            Service::create($input);

            //logService
            LogActivity::addToLog('Service - ' . $request->name_en, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/services/'.$category_id);
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
    public function edit(Request $request, $id) {

          $category_id = $request->category_id;
          
        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('services-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        $Service = Service::find($id);

        $Category = Category::select('name_en')->where('id', $category_id)->first();
        // show the edit form and pass the nerd
        return View::make('admin.services.edit')
                         ->with('category_id', $category_id)
                        ->with('Service', $Service)
                        ->with('category_name', $Category->name_en);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
         $category_id = $request->category_id;

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('services-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {
            $Service = Service::findOrFail($id);
            $Service->update(['status' => $request->status]);
            return response()->json(['response' => config('global.statusUpdated')]);
        }
        $Service = Service::findOrFail($id);
        // validate
        $validator = Validator::make($request->all(), [
                    'name_en' => 'required',
                    'name_ar' => 'required'
        ]);


        // validation failed
        if ($validator->fails()) {

            return redirect('admin/services/' . $id . '/edit')
                            ->withErrors($validator)->withInput();
        } else {
            $input = $request->all();    
            $input['category_id']=$category_id;

            $Service->fill($input)->save();

            //logService
            LogActivity::addToLog('Service - ' . $request->name_en, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/services/'.$category_id);
        }
    }

    /**
     * Remove the Multiple resource from storage.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request) {
 
        $category_id = $request->category_id;
        
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('services-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        $all_data = $request->except('_token', 'table-4_length');

        //logService
        //fetch title
        $Service = Service::
                select('name_en')
                ->whereIn('id', $all_data['ids'])
                ->get();

        $name = $Service->pluck('name_en');
        $groupname = $name->toJson();

        LogActivity::addToLog('Service - ' . $groupname, 'deleted');

        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            Service::destroy($id);
        }


        // redirect
        Session::flash('message', config('global.deletedRecords'));

        return redirect('admin/services/'.$category_id);
    }
    

}
