<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Mail;
use Helper;
use Redirect;
use Validator;
use App\Http\Requests;
use App\Notification;
use Illuminate\Config;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    private $uploadPath = "uploads/notifications/";

    public function __construct()
    {
        $this->middleware('auth');

       // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the resource.
     * int $group_id
     * int $wid
     * int $contact_email
     * string $stat
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $Notifications = Notification::orderby('created_at', 'asc')->paginate(env('BACKEND_PAGINATION'));
            return view("backend.notifications",compact("Notifications"));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return redirect()->action('NotificationsController@index');
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        //
    }


}