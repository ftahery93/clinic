<?php

namespace App\Http\Controllers;

use App\Commission;
use App\Company;
use App\Order;
use App\Permissions;
use App\Country;
use Auth;
use DB;
use File;
use Illuminate\Http\Request;
use Redirect;

class CompanyUsersController extends Controller
{

    private $uploadPath = "uploads/company_images/";

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
     * Display a listing of the application users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $CompanyUsers = Company::
                select('companies.id', 'companies.name_en','companies.name_ar','companies.description_en','companies.instagram_link','companies.description_ar', 'companies.email', 'companies.mobile', 'companies.phone', 'companies.status',
                'companies.rating', 'companies.approved', 'companies.image', 'wallet.balance',
                DB::raw("IFNULL((SELECT COUNT(shipments.id) FROM shipments
                WHERE shipments.status >= 2 AND shipments.company_id!='NULL' AND shipments.company_id=companies.id
                GROUP BY shipments.company_id),0) as approved_shipments"),
                DB::raw("IFNULL((SELECT SUM(orders.wallet_amount) FROM orders
                WHERE orders.company_id!='NULL' AND orders.company_id=companies.id
                GROUP BY orders.company_id),0.000) as admin_totalCommission"))                
                ->leftJoin('wallet', 'wallet.company_id', '=', 'companies.id')
                ->orderby('companies.id', 'asc')
                ->paginate(env('BACKEND_PAGINATION'));
            $Permissions = Permissions::orderby('id', 'asc')->get();
        }
        return view("backend.company_users", compact("CompanyUsers", "Permissions"));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countries = Country::orderby('id', 'asc')->get();

        return view("backend.company.create", compact("Countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:png,jpeg,jpg,gif|max:3000',
            'name_en' => 'required',
            'name_ar' => 'required',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'country_id' => 'required',
            'mobile' => 'required|digits:8|unique:companies',
            'instagram_link' => 'sometimes|url',
        ]);

        // Start of Upload Files
        $formFileName = "image";
        $fileFinalName_ar = "";
        if ($request->$formFileName != "") {
            $fileFinalName_ar = time() . rand(1111,
                9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = base_path() . "/public/" . $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName_ar);
        }
        // End of Upload Files

        $Company = new Company;
        $Company->name_en = $request->name_en;
        $Company->name_ar = $request->name_ar;
        $Company->email = $request->email;
        $Company->instagram_link = $request->instagram_link;
        $Company->password = bcrypt($request->password);
        $Company->country_id = $request->country_id;
        $Company->mobile = $request->mobile;
        $Company->phone = $request->phone;
        $Company->image = $fileFinalName_ar;
        $Company->description_en = $request->description_en;
        $Company->description_ar = $request->description_ar;
        $Company->status = 1;
        $Company->approved = 1;
        $Company->save();
        
        Wallet::create([
            'company_id' =>  $Company->id,
            'balance' => 0,
        ]);
        FreeDelivery::create([
            'company_id' =>  $Company->id,
            'quantity' => 0,
        ]);

        return redirect()->action('CompanyUsersController@index')->with('doneMessage', trans('backend.addDone'));
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }
    /**
     * Show the form for editing the specified company user.
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
            $CompanyUser = Company::find($id);
        }
        if ($CompanyUser != null) {
            return view("backend.company.edit", compact("CompanyUser"));
        } else {
            return redirect()->action('CompanyUsersController@index');
        }
    }

    /**
     * Update the specified company user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        $CompanyUser = Company::find($id);
        if ($CompanyUser != null) {
            $this->validate($request, [
                'name_en' => 'required',
                'name_ar' => 'required',
                'email' => 'required|unique:companies,email,' . $id,
                'instagram_link' => 'sometimes|url',
                'mobile' => 'required|digits:8|unique:companies,mobile,' . $id,
            ]);

            $CompanyUser->name_en = $request->name_en;
            $CompanyUser->name_ar = $request->name_ar;
            $CompanyUser->email = $request->email;
            $CompanyUser->instagram_link = $request->instagram_link;
            $CompanyUser->mobile = $request->mobile;
            $CompanyUser->phone = $request->phone;
            $CompanyUser->description_en = $request->description_en;
            $CompanyUser->description_ar = $request->description_ar;
            $CompanyUser->status = $request->status;
            $CompanyUser->approved = $request->approved;
            $CompanyUser->updated_at = date("Y-m-d H:i:s");
            $CompanyUser->save();
            return redirect()->action('CompanyUsersController@edit', $id)->with('doneMessage', trans('backend.saveDone'));
        } else {
            return redirect()->action('CompanyUsersController@index');
        }
    }

    /**
     * Update all selected application users.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
         
        if(empty($request->ids)){
             
            return redirect()->route('company_users_list');
        }

        if ($request->action == "activate") {
            Company::wherein('id', $request->ids)->update(['status' => 1]);
        } elseif ($request->action == "block") {
            Company::wherein('id', $request->ids)->where('id', '!=', 1)->update(['status' => 0]);
        } elseif ($request->action == "delete") {
            // Delete User photo
            $CompanyUsers = Company::wherein('id', $request->ids)->where('id', '!=', 1)->get();
            foreach ($CompanyUsers as $CompanyUser) {
                if ($CompanyUser->image != "") {
                    File::delete($this->getUploadPath() . $CompanyUser->image);
                }
            }
            Company::wherein('id', $request->ids)->where('id', "!=", 1)->delete();
        }
        
        return redirect()->action('CompanyUsersController@index')->with('doneMessage', trans('backend.saveDone'));
    }

    /**
     * Company Commissions.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function commissions(Request $request)
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $CompanyOrders = Order::
                select('companies.name_en As company_name', DB::raw("COUNT(order_shipment.shipment_id) as count_shipment"),
                DB::raw("SUM(orders.wallet_amount) as wallet_amount"), DB::raw("SUM(orders.card_amount) as card_amount"), DB::raw("SUM(orders.free_deliveries) as free_deliveries"))
                ->leftJoin('companies', 'companies.id', '=', 'orders.company_id')
                ->leftJoin('order_shipment', 'order_shipment.order_id', '=', 'orders.id')
                ->where('orders.status', '=', 1)
                ->groupBy('orders.id')
                ->groupBy('companies.id')
                ->paginate(env('BACKEND_PAGINATION'));

            $Commission = Commission::first();
            $commissionPercentage = $Commission->percentage;

        }
        return view("backend.company_commissions", compact("CompanyOrders", "commissionPercentage"));
    }

}
