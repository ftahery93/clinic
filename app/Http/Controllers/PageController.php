<?php

namespace App\Http\Controllers;

use App\Page;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class PageController extends Controller
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
     * Display a listing of the Address.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Pages = Page::orderby('created_at', 'asc')->paginate(env('BACKEND_PAGINATION'));
        }
        return view("backend.pages", compact("Pages"));
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

        return view("backend.pages.create");
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'message_en' => 'required',
            'message_ar' => 'required',
        ]);

        $Page = new Page;
        $Page->name_en = $request->name_en;
        $Page->name_ar = $request->name_ar;
        $Page->message_en = $request->message_en;
        $Page->message_ar = $request->message_ar;
        $Page->save();

        return redirect()->action('PageController@index')->with('doneMessage', trans('backend.addDone'));
    }

    /**
     * Show the form for editing the specified resource.
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
            $Page = Page::find($id);
            if ($Page != null) {
                return view("backend.pages.edit", compact("Page"));
            }
        } else {
            return redirect()->action('PageController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        $Page = Page::find($id);
        if ($Page != null) {

            $this->validate($request, [
                'name_en' => 'required',
                'name_ar' => 'required',
                'message_en' => 'required',
                'message_ar' => 'required',
            ]);

            $Page->name_en = $request->name_en;
            $Page->name_ar = $request->name_ar;  
            $Page->message_en = $request->message_en;
            $Page->message_ar = $request->message_ar;         
            $Page->save();
            return redirect()->action('PageController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('PageController@index');
        }
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
            $Page = Page::find($id);
        }
        if ($Page != null) {
            $Page->delete();
            return redirect()->action('PageController@index')->with('doneMessage', trans('backend.deleteDone'));
        } else {
            return redirect()->action('PageController@index');
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
             
            return redirect()->route('Page_list');
        }
        
      if ($request->action == "delete") {
            // Check Permissions
            if (!@Auth::user()->permissionsGroup->delete_status) {
                return Redirect::to(route('NoPermission'))->send();
            }

            Page::wherein('id', $request->ids)
                ->delete();

        }
        return redirect()->action('PageController@index')->with('doneMessage', trans('backend.saveDone'));
    }
  
}
