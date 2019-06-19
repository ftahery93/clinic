<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Redirect;
use App\Poll;
use App\Category;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;

class PollsController extends Controller
{

    private $uploadPath = "uploads/caegories/";

    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->polls_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the poll.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Polls = Poll::where('created_by', '=', Auth::user()->id)->orderby('created_at',
                'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $Polls = Poll::orderby('created_at',
                'asc')->paginate(env('BACKEND_PAGINATION'));
        }

        // Map categories for each poll.
        foreach($Polls as $Poll){
            $Poll->categories->map(function ($result) {
                return $result;
            });
        }

       return view("backEnd.polls", compact("Polls"));
    }

    /**
     * Remove the poll record.
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

        if (@Auth::user()->permissionsGroup->view_status) {
            $Poll = Poll::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Poll = Poll::find($id);
        }
        
        if (count($Poll) > 0) {
            // Delete a banner file
            if ($Poll->photo != "") {
                File::delete($this->getUploadPath() . $Poll->photo);
            }
            $Poll->delete();
            return redirect()->action('PollsController@index')->with('doneMessage', trans('backLang.deleteDone'));
        } else {
            return redirect()->action('PollsController@index');
        }
    }

    /**
     * Update all selected poll.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        if ($request->action == "order") {
            foreach ($request->row_ids as $rowId) {
                $Banner = Banner::find($rowId);
                if (count($Banner) > 0) {
                    $row_no_val = "row_no_" . $rowId;
                    $Banner->row_no = $request->$row_no_val;
                    $Banner->save();
                }
            }
        } elseif ($request->action == "activate") {
            Banner::wherein('id', $request->ids)
                ->update(['status' => 1]);

        } elseif ($request->action == "block") {
            Banner::wherein('id', $request->ids)
                ->update(['status' => 0]);

        } elseif ($request->action == "delete") {
            // Check Permissions
            if (!@Auth::user()->permissionsGroup->delete_status) {
                return Redirect::to(route('NoPermission'))->send();
            }
            // Delete banners files
            $Banners = Banner::wherein('id', $request->ids)->get();
            foreach ($Banners as $banner) {
                if ($banner->file_ar != "") {
                    File::delete($this->getUploadPath() . $banner->file_ar);
                }
                if ($banner->file_en != "") {
                    File::delete($this->getUploadPath() . $banner->file_en);
                }
            }
            Banner::wherein('id', $request->ids)->delete();
        }
        return redirect()->action('PollsController@index')->with('doneMessage', trans('backLang.saveDone'));
    }


}