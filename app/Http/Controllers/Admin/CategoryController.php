<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\CategoryAdditionalQuotationField;
use App\Models\Admin\CategoryAdditionalApplyQuotationField;
use App\Models\Admin\Category;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;
use App\Helpers\Common;
use Image;

class CategoryController extends Controller {

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

        $Category = Category::
                leftjoin('categories As c', 'c.id', '=', 'categories.parent_id')
                ->select('categories.id', 'categories.name_en', DB::raw('(CASE WHEN c.name_en != "" THEN c.name_en ELSE "Main Category" END) AS parent_category'), 'categories.icon', 'categories.status', 'categories.created_at')
                //->orderBy('created_at','ASC')
                ->get();
        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Category)
                            ->editColumn('created_at', function ($Category) {
                                $newYear = new Carbon($Category->created_at);
                                return $newYear->format('d/m/Y');
                            })
                            ->editColumn('status', function ($Category) {
                                return $Category->status == 1 ? '<div class="label label-success status" sid="' . $Category->id . '" value="0"><i class="entypo-check"></i></div>' : '<div class="label label-secondary status"  sid="' . $Category->id . '" value="1"><i class="entypo-cancel"></i></div>';
                            })
                            ->editColumn('id', function ($Category) {
                                return '<input tabindex="5" type="checkbox" class="icheck-14 check"   name="ids[]" value="' . $Category->id . '">';
                            })
                            ->editColumn('action', function ($Category) {
                                if ($this->EditAccess)
                                    return '<a href="' . url('admin/categories') . '/' . $Category->id . '/edit" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Edit Records" data-original-title="Edit Records"><i class="entypo-pencil"></i></a> '
                                        . ' <a href="' . url('admin/services') . '/' . $Category->id . '" class="btn btn-primary tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Services" data-original-title="Services"><i class="entypo-lifebuoy"></i></a>'
                                            . ' <a href="' . url('admin/categories') . '/' . $Category->id . '/requestQuotation" class="btn btn-red tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Quotation Request Form" data-original-title="Quotation Request Form"><i class="entypo-doc-text-inv"></i></a> '
                                        . ' <a href="' . url('admin/categories') . '/' . $Category->id . '/quotation" class="btn btn-gold tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" title="Quotation Form" data-original-title="Quotation Form"><i class="entypo-doc"></i></a>';
                            })
                            ->editColumn('icon', function ($Category) {
                                return $Category->icon != '' ? '<img src="' . url('public/categories_icons/' . $Category->icon) . '" width="50" />' : '';
                            })
                            ->make();
        }

        return view('admin.masters.categories.index')
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

        $subcate = new Category;
        try {
            $allSubCategories = $subcate->getCategories();
        } catch (Exception $e) {
            //no parent category found
        }

        return view('admin.masters.categories.create', compact('allSubCategories'));
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
                    'parent_id' => 'required',
                    'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        // validation failed
        if ($validator->fails()) {

            return redirect('admin/categories/create')
                            ->withErrors($validator)->withInput();
        } else {

            $input = $request->all();

            //Icon Image 
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $thumbnailImage = Image::make($icon);
                $filename = time() . '.' . $icon->getClientOriginalExtension();
                $destinationPath = public_path('categories_icons/');
                $icon->move($destinationPath, $filename);
                //For resize image 
                $thumbnailImage->resize(config('global.PrimaryImageW'), config('global.PrimaryImageH'));
                $thumbnailImage->save($destinationPath . $filename);
                $input['icon'] = $filename;
            }

            Category::create($input);

            //logCategory
            LogActivity::addToLog('Category - ' . $request->name_en, 'created');

            Session::flash('message', config('global.addedRecords'));

            return redirect('admin/categories');
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

        $Category = Category::find($id);

        $subcate = new Category;
        try {
            $allSubCategories = $subcate->getCategories();
        } catch (Exception $e) {
            //no parent category found
        }

        // show the edit form and pass the nerd
        return View::make('admin.masters.categories.edit', compact('allSubCategories'))
                        ->with('Category', $Category);
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
            $Category = Category::findOrFail($id);
            $Category->update(['status' => $request->status]);
            return response()->json(['response' => config('global.statusUpdated')]);
        }
        $Category = Category::findOrFail($id);
        // validate
        $validator = Validator::make($request->only(['name_en', 'name_ar', 'parent_id']), [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'parent_id' => 'required',
        ]);

        // Image Validate
        //If Uploaded Image removed
        if ($request->uploaded_image_removed != 0) {
            $validator = Validator::make($request->only(['icon']), [
                        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

        // validation failed
        if ($validator->fails()) {

            return redirect('admin/categories/' . $id . '/edit')
                            ->withErrors($validator)->withInput();
        } else {
            $input = $request->only(['name_en', 'name_ar', 'parent_id']);

            //If Uploaded Image removed           
            if ($request->uploaded_image_removed != 0 && !$request->hasFile('icon')) {
                //Remove previous images
                $destinationPath = public_path('categories_icons/');
                if (file_exists($destinationPath . $Category->icon) && $Category->icon != '') {
                    unlink($destinationPath . $Category->icon);
                }
                $input['icon'] = '';
            } else {
                //Icon Image 
                if ($request->hasFile('icon')) {
                    $icon = $request->file('icon');
                    $thumbnailImage = Image::make($icon);
                    $filename = time() . '.' . $icon->getClientOriginalExtension();
                    $destinationPath = public_path('categories_icons/');
                    $icon->move($destinationPath, $filename);
                    //For resize image                   
                    $thumbnailImage->resize(config('global.PrimaryImageW'), config('global.PrimaryImageH'));
                    $thumbnailImage->save($destinationPath . $filename);

                    //Remove previous images
                    if (file_exists($destinationPath . $Category->icon) && $Category->icon != '') {
                        unlink($destinationPath . $Category->icon);
                    }
                    $input['icon'] = $filename;
                }
            }

            $Category->fill($input)->save();

            //logCategory
            LogActivity::addToLog('Category - ' . $request->name_en, 'updated');

            Session::flash('message', config('global.updatedRecords'));

            return redirect('admin/categories');
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

        //logCategory
        //fetch title
        $Category = Category::
                select('name_en')
                ->whereIn('id', $all_data['ids'])
                ->get();

        $name = $Category->pluck('name_en');
        $groupname = $name->toJson();

        LogActivity::addToLog('Category - ' . $groupname, 'deleted');

        $all_data = array_get($all_data, 'ids');
        foreach ($all_data as $id) {
            //Delete Icon image 
            $Category = Category::
                    select('icon')->where('id', $id)->first();

            $destinationPath = public_path('categories_icons/');

            if (!empty($Category)) {
                if (file_exists($destinationPath . $Category->icon) && $Category->icon != '') {
                    @unlink($destinationPath . $Category->icon);
                }
            }
            Category::destroy($id);
        }


        // redirect
        Session::flash('message', config('global.deletedRecords'));

        return redirect('admin/categories');
    }

    public function dynamicForm(Request $request) {
        \Blade::setRawTags("[[", "]]");
        \Blade::setContentTags('<%', '%>'); // for variables and all things Blade
        \Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data
        return View::make('admin.masters.categories.dynamicForm');
    }
    

    public function requestQuotation(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('requestQuotation-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $category_id = $request->id;

        //fetch title
        $Category = Category::
                select('name_en')
                ->where('id', $category_id)
                ->first();

        $category_name = $Category->name_en;


        return View::make('admin.masters.categories.requestQuotation')
                        ->with('category_id', $category_id)
                        ->with('category_name', $category_name);
    }

    public function storeRequestQuotation(Request $request) {

        $input['category_id'] = $request->category_id;
        $categoryQuotationFields = CategoryAdditionalQuotationField::firstOrCreate($input);

        $input1['json_data'] = $request->jsonData;
        $categoryQuotationFields->fill($input1)->save();

        return response()->json(['response' => config('global.addedRecords')]);
    }

    public function quotationFormPreview(Request $request) {
       
        $category_id = $request->id;

        $jsonData = CategoryAdditionalQuotationField::select('json_data')->where('category_id', $category_id)->first();
        
        //Get json value       
        $fields=array();
        if(!is_null($jsonData))
        $fields = json_decode($jsonData->json_data);
       
        $returnHTML = view('admin.masters.categories.quotationForm')->with('fields', $fields)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }
    
     public function quotationForm(Request $request) {
        \Blade::setRawTags("[[", "]]");
        \Blade::setContentTags('<%', '%>'); // for variables and all things Blade
        \Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data
        return View::make('admin.masters.categories.quotationForm');
    }
    
    //Apply Quotation Form
      public function dynamicQuotationForm(Request $request) {
        \Blade::setRawTags("[[", "]]");
        \Blade::setContentTags('<%', '%>'); // for variables and all things Blade
        \Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data
        return View::make('admin.masters.categories.dynamicQuotationForm');
    }
    

    public function quotation(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('requestQuotation-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');

        $category_id = $request->id;

        //fetch title
        $Category = Category::
                select('name_en')
                ->where('id', $category_id)
                ->first();

        $category_name = $Category->name_en;


        return View::make('admin.masters.categories.quotation')
                        ->with('category_id', $category_id)
                        ->with('category_name', $category_name);
    }

    public function storeQuotation(Request $request) {

        $input['category_id'] = $request->category_id;
        $categoryQuotationFields = CategoryAdditionalApplyQuotationField::firstOrCreate($input);

        $input1['json_data'] = $request->jsonData;
        $categoryQuotationFields->fill($input1)->save();

        return response()->json(['response' => config('global.addedRecords')]);
    }

    public function applyQuotationFormPreview(Request $request) {
       
        $category_id = $request->id;

        $jsonData = CategoryAdditionalApplyQuotationField::select('json_data')->where('category_id', $category_id)->first();
        
        //Get json value       
        $fields=array();
        if(!is_null($jsonData))
        $fields = json_decode($jsonData->json_data);
        
        $returnHTML = view('admin.masters.categories.applyQuotationForm')->with('fields', $fields)->render();
        return response()->json(array('success' => true, 'html' =>$returnHTML));
    }
    
     public function applyQuotationForm(Request $request) {
        \Blade::setRawTags("[[", "]]");
        \Blade::setContentTags('<%', '%>'); // for variables and all things Blade
        \Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data
        return View::make('admin.masters.categories.applyQuotationForm');
    }


}
