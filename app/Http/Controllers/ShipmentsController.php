<?php

namespace App\Http\Controllers;

use App\Commission;
use App\Shipment;
use Auth;
use DB;
use Illuminate\Config;
use Redirect;
use Response;
use App;

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

        $ShipmentDetails = $this->getShipmentDetails($Shipments);
        return view("backend.shipments", compact("Shipments", "ShipmentDetails", "Commission"));
    }

    public function getPendingShipments()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Shipments = Shipment::where('status', 1)->orderby('status', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Commission = Commission::find(1)->first();
        }
        $ShipmentDetails = $this->getShipmentDetails($Shipments);
        return view("backend.shipments", compact("Shipments", "ShipmentDetails", "Commission"));
    }

    public function getAcceptedShipments()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Shipments = Shipment::where('status', '>=', '2')->where('status', '<=', '4')->orderby('status', 'asc')->paginate(env('BACKEND_PAGINATION'));
            $Commission = Commission::find(1)->first();
        }
        $ShipmentDetails = $this->getShipmentDetails($Shipments);
        return view("backend.shipments", compact("Shipments", "ShipmentDetails", "Commission"));
    }

    public function getCategory($Shipment)
    {
        $categories = array();
        $categories = $Shipment->categories()->first();
        return $categories;
    }

    public function getFromAddress($id)
    {

        $addresses = DB::table('shipments')
            ->leftJoin('addresses', 'addresses.id', '=', 'shipments.address_from_id')
            ->leftJoin('address_titles', 'address_titles.id', '=', 'addresses.title_id')
            ->select('addresses.mobile', 'addresses.block', 'addresses.building', 'addresses.street', 'address_titles.name_en As name')
            ->where('shipments.id', '=', $id)
            ->first();

        return $addresses;
    }

    public function getToAddress($Shipment)
    {
        $addresses = array();
        $addresses = $Shipment->addresses()->get();
        return $addresses;
    }

    public function getCompany($id)
    {

        $company = array();

        $company = DB::table('shipments')
            ->leftJoin('companies', 'companies.id', '=', 'shipments.company_id')
            ->select('companies.name_en as name')
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

    private function getShipmentDetails($shipments)
    {
        $ShipmentDetails = array();
        foreach ($shipments as $Shipment) {
            $ShipmentDetails[$Shipment->id] = array(
                'categories' => $this->getCategory($Shipment),
                'toAddress' => $this->getToAddress($Shipment),
                'fromAddress' => $this->getFromAddress($Shipment->id),
                'company' => $this->getCompany($Shipment->id),
                'registered_user' => $this->getUser($Shipment->id),
                'transactions' => $this->getTransactions($Shipment->id),
            );
        }
        return $ShipmentDetails;
    }
}
