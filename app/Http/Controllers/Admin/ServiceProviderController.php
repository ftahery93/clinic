<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use DateTime;
use Image;
use App\Models\Admin\RegisteredUser;
use App\Models\Admin\ServiceProviderAdditionalQuotationField;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceProviderImage;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;
use App\Models\Admin\Category;
use App\Helpers\Common;

class ServiceProviderController extends Controller {

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:serviceProviders');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('serviceProviders-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('serviceProviders-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('serviceProviders-edit');


        $RegisteredUser = RegisteredUser::
                join('countries', 'countries.id', '=', 'registered_users.country_id')
                ->select('registered_users.id', 'registered_users.company_name', DB::raw('(CASE WHEN registered_users.serviceprovider_type =0 THEN "Individual" ELSE "Company" END) AS serviceprovider_type'), 'registered_users.email', 'registered_users.mobile', 'countries.name_en As country', 'registered_users.status', 'registered_users.created_at')
                ->where('registered_users.user_type', 1)
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
                                    return '<a href="' . url('admin/serviceProviders') . '/' . $RegisteredUser->id . '/edit" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a>'
                                            . ' <a href="' . url('admin/serviceProviders') . '/' . $RegisteredUser->id . '/services" class="btn btn-primary tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Services" data-original-title="Services"><i class="entypo-lifebuoy"></i></a>'
                                            . ' <a href="' . url('admin/serviceProviders') . '/' . $RegisteredUser->id . '/uploadImages" class="btn btn-red tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Upload Images" data-original-title="Upload Images"><i class="entypo-picture"></i></a>'
                                            . ' <a href="' . url('admin/userQuotationRequestedList') . '/' . $RegisteredUser->id . '" class="btn btn-gold tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Quotation Requested List" data-original-title="Quotation Requested List"><i class="entypo-book-open"></i></a>'
                                            . ' <a href="' . url('admin/serviceProviders') . '/' . $RegisteredUser->id . '/requestQuotation" class="btn btn-orange tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Quotation Request Form" data-original-title="Quotation Request Form"><i class="entypo-doc-text-inv"></i></a>';
                            })
                            ->make();
        }

        return view('admin.serviceProviders.index')
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
        $this->CreateAccess = Permit::AccessPermission('serviceProviders-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        //Get all countries
        $countries = DB::table('countries')
                ->select('id', 'name_en')
                ->where('status', 1)
                ->get();

        $subcate = new Category;
        try {
            $allSubCategories = $subcate->getCategories();
        } catch (Exception $e) {
            //no parent category found
        }

        return view('admin.serviceProviders.create', compact('allSubCategories'))
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
        $validator = Validator::make($request->all(), [
                    'categories' => 'required|array|min:1',
                    'serviceprovider_type' => 'required',
                    'company_name' => 'required',
                    'email' => 'required|email|unique:registered_users',
                    'password' => 'required|min:6|confirmed',
                    'country_id' => 'required',
                    'mobile' => 'required|digits_between:1,24|unique:registered_users',
                    'council_specification' => 'required',
                    'registration_number' => 'required',
                    'address' => 'required',
                    'company_description_en' => 'required',
                    'company_description_ar' => 'required',
                    'website_address' => 'sometimes|url',
                    'phone' => 'sometimes|digits_between:1,24',
                    'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        // validation failed
        if ($validator->fails()) {

            return redirect('admin/serviceProviders/create')
                            ->withErrors($validator)->withInput();
        } else {
            $input = $request->all();
            $input = $request->except(['password_confirmation']);
            $input['original_password'] = $request->password;
            $input['password'] = sha1($request->password);

            //Categories in json format
            $collection = collect($request->categories);
            $input['categories'] = $collection->implode(',');

            //User Type 1 if service provider
            $input['user_type'] = 1;

            //Profile Image 
            if ($request->hasFile('profile_image')) {
                $profile_image = $request->file('profile_image');
                $thumbnailImage = Image::make($profile_image);
                $filename = time() . '.' . $profile_image->getClientOriginalExtension();
                $destinationPath = public_path('registeredUsers_images/');
                $profile_image->move($destinationPath, $filename);
                //For resize image 
                $thumbnailImage->resize(config('global.PrimaryProfileImageW'), config('global.PrimaryProfileImageH'));
                $thumbnailImage->save($destinationPath . $filename);
                $input['profile_image'] = $filename;
            }


            $id = RegisteredUser::create($input)->id;

            //Add Free Package 
            Common::freePackage($id);


            //logActivity
            LogActivity::addToLog('RegisteredUser - ' . $request->company_name, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/serviceProviders');
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
        $this->EditAccess = Permit::AccessPermission('serviceProviders-edit');
        if (!$this->EditAccess)
            return redirect('errors/401');


        $RegisteredUser = RegisteredUser::find($id);

        //Get all countries
        $countries = DB::table('countries')
                ->select('id', 'name_en')
                ->where('status', 1)
                ->get();

        //Get json value
        $collection = collect(explode(',', $RegisteredUser->categories));
        $collection->toArray();
        //dd($collection);

        $subcate = new Category;
        try {
            $allSubCategories = $subcate->getCategories();
        } catch (Exception $e) {
            //no parent category found
        }

        // show the edit form and pass the nerd
        return View::make('admin.serviceProviders.edit')
                        ->with('RegisteredUser', $RegisteredUser)
                        ->with('allSubCategories', $allSubCategories)
                        ->with('collection', $collection)
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
        $this->EditAccess = Permit::AccessPermission('serviceProviders-edit');
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
        $validator = Validator::make($request->all(), [
                    'categories' => 'required|array|min:1',
                    'serviceprovider_type' => 'required',
                    'company_name' => 'required',
                    'email' => 'required|email|unique:registered_users,email,' . $id,
                    'country_id' => 'required',
                    'mobile' => 'required|digits_between:1,24|unique:registered_users,mobile,' . $id,
                    'council_specification' => 'required',
                    'registration_number' => 'required',
                    'address' => 'required',
                    'company_description_en' => 'required',
                    'company_description_ar' => 'required',
                    'website_address' => 'sometimes|url',
                    'phone' => 'sometimes|digits_between:1,24',
                    'password' => 'sometimes|min:6|confirmed'
        ]);

        // Image Validate
        //If Uploaded Image removed
        if ($request->uploaded_image_removed != 0) {
            $validator = Validator::make($request->only(['profile_image']), [
                        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

        

        // validation failed
        if ($validator->fails()) {
            return redirect('admin/serviceProviders/' . $id . '/edit')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();
            $input = $request->except(['password_confirmation']);

            if ($request->has('password')) {
                $input['password'] = sha1($request->password);
                $input['original_password'] = $request->password;
            } else {
                $input = $request->except(['password']);
            }

            //Categories in json format
            $collection = collect($request->categories);
            $input['categories'] = $collection->implode(',');

            //User Type 1 if service type
            $input['user_type'] = 1;

            //If Uploaded Image removed           
            if ($request->uploaded_image_removed != 0 && !$request->hasFile('profile_image')) {
                //Remove previous images
                $destinationPath = public_path('registeredUsers_images/');
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
                    $destinationPath = public_path('registeredUsers_images/');
                    $profile_image->move($destinationPath, $filename);
                    //For resize image                   
                    $thumbnailImage->resize(config('global.PrimaryProfileImageW'), config('global.PrimaryProfileImageH'));
                    $thumbnailImage->save($destinationPath . $filename);

                    //Remove previous images
                    if (file_exists($destinationPath . $RegisteredUser->profile_image) && $RegisteredUser->profile_image != '') {
                        unlink($destinationPath . $RegisteredUser->profile_image);
                    }
                    $input['profile_image'] = $filename;
                }
            }

            //Add Free Package 
            // Common::freePackage($id);         

            $RegisteredUser->fill($input)->save();

            //logActivity
            LogActivity::addToLog('RegisteredUser - ' . $request->company_name, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/serviceProviders');
        }
    }

    /**
     * Display a Trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashedlist(Request $request) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('serviceProviders-delete');
        $RegisteredUser = RegisteredUser::
                        select('id', 'company_name', 'deleted_at')
                        ->where('user_type', 1)
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

        return view('admin.serviceProviders.trashedlist')->with('DeleteAccess', $this->DeleteAccess);
    }

    /**
     * ForceDelete Record.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('serviceProviders-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        //Ajax request
        if (request()->ajax()) {
            //Delete profile image for vendor
            $RegisteredUser = RegisteredUser::withTrashed()->find($id);

            $destinationPath = public_path('serviceProviders_images/');
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
        $this->DeleteAccess = Permit::AccessPermission('serviceProviders-delete');
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
        $this->DeleteAccess = Permit::AccessPermission('serviceProviders-delete');
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

        return redirect('admin/serviceProviders');
    }

    //Multiple Images
    public function uploadImages(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('serviceProviders-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $userID = $request->user_id;

        $RegisteredUser = RegisteredUser::
                select('company_name')
                ->where('id', $userID)
                ->first();

        //Get All Images
        $serviceProviderImages = ServiceProviderImage::where('user_id', $userID)->get();


        return view('admin.serviceProviders.uploadImages')
                        ->with('userID', $userID)
                        ->with('RegisteredUser', $RegisteredUser->company_name)
                        ->with('serviceProviderImages', $serviceProviderImages);
    }

    //Multiple Images
    public function images(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('serviceProviders-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $userID = $request->user_id;

        if ($request->hasFile('file')) {
            $validator = Validator::make($request->only(['file']), [
                        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:800'
            ]);
            // validation failed
            if ($validator->fails()) {
                return response()->json(array('error' => config('global.errorImage')));
            } else {

                $image = $request->file('file');
                $BigImage = Image::make($image);
                $thumbnailImage = Image::make($image);
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('serviceProvider_images/');
                $thumbnailPath = public_path('serviceProvider_images/thumbnails/');
                //$image->move($destinationPath, $filename);
                // Resized image
                $BigImage->resize(config('global.BannerImageW'), config('global.BannerImageH'), function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Canvas image
                $canvas = Image::canvas(config('global.BannerImageW'), config('global.BannerImageH'));
                $canvas->insert($BigImage, 'center');
                $canvas->save($destinationPath . $filename);

                // Thumbnail image
                $thumbnailImage->resize(config('global.ServiceProviderThumbnailImageW'), config('global.ServiceProviderThumbnailImageH'), function ($constraint) {
                    $constraint->aspectRatio();
                });
                //Thumbnail Canvas
                $thumnailCanvas = Image::canvas(config('global.ServiceProviderThumbnailImageW'), config('global.ServiceProviderThumbnailImageH'));
                $thumnailCanvas->insert($thumbnailImage, 'center');
                $thumnailCanvas->save($thumbnailPath . $filename);


                $input['image'] = $filename;
                $input['user_id'] = $userID;

                $id = ServiceProviderImage::create($input)->id;


                //fetch title                
                $RegisteredUser = RegisteredUser::
                        select('company_name')
                        ->where('id', $userID)
                        ->first();

                $groupname = $RegisteredUser->company_name;

                LogActivity::addToLog('Service Provider -' . $groupname . ' Image', 'uploaded');
            }
        }

        return response()->json(array('id' => $id));
    }

    //Delete image
    public function deleteImage(Request $request) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('serviceProviders-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        $id = $request->id;

        //Ajax request
        if (request()->ajax()) {

            //Delete  image 
            $ServiceProviderImage = ServiceProviderImage::
                    select('image', 'user_id')->where('id', $id)->first();
            // dd($VendorImage);

            $destinationPath = public_path('serviceProvider_images/');
            $thumbnailPath = public_path('serviceProvider_images/thumbnails/');


            if (!empty($ServiceProviderImage)) {
                if (file_exists($destinationPath . $ServiceProviderImage->image) && $ServiceProviderImage->image != '') {
                    @unlink($destinationPath . $ServiceProviderImage->image);
                    @unlink($thumbnailPath . $ServiceProviderImage->image);
                }
            }

            ServiceProviderImage::destroy($id);

            //fetch title                
            $RegisteredUser = RegisteredUser::
                    select('company_name')
                    ->where('id', $ServiceProviderImage->user_id)
                    ->first();


            $groupname = $RegisteredUser->company_name;

            LogActivity::addToLog('Service Provider -' . $groupname . ' Image', 'deleted');

            $images = ServiceProviderImage::get();

            return response()->json(array('response' => config('global.deletedRecords'), 'id' => $id));
        }
    }

    //Service provider related services
    public function service(Request $request) {
        $serviceProvider_id = $request->serviceProvider_id;
        $ServiceProvider = RegisteredUser::select('company_name')->where('id', $serviceProvider_id)->where('user_type', 1)->first();

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('services-create');

        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('services-delete');

        //Check Edit Access Permission
        $this->EditAccess = Permit::AccessPermission('services-edit');

        $Service = Service::
                select('id', 'name_en', 'status', 'created_at', 'name_ar')
                ->where('service_provider_id', $serviceProvider_id)
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
                            ->editColumn('action', function ($Service) use($serviceProvider_id) {
                                if ($this->EditAccess)
                                    return '<a href="#myModal2" data-val="' . $Service->id . '" name_en="' . $Service->name_en . '" '
                                            . 'name_ar="' . $Service->name_ar . '"  update="1" class="btn btn-info tooltip-primary btn-small add_record" data-toggle="modal"  data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a> ';
                            })
                            ->make();
        }

        return view('admin.serviceProviders.services')
                        ->with('serviceProvider_id', $serviceProvider_id)
                        ->with('ServiceProvider', $ServiceProvider->company_name)
                        ->with('CreateAccess', $this->CreateAccess)
                        ->with('DeleteAccess', $this->DeleteAccess)
                        ->with('EditAccess', $this->EditAccess);
    }

    //Add Services
    public function addService(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('services-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $serviceProvider_id = $request->serviceProvider_id;

        $validator = Validator::make($request->all(), [
                    'name_en' => 'required',
                    'name_ar' => 'required'
        ]);
        // validation failed
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $input = $request->except('_token', 'update', 'id');
            $input['service_provider_id'] = $serviceProvider_id;

            if ($request->update == 1) {
                DB::table('services')->where('id', $request->id)->update($input);
            } else {
                Service::create($input);
            }


            //fetch title                
            $RegisteredUser = RegisteredUser::
                    select('company_name')
                    ->where('id', $serviceProvider_id)
                    ->first();

            $groupname = $RegisteredUser->company_name;
            LogActivity::addToLog('Service Provider -' . $groupname . ' Service - ' . $request->name_en, 'created');
        }


        return response()->json(['response' => config('global.addedRecords')]);
    }

    //delete Services
    public function destroyService(Request $request) {

        $serviceProvider_id = $request->serviceProvider_id;

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

        //fetch title                
        $RegisteredUser = RegisteredUser::
                select('company_name')
                ->where('id', $serviceProvider_id)
                ->first();

        $groupname = $RegisteredUser->company_name;
        LogActivity::addToLog('Service Provider -' . $groupname . ' Services - ' . $groupname, 'deleted');


        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            Service::destroy($id);
        }


        // redirect
        Session::flash('message', config('global.deletedRecords'));

        return redirect('admin/serviceProviders/' . $serviceProvider_id . '/services');
    }

    //Quotation Request form
    public function dynamicForm(Request $request) {
        \Blade::setRawTags("[[", "]]");
        \Blade::setContentTags('<%', '%>'); // for variables and all things Blade
        \Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data
        return View::make('admin.serviceProviders.dynamicForm');
    }

    public function requestQuotation(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('requestQuotation-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $serviceProvider_id = $request->id;

        //fetch title
        $ServiceProvider = RegisteredUser::select('company_name')->where('id', $serviceProvider_id)->where('user_type', 1)->first();


        return View::make('admin.serviceProviders.requestQuotation')
                        ->with('serviceProvider_id', $serviceProvider_id)
                        ->with('ServiceProvider', $ServiceProvider->company_name);
    }

    public function storeRequestQuotation(Request $request) {

        $input['service_provider_id'] = $request->serviceProvider_id;
        $serviceProviderQuotationFields = ServiceProviderAdditionalQuotationField::firstOrCreate($input);

        $input1['json_data'] = $request->jsonData;
        $serviceProviderQuotationFields->fill($input1)->save();

        return response()->json(['response' => config('global.addedRecords')]);
    }

    public function quotationFormPreview(Request $request) {
        $serviceProvider_id = $request->id;

        $jsonData = ServiceProviderAdditionalQuotationField::select('json_data')->where('service_provider_id', $serviceProvider_id)->first();

        //Get json value    
        $fields = array();
        if (!is_null($jsonData))
            $fields = json_decode($jsonData->json_data);

        $returnHTML = view('admin.serviceProviders.quotationForm')->with('fields', $fields)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    //Viewed Service Action
    public function serviceViewed(Request $request) {
        $serviceProvider_id = $request->id;
        $input['service_viewed'] = 1;
        RegisteredUser::where('id', $request->id)->update($input);
        return response()->json(array('success' => true, 'html' => $serviceProvider_id));
    }

    //Requirements
    public function requirement(Request $request) {

        $serviceProvider_id = $request->id;
        $serviceProvider_str = '';

        $RegisteredUserList = RegisteredUser::
                select('registered_users.id', 'registered_users.company_name', DB::raw('(CASE WHEN registered_users.serviceprovider_type =0 THEN "Individual" ELSE "Company" END) AS serviceprovider_type'), 'registered_users.requirements')
                ->where('registered_users.user_type', 1)
                ->whereNotNull('registered_users.requirements')
                ->where('registered_users.requirements', '!=', '');

        if ($serviceProvider_id != '' && $serviceProvider_id != null) {
            $RegisteredUserList->where('registered_users.id', $serviceProvider_id);
            $serviceProvider_str = $serviceProvider_id . '/';
        }

        $RegisteredUser = $RegisteredUserList->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($RegisteredUser)
                            ->make();
        }

        return view('admin.serviceProviders.requirements')->with('serviceProvider_str', $serviceProvider_str);
    }

    //Viewed Service Action
    public function requirementViewed(Request $request) {
        $serviceProvider_id = $request->id;
        $input['requirement_viewed'] = 1;
        RegisteredUser::where('id', $request->id)->update($input);
        return response()->json(array('success' => true, 'html' => $serviceProvider_id));
    }

}
