<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Helpers\Permit;
use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator;
use View;
use Yajra\Datatables\Datatables;

class LanguageManagementController extends Controller
{

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:languageManagement');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('languageManagement-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('languageManagement-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('languageManagement-edit');

        $LanguageManagement = LanguageManagement::
            select('id', 'name', 'label_en', 'label_ar', 'status', 'created_at')
            ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($LanguageManagement)
                ->editColumn('created_at', function ($LanguageManagement) {
                    $newYear = new Carbon($LanguageManagement->created_at);
                    return $newYear->format('d/m/Y');
                })
            // ->editColumn('status', function ($LanguageManagement) {
            //     return $LanguageManagement->status == 1 ? '<div class="label label-success status" sid="' . $LanguageManagement->id . '" value="0"><i class="entypo-check"></i></div>' : '<div class="label label-secondary status"  sid="' . $LanguageManagement->id . '" value="1"><i class="entypo-cancel"></i></div>';
            // })
                ->editColumn('id', function ($LanguageManagement) {
                    return '<input tabindex="5" type="checkbox" class="icheck-14 check"   name="ids[]" value="' . $LanguageManagement->id . '">';
                })
                ->editColumn('action', function ($LanguageManagement) {
                    if ($this->EditAccess) {
                        return '<a href="' . url('admin/languageManagement') . '/' . $LanguageManagement->id . '/edit" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a>';
                    }

                })
                ->rawColumns(['id', 'status', 'action'])
                ->make();
        }

        return view('admin.languageManagement.index')
            ->with('CreateAccess', $this->CreateAccess)
            ->with('DeleteAccess', $this->DeleteAccess)
            ->with('EditAccess', $this->EditAccess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('languageManagement-create');
        if (!$this->CreateAccess) {
            return redirect('errors/401');
        }

        return view('admin.languageManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate
        $validator = Validator::make($request->all(), [
            'label_en' => 'required',
            'label_ar' => 'required',
        ]);

        // validation failed
        if ($validator->fails()) {

            return redirect('admin/languageManagement/create')
                ->withErrors($validator)->withInput();
        } else {
            $input = $request->all();
            $input['title'] = snake_case($input['name']);

            LanguageManagement::create($input);

            //logActivity
            LogActivity::addToLog('LanguageManagement - ' . $request->label_en, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/languageManagement');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('languageManagement-edit');
        if (!$this->EditAccess) {
            return redirect('errors/401');
        }

        $LanguageManagement = LanguageManagement::find($id);

        // show the edit form and pass the nerd
        return View::make('admin.languageManagement.edit')
            ->with('LanguageManagement', $LanguageManagement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('languageManagement-edit');
        if (!$this->EditAccess) {
            return redirect('errors/401');
        }

        //Ajax request
        if (request()->ajax()) {
            $LanguageManagement = LanguageManagement::findOrFail($id);
            $LanguageManagement->update(['status' => $request->status]);
            return response()->json(['response' => config('global.statusUpdated')]);
        }
        $LanguageManagement = LanguageManagement::findOrFail($id);
        // validate
        $validator = Validator::make($request->all(), [
            'label_en' => 'required',
            'label_ar' => 'required',
        ]);

        // validation failed
        if ($validator->fails()) {
            return redirect('admin/languageManagement/' . $id . '/edit')
                ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();
            $input['title'] = snake_case($input['name']);
            $LanguageManagement->fill($input)->save();

            //logActivity
            LogActivity::addToLog('LanguageManagement - ' . $request->label_en, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/languageManagement');
        }
    }

    /**
     * Remove the Multiple resource from storage.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('languageManagement-delete');
        if (!$this->DeleteAccess) {
            return redirect('errors/401');
        }

        $all_data = $request->except('_token', 'table-4_length');

        //logActivity
        //fetch title
        $LanguageManagement = LanguageManagement::
            select('label_en')
            ->whereIn('id', $all_data['ids'])
            ->get();

        $name = $LanguageManagement->pluck('label_en');
        $groupname = $name->toJson();

        LogActivity::addToLog('LanguageManagement - ' . $groupname, 'deleted');

        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            LanguageManagement::destroy($id);
        }

        // redirect
        Session::flash('message', config('global.deletedRecords'));

        return redirect('admin/languageManagement');
    }

    /**
     * Update Localisation file.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function updateLocale(Request $request)
    { //Write update data into locale file
        $lang = ($request->lang) ? $request->lang : 'en';

        $LanguageManagement = LanguageManagement::
            select('title', 'label_en', 'label_ar')
            ->get();

        $langstr = "<?php";
        $langstr .= "\n return [";
        $langstr .= "\n";
        $langstr .= " ";
        $myfile = fopen(base_path('resources/lang/' . $lang . '/messages.php'), "w") or die("Unable to open file!");

        foreach ($LanguageManagement as $row) {
            $label = ($lang == 'en') ? $row->label_en : $row->label_ar;
            $langstr .= "'" . $row->title . "'=> '" . $label . "', \n";
        }

        $langstr .= " ";
        $langstr .= "];";

        fwrite($myfile, $langstr);
        fclose($myfile);

        //LogActivity::addToLog('LanguageManagement - file ', 'updated');

        return redirect('admin/languageManagement');
    }

}
