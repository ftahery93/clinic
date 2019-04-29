<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use DateTime;
use App\Models\Admin\RegisteredUser;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;
use App\Helpers\Common;
use Image;

class RegisteredUserController extends Controller {

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:registeredUsers');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('registeredUsers-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('registeredUsers-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('registeredUsers-edit');


        $RegisteredUser = RegisteredUser::
                join('countries', 'countries.id', '=', 'registered_users.country_id')
                ->select('registered_users.id', 'registered_users.fullname', 'registered_users.email', 'registered_users.mobile', 'countries.name_en As country', 'registered_users.status', 'registered_users.created_at')               
                ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($RegisteredUser)
                            ->editColumn('created_at', function ($RegisteredUser) {
                                $newYear = new Carbon($RegisteredUser->created_at);
                                return $newYear->format('d/m/Y');
                            })
                            ->editColumn('status', function ($RegisteredUser) {
                                return $RegisteredUser->status == 1 ? '<div class="label label-success status" sid="' . $RegisteredUser->id . '" value="0"><i class="entypo-check"></i></div>' : '<div class="label label-secondary status"  sid="' . $RegisteredUser->id . '" value="1"><i class="entypo-cancel"></i></div>';
                            })
                            ->editColumn('id', function ($RegisteredUser) {
                                return '<input tabindex="5" type="checkbox" class="icheck-14 check"   name="ids[]" value="' . $RegisteredUser->id . '">';
                            })
                            ->editColumn('action', function ($RegisteredUser) {
                                if ($this->EditAccess)
                                    return '<a href="' . url('admin/registeredUsers') . '/' . $RegisteredUser->id . '/edit" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a> ';
                            })
                            ->make();
        }

        return view('admin.registeredUsers.index')
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
        $this->CreateAccess = Permit::AccessPermission('registeredUsers-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        //Get all countries
        $countries = DB::table('countries')
                ->select('id', 'name_en')
                ->where('status', 1)
                ->get();

        return view('admin.registeredUsers.create')
                        ->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate
        $validator = Validator::make($request->only(['fullname', 'email', 'password', 'password_confirmation', 'country_id', 'mobile']), [
                    'fullname' => 'required',
                    'email' => 'required|email|unique:registered_users',
                    'password' => 'required|min:6|confirmed',
                    'country_id' => 'required',
                    'mobile' => 'required|digits:8|unique:registered_users'
        ]);


        // validation failed
        if ($validator->fails()) {

            return redirect('admin/registeredUsers/create')
                            ->withErrors($validator)->withInput();
        } else {
            $input = $request->only(['fullname', 'email', 'mobile', 'status', 'country_id']);
           
            $input = $request->except(['password_confirmation']);
            $input['original_password'] = $request->password;
            $input['password'] = sha1($request->password);
            //Icon Image 
            if ($request->hasFile('profile_image')) {
                $profile_image = $request->file('profile_image');
                $thumbnailImage = Image::make($profile_image);
                $filename = time() . '.' . $profile_image->getClientOriginalExtension();
                $destinationPath = public_path('images/');
                $profile_image->move($destinationPath, $filename);
                //For resize image 
                $thumbnailImage->resize(config('global.PrimaryImageW'), config('global.PrimaryImageH'));
                $thumbnailImage->save($destinationPath . $filename);
                $input['profile_image'] = $filename;
            }
            
            RegisteredUser::create($input);

            //logActivity
            LogActivity::addToLog('RegisteredUser - ' . $request->name, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/registeredUsers');
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
        $this->EditAccess = Permit::AccessPermission('registeredUsers-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');


        $RegisteredUser = RegisteredUser::find($id);

        //Get all countries
        $countries = DB::table('countries')
                ->select('id', 'name_en')
                ->where('status', 1)
                ->get();


        // show the edit form and pass the nerd
        return View::make('admin.registeredUsers.edit')
                        ->with('RegisteredUser', $RegisteredUser)
                        ->with('countries', $countries);
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
        $this->EditAccess = Permit::AccessPermission('registeredUsers-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {
            $RegisteredUser = RegisteredUser::findOrFail($id);
            $RegisteredUser->update(['status' => $request->status]);
            return response()->json(['response' => config('global.statusUpdated')]);
        }
        $RegisteredUser = RegisteredUser::findOrFail($id);

        // validate
        $validator = Validator::make($request->only(['fullname', 'email', 'mobile', 'country_id', 'password', 'password_confirmation']), [
                    'fullname' => 'required',
                    'email' => 'required|unique:registered_users,email,' . $id,
                    'country_id' => 'required',
                    'mobile' => 'required|digits:8|unique:registered_users,mobile,' . $id,
                    'password' => 'sometimes|min:6|confirmed'
        ]);

        

        // validation failed
        if ($validator->fails()) {
            return redirect('admin/registeredUsers/' . $id . '/edit')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->only(['fullname', 'email', 'mobile', 'status', 'country_id']);
            $input = $request->except(['password_confirmation']);

            if ($request->has('password')) {
                $input['password'] = sha1($request->password);
                $input['original_password'] = $request->password;
            } else {
                $input = $request->except(['password']);
            }
            
             //If Uploaded Image removed           
            if ($request->uploaded_image_removed != 0 && !$request->hasFile('profile_image')) {
                //Remove previous images
                $destinationPath = public_path('images/');
                if (file_exists($destinationPath . $RegisteredUser->profile_image) && $RegisteredUser->profile_image != '') {
                    unlink($destinationPath . $RegisteredUser->profile_image);
                }
                $input['profile_image'] = '';
            } else {
                //Icon Image 
                if ($request->hasFile('profile_image')) {
                    $profile_image = $request->file('profile_image');
                    $thumbnailImage = Image::make($profile_image);
                    $filename = time() . '.' . $profile_image->getClientOriginalExtension();
                    $destinationPath = public_path('images/');
                    $profile_image->move($destinationPath, $filename);
                    //For resize image                   
                    $thumbnailImage->resize(config('global.PrimaryImageW'), config('global.PrimaryImageH'));
                    $thumbnailImage->save($destinationPath . $filename);

                    //Remove previous images
                    if (file_exists($destinationPath . $RegisteredUser->profile_image) && $RegisteredUser->profile_image != '') {
                        unlink($destinationPath . $RegisteredUser->profile_image);
                    }
                    $input['profile_image'] = $filename;
                }
            }

            $RegisteredUser->fill($input)->save();

            //logActivity
            LogActivity::addToLog('RegisteredUser - ' . $request->name, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/registeredUsers');
        }
    }

    /**
     * Display a Trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashedlist(Request $request) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('registeredUsers-delete');
        $RegisteredUser = RegisteredUser::
                        select('id', 'fullname', 'deleted_at')
                        ->onlyTrashed()->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($RegisteredUser)
                            ->editColumn('deleted_at', function ($RegisteredUser) {
                                $newYear = new Carbon($RegisteredUser->deleted_at);
                                return $newYear->format('d/m/Y');
                            })
                            ->editColumn('action', function ($RegisteredUser) {
                                if ($this->DeleteAccess)
                                    return '<a  class="btn btn-success tooltip-primary btn-small restore" data-id="' . $RegisteredUser->id . '"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Restore Record"><i class="entypo-ccw"></i></a>';
                                // . '<a  class="btn btn-danger tooltip-primary btn-small delete" data-id="' . $RegisteredUser->id . '"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record" style="margin-left:10px;"><i class="entypo-cancel"></i></a>';
                            })
                            ->make();
        }

        return view('admin.registeredUsers.trashedlist')->with('DeleteAccess', $this->DeleteAccess);
    }

    /**
     * ForceDelete Record.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('registeredUsers-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {
            //Delete profile image for vendor
            $RegisteredUser = RegisteredUser::withTrashed()->find($id);

            $destinationPath = public_path('images/');
            if (!empty($RegisteredUser)) {
                if (file_exists($destinationPath . $RegisteredUser->profile_image) && $RegisteredUser->profile_image != '') {
                    @unlink($destinationPath . $RegisteredUser->profile_image);
                }
            }
            //logActivity
            //fetch title                        
            $groupname = $RegisteredUser->name;

            LogActivity::addToLog('RegisteredUser - ' . $groupname, 'deleted');

            RegisteredUser::onlyTrashed()->where('id', '=', $id)->forceDelete();
            return response()->json(['response' => config('global.deletedRecords')]);
        }
    }

    /**
     * Restore Record.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function restore($id) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('registeredUsers-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {

            //logActivity
            //fetch title
            $RegisteredUser = RegisteredUser::withTrashed()->find($id);
            $groupname = $RegisteredUser->fullname;

            LogActivity::addToLog('RegisteredUser - ' . $groupname, 'restore');
            RegisteredUser::withTrashed()->find($id)->restore();

            return response()->json(['response' => config('global.restoreRecord')]);
        }
    }

    /**
     * Remove the Multiple resource from storage.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function trashMany(Request $request) {

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('registeredUsers-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        $all_data = $request->except('_token', 'table-4_length');
        //logActivity
        //fetch title
        $RegisteredUser = RegisteredUser::select('fullname')
                ->whereIn('id', $all_data['ids'])
                ->get();

        $name = $RegisteredUser->pluck('fullname');
        $groupname = $name->toJson();

        LogActivity::addToLog('RegisteredUser - ' . $groupname, 'trashed');

        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            //Check if records exist in payment details
            $RegisteredUser = RegisteredUser::findOrFail($id);
            if ($RegisteredUser->paymentdetail($id) == 0) {
                RegisteredUser::destroy($id);
                // redirect
                Session::flash('message', config('global.trashedRecords'));
            } else {
                // redirect
                Session::flash('error', config('global.relationExist'));
            }
        }

        return redirect('admin/registeredUsers');
    }

}
