<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Helper;
use Redirect;
use App\Shipment;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;


class ShipmentsController extends Controller
{

    private $uploadPath = "uploads/shipments/";

    // Define Default Variables

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $Shipments = Shipment::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        } 

        return view("backend.shipments",compact("Shipments"));
    }

    public function show($id)
    {
        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $Shipment = Shipment::find($id)->orderby('id', 'asc')->first();
        } 

        return view("backend.shipments.view",compact("Shipment"));
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}