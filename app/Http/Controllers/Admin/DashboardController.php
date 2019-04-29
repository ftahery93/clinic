<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests;
use App\Models\Admin\Users;
use App\Models\Admin\LogActivity;
use App\Models\Admin\RegisteredUser;
use App\Helpers\Permit;
use DB;
use Charts;

class DashboardController extends Controller {

    use AuthenticatesUsers;

    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('permission:dashboard');
    }

    public function index() {

        $this->questionRequestTable = 'user_request_quotations';
        $this->spQuotationAppliedTable = 'service_provider_quotations_applied';
        //Check View Access Permission
        $this->ViewAccess = Permit::AccessPermission('dashboard-view');


        //Get Latest Log Activity
        $LogActivity = LogActivity::
                select('subject', 'created_at')
                ->where('user_type', 0)
                ->latest()
                ->limit(8)
                ->whereNotIn('user_id', [1])
                ->get();

        //Get Latest Registered Users 
        $RegisteredUsers = RegisteredUser::
                select('fullname', 'email', 'mobile')
                ->where('user_type', 0)
                ->latest()
                ->limit(8)
                ->get();


        $userCount = RegisteredUser::where('user_type', 0)->count();

        //Get Latest Service Providers 
        $serviceProviders = RegisteredUser::
                select('company_name', 'email', 'mobile', 'profile_image')
                ->where('user_type', 1)
                ->latest()
                ->limit(8)
                ->get();


        $serviceProviderCount = RegisteredUser::where('user_type', 1)->count();

        //Total Quotation Request
        $requestCount = DB::table($this->questionRequestTable)->count();

        //Total Quotation Approved
        $requestApprovedCount = DB::table($this->spQuotationAppliedTable)->where('approved_status', 1)->count();

        //Get Top Categories Quotation  
        $topQuotationCategories = DB::table($this->questionRequestTable . ' As uq')
                ->join('categories', 'uq.category_id', '=', 'categories.id')
                ->select('categories.name_en','categories.id', DB::raw("count('uq.category_id') as category_count"))
                ->groupBy('uq.category_id')
                ->orderBy('category_count', 'desc')
                ->limit(5)
                ->get();
        
       

        //$topQuotationCategoriesCount = $topQuotationCategories->count();

//        $topQuotationCategoriesArray = array();
//
//        foreach ($topQuotationCategories As $topQuotationCategory) {
//
//            //Get Top Category count approved and count requested and sum price 
//            $topApprovedCategories = DB::table($this->spQuotationAppliedTable . ' As sqa')
//                    ->join('categories', 'sqa.category_id', '=', 'categories.id')
//                    ->select('categories.name_en', DB::raw("count('sqa.category_id') as approved_count"), DB::raw("SUM(sqa.price) as totalAmount"))
//                    ->where('sqa.category_id', $topQuotationCategory->id)
//                    ->where('sqa.approved_status', 1)
//                    ->groupBy('sqa.category_id')
//                    ->first();
//
//
//            $topQuotationCategoriesArray[$topQuotationCategory->id] = $topApprovedCategories;
//        }

        //Latest Approved Quotation requested
        $latestApprovedQuotations = DB::table($this->spQuotationAppliedTable . ' As sqa')
                ->join($this->questionRequestTable . ' As uq', 'uq.id', '=', 'sqa.quotation_id')
                ->join('registered_users As sru', 'sru.id', '=', 'sqa.service_provider_id')
                ->join('registered_users As ru', 'ru.id', '=', 'sqa.user_id')
                ->join('categories', 'sqa.category_id', '=', 'categories.id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('services.name_en AS service_name', 'categories.name_en', 'sru.company_name', 'ru.fullname', 'sqa.approved_date')
                ->where('sqa.approved_status', 1)
                ->orderBy('sqa.approved_date', 'desc')
                ->limit(10)
                ->get();

        //Latest Quotation requested
        $latestQuotationRequested = DB::table($this->questionRequestTable . ' As uq')
                ->join('registered_users As ru', 'ru.id', '=', 'uq.user_id')
                ->join('categories', 'uq.category_id', '=', 'categories.id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('services.name_en AS service_name', 'uq.service_provider_ids', 'categories.name_en', 'ru.fullname', 'uq.created_at', 'uq.submission_date')
                ->latest()
                ->limit(10)
                ->get();

   
        return view('admin.dashboard')
                        ->with('LogActivity', $LogActivity)
                        ->with('RegisteredUsers', $RegisteredUsers)
                        ->with('userCount', $userCount)
                        ->with('serviceProviders', $serviceProviders)
                        ->with('serviceProviderCount', $serviceProviderCount)
                        ->with('requestCount', $requestCount)
                        ->with('requestApprovedCount', $requestApprovedCount)
                        ->with('topQuotationCategories', $topQuotationCategories)
                        ->with('latestApprovedQuotations', $latestApprovedQuotations)
                        ->with('latestQuotationRequested', $latestQuotationRequested)
                        ->with('ViewAccess', $this->ViewAccess);
    }

}
