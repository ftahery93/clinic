<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use Helper;
use Redirect;
use Response;
use App\Shipment;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;


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
            $Shipment = Shipment::find($id)->first();

            $ToAddress = DB::table('addresses')
            ->select('block','street','area','building','mobile','details','notes')
            ->join('shipments', 'shipments.address_to_id', '=', 'addresses.id')
            ->where('shipments.id','=',$id)
            ->first();

            $FromAddress = DB::table('addresses')
            ->select('block','street','area','building','mobile','details','notes')
            ->join('shipments', 'shipments.address_from_id', '=', 'addresses.id')
            ->where('shipments.id','=',$id)
            ->first();
            
        } 

        return view("backend.shipments.view",compact("Shipment","ToAddress","FromAddress"));
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