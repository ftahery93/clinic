<?php

namespace App\Http\Controllers;

use App\Category;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class CategoriesController extends Controller
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
            $Categories = Category::orderby('created_at', 'asc')->paginate(env('BACKEND_PAGINATION'));
        }
        return view("backend.categories", compact("Categories"));
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

        return view("backend.categories.create");
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
            'name' => 'required',
        ]);

        $Category = new Category;
        $Category->name = $request->name;
        $Category->status = $request->status;
        $Category->created_at = date("Y-m-d H:i:s");
        $Category->updated_at = date("Y-m-d H:i:s");
        $Category->save();

        return redirect()->action('CategoriesController@index')->with('doneMessage', trans('backend.addDone'));
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
            $Category = Category::find($id);
            if ($Category != null) {
                return view("backend.categories.edit", compact("Category"));
            }
        } else {
            return redirect()->action('CategoriesController@index');
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

        $Category = Category::find($id);
        if ($Category != null) {

            $this->validate($request, [
                'name' => 'required',
            ]);

            $Category->name = $request->name;
            $Category->status = $request->status;
            $Category->updated_at = date("Y-m-d H:i:s");
            $Category->save();
            return redirect()->action('CategoriesController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('CategoriesController@index');
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
            $Category = Category::find($id);
        }
        if ($Category != null) {
            $Category->delete();
            return redirect()->action('CategoriesController@index')->with('doneMessage', trans('backend.deleteDone'));
        } else {
            return redirect()->action('CategoriesController@index');
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
        if ($request->action == "activate") {
            Category::wherein('id', $request->ids)
                ->update(['status' => 1]);

        } elseif ($request->action == "block") {
            Category::wherein('id', $request->ids)
                ->update(['status' => 0]);

        } elseif ($request->action == "delete") {
            // Check Permissions
            if (!@Auth::user()->permissionsGroup->delete_status) {
                return Redirect::to(route('NoPermission'))->send();
            }

            Category::wherein('id', $request->ids)
                ->delete();

        }
        return redirect()->action('CategoriesController@index')->with('doneMessage', trans('backend.saveDone'));
    }
}
