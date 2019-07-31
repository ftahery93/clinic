<?php

namespace App\Http\Controllers;

use App\Commission;
use App\Shipment;
use Auth;
use DB;
use Illuminate\Config;
use Redirect;
use Response;

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
            $Shipments = Shipment::orderby('status', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Commission = Commission::find(1)->first();
        }

        $ShipmentDetails = array();

        foreach ($Shipments as $Shipment) {
            $ShipmentDetails[$Shipment->id] = array(
                'categories' => $this->getCategory($Shipment->id),
                'toAddress' => $this->getAddress($Shipment->id, 'To'),
                'fromAddress' => $this->getAddress($Shipment->id, 'From'),
                'company' => $this->getCompany($Shipment->id),
                'registered_user' => $this->getUser($Shipment->id),
                'transactions' => $this->getTransactions($Shipment->id),
            );
        }

        return view("backend.shipments", compact("Shipments", "ShipmentDetails", "Commission"));
    }

    public function getCategory($id)
    {

        $categories = array();

        $categories = DB::table('shipments')
            ->leftJoin('category_shipment', 'category_shipment.shipment_id', '=', 'shipments.id')
            ->leftJoin('categories', 'categories.id', '=', 'category_shipment.category_id')
            ->select('categories.name', 'category_shipment.quantity')
            ->where('shipments.id', '=', $id)
            ->get();

        return $categories;

    }

    public function getAddress($id, $string)
    {

        $addresses = array();

        if ($string = "To") {
            $joinKey = 'shipments.address_to_id';
        }

        if ($string = "From") {
            $joinKey = 'shipments.address_from_id';
        }

        $addresses = DB::table('shipments')
            ->leftJoin('addresses', 'addresses.id', '=', $joinKey)
            ->select(DB::raw('addresses.name, addresses.mobile, CONCAT(addresses.block, ", ", addresses.building,",",addresses.street) AS address'))
            ->where('shipments.id', '=', $id)
            ->first();

        return $addresses;

    }

    public function getCompany($id)
    {

        $company = array();

        $company = DB::table('shipments')
            ->leftJoin('companies', 'companies.id', '=', 'shipments.company_id')
            ->select('companies.name')
            ->where('shipments.id', '=', $id)
            ->first();

        return $company;

    }

    public function getTransactions($id)
    {

        $transaction = array();

        $transaction = DB::table('shipments')
            ->leftJoin('order_shipment', 'order_shipment.shipment_id', '=', 'shipments.id')
            ->leftJoin('orders', 'orders.id', '=', 'order_shipment.order_id')
            ->select('orders.free_deliveries', 'orders.wallet_amount', 'orders.card_amount', 'orders.status', 'orders.created_at')
            ->where('shipments.id', '=', $id)
            ->first();

        return $transaction;

    }

    public function getUser($id)
    {

        $user = array();

        $user = DB::table('shipments')
            ->leftJoin('registered_users', 'registered_users.id', '=', 'shipments.user_id')
            ->select('registered_users.fullname')
            ->where('shipments.id', '=', $id)
            ->first();

        return $user;

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
