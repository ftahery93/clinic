<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\RegisteredUser;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;

class QuotationRequestedController extends Controller {

    protected $ViewAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:quotationRequest');
    }

    public function index(Request $request) {

        $Quotations = DB::table('user_request_quotations AS uq')
                ->join('categories', 'categories.id', '=', 'uq.category_id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('services.name_en AS service_name', 'categories.name_en AS category_name', 'uq.location'
                        , DB::raw('CONCAT(DATE_FORMAT(uq.submission_date,"%d/%m/%Y")) AS submission_date'), 'uq.id')
                ->where('uq.user_id', $request->user_id)
                ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Quotations)
                            ->editColumn('action', function ($Quotations) {
                                return '<a href="' . url('admin/quotationRequestedDetails') . '/' . $Quotations->id . '" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" '
                                        . 'title="Quotation Requested Details" data-original-title="Quotation Requested Details"><i class="entypo-doc-text-inv"></i></a>';
                            })
                            ->make();
        }

        //User Name
        $userName = DB::table('registered_users')->select('fullname')->where('id', $request->user_id)->first();

        return view('admin.quotationRequested.index')
                        ->with('userID', $request->user_id)
                        ->with('userName', $userName->fullname);
    }

    public function quotationRequestedDetails(Request $request) {

        $quotationDetails = DB::table('user_request_quotations AS uq')
                ->join('categories', 'categories.id', '=', 'uq.category_id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('uq.*','services.name_en AS service_name', 'categories.name_en AS category_name', 'uq.location'
                        , DB::raw('CONCAT(DATE_FORMAT(uq.submission_date,"%d/%m/%Y")) AS submission_date'), DB::raw('CONCAT(DATE_FORMAT(uq.created_at,"%d/%m/%Y")) AS requested_date'))
                ->where('uq.id', $request->id)
                ->first();


        $QuotationApplied = DB::table('registered_users AS ru')
                ->join('service_provider_quotations_applied As spqa', 'spqa.service_provider_id', '=', 'ru.id')
                ->select('ru.company_name', 'spqa.price', 'spqa.duration', 'spqa.approved_status', 'spqa.id')
                ->where('spqa.quotation_id', $quotationDetails->id)
                ->get();

        $ID = $quotationDetails->id;

        $QuotationNotApplied = DB::table('registered_users AS ru')
                ->leftjoin('service_provider_quotations_applied As spqa', 'spqa.service_provider_id', '=', 'ru.id')
                ->select('ru.company_name', 'ru.email', 'ru.mobile')
                ->whereIn('ru.id', json_decode($quotationDetails->service_provider_ids))
                ->whereNotIn('ru.id', function($query) use($ID) {
                    $query->select(DB::raw('sqq.service_provider_id'))
                    ->from('service_provider_quotations_applied As sqq')
                    ->whereColumn('sqq.service_provider_id', 'ru.id')
                    ->where('sqq.quotation_id', $ID);
                })
                ->get();


        //Imgages
        $images = collect(json_decode($quotationDetails->images, true));
        $images = $images->flatten()->all();

        //files
        $files = collect(json_decode($quotationDetails->files, true));
        $files = $files->flatten()->all();

        //User Name
        $userName = DB::table('registered_users')->select('fullname')->where('id', $quotationDetails->user_id)->first();

        return view('admin.quotationRequested.quotationRequestedDetails')
                        ->with('userName', $userName->fullname)
                        ->with('userID', $quotationDetails->user_id)
                        ->with('images', $images)
                        ->with('files', $files)
                        ->with('QuotationApplied', $QuotationApplied)
                        ->with('QuotationNotApplied', $QuotationNotApplied)
                        ->with('quotationDetails', $quotationDetails);
    }

    public function quotationAppliedDetails(Request $request) {


        $quotationDetails = DB::table('service_provider_quotations_applied As spqa')
                ->join('registered_users AS rusp', 'spqa.service_provider_id', '=', 'rusp.id')
                ->join('registered_users AS ru', 'spqa.user_id', '=', 'ru.id')
                ->join('user_request_quotations AS uq', 'spqa.quotation_id', '=', 'uq.id')
                ->join('categories', 'categories.id', '=', 'uq.category_id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('rusp.company_name', 'ru.id', 'ru.fullname AS userName', 'spqa.*', 'services.name_en AS service_name', 'categories.name_en AS category_name', 'uq.location'
                        , DB::raw('CONCAT(DATE_FORMAT(uq.submission_date,"%d/%m/%Y")) AS submission_date'), DB::raw('CONCAT(DATE_FORMAT(uq.created_at,"%d/%m/%Y")) AS requested_date'))
                ->where('spqa.id', $request->id)
                ->first();


        //Imgages
        $images = collect(json_decode($quotationDetails->images, true));
        $images = $images->flatten()->all();

        //files
        $files = collect(json_decode($quotationDetails->files, true));
        $files = $files->flatten()->all();

        $userID = $quotationDetails->id;


        return view('admin.quotationRequested.quotationAppliedDetails')
                        ->with('images', $images)
                        ->with('files', $files)
                        ->with('userID', $userID)
                        ->with('quotationDetails', $quotationDetails);
    }


    //All function below related to Service Provider details
    //User Quotation Requested List
    public function userQuotationRequestedList(Request $request) {  //User List
        $Quotations = DB::table('user_request_quotations AS uq')
                ->join('registered_users AS ru', 'uq.user_id', '=', 'ru.id')
                ->join('countries', 'countries.id', '=', 'ru.country_id')
                ->select('ru.id', 'ru.fullname', 'ru.email', 'ru.mobile', 'countries.name_en As country')
                ->where('uq.service_provider_ids', 'like', "%$request->id%")
                ->groupby('uq.user_id')
                ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Quotations)
                            ->editColumn('action', function ($Quotations) use($request) {
                                return '<a href="' . url('admin/requestedList') . '/' . $request->id . '/' . $Quotations->id . '" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" '
                                        . 'title="User Requested List" data-original-title="User Requested List"><i class="entypo-doc-text-inv"></i></a>';
                            })
                            ->make();
        }

        //User Name
        $userName = DB::table('registered_users')->select('company_name')->where('id', $request->id)->first();

        return view('admin.quotationRequested.userQuotationRequestedList')
                        ->with('id', $request->id)
                        ->with('userName', $userName->company_name);
    }

    // Quotation Requested List
    public function requestedList(Request $request) { //User all quotation requested  List related to service provider
        $Quotations = DB::table('user_request_quotations AS uq')
                ->join('categories', 'categories.id', '=', 'uq.category_id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('services.name_en AS service_name', 'categories.name_en AS category_name', 'uq.location'
                        , DB::raw('CONCAT(DATE_FORMAT(uq.submission_date,"%d/%m/%Y")) AS submission_date'), 'uq.id')
                ->where('uq.service_provider_ids', 'like', "%$request->id%")
                ->where('uq.user_id', $request->user_id)
                ->get();

        //Ajax request
        if (request()->ajax()) {

            return Datatables::of($Quotations)
                            ->editColumn('action', function ($Quotations) use($request) {
                                return '<a href="' . url('admin/userQuotationDetails') . '/' . $request->id . '/' . $Quotations->id . '" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top" '
                                        . 'title="Quotation Requested Details" data-original-title="Quotation Requested Details"><i class="entypo-doc-text-inv"></i></a>';
                            })
                            ->make();
        }

        //User Name
        $spName = DB::table('registered_users')->select('company_name')->where('id', $request->id)->first();
        $userName = DB::table('registered_users')->select('fullname')->where('id', $request->user_id)->first();

        return view('admin.quotationRequested.requestedList')
                        ->with('id', $request->id)
                        ->with('user_id', $request->user_id)
                        ->with('spName', $spName->company_name)
                        ->with('userName', $userName->fullname);
    }

    //Quotation Request Details
    public function userQuotationDetails(Request $request) {

        $quotationDetails = DB::table('user_request_quotations AS uq')
                ->join('categories', 'categories.id', '=', 'uq.category_id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('uq.*','services.name_en AS service_name','categories.name_en AS category_name', 'uq.location'
                        , DB::raw('CONCAT(DATE_FORMAT(uq.submission_date,"%d/%m/%Y")) AS submission_date'), DB::raw('CONCAT(DATE_FORMAT(uq.created_at,"%d/%m/%Y")) AS requested_date'))
                ->where('uq.id', $request->quotation_id)
                ->first();


        //Imgages
        $images = collect(json_decode($quotationDetails->images, true));
        $images = $images->flatten()->all();

        //files
        $files = collect(json_decode($quotationDetails->files, true));
        $files = $files->flatten()->all();

        //User Name
        $spName = DB::table('registered_users')->select('company_name')->where('id', $request->id)->first();
        $userName = DB::table('registered_users')->select('fullname')->where('id', $quotationDetails->user_id)->first();

        //Applied Quotation Details
        $quotationDetailList = DB::table('service_provider_quotations_applied As spqa')
                ->join('registered_users AS rusp', 'spqa.service_provider_id', '=', 'rusp.id')
                ->join('registered_users AS ru', 'spqa.user_id', '=', 'ru.id')
                ->join('user_request_quotations AS uq', 'spqa.quotation_id', '=', 'uq.id')
                ->join('categories', 'categories.id', '=', 'uq.category_id')
                ->join('services', 'services.id', '=', 'uq.service_id')
                ->select('rusp.company_name', 'ru.id', 'ru.fullname AS userName', 'spqa.*', 'services.name_en AS service_name', 'categories.name_en AS category_name', 'uq.location'
                        , DB::raw('CONCAT(DATE_FORMAT(uq.submission_date,"%d/%m/%Y")) AS submission_date'), DB::raw('CONCAT(DATE_FORMAT(uq.created_at,"%d/%m/%Y")) AS requested_date'))
                ->where('spqa.id', $request->quotation_id)
                ->where('spqa.service_provider_id', $request->id);

        $count = $quotationDetailList->count();

        $appliedQuotationDetails = $quotationDetailList->first();


        //Imgages
        $appliedImages = collect(json_decode($appliedQuotationDetails->images, true));
        $appliedImages = $appliedImages->flatten()->all();

        //files
        $appliedFiles = collect(json_decode($appliedQuotationDetails->files, true));
        $appliedFiles = $appliedFiles->flatten()->all();



        return view('admin.quotationRequested.userQuotationDetails')
                        ->with('userName', $userName->fullname)
                        ->with('id', $request->id)
                        ->with('user_id', $quotationDetails->user_id)
                        ->with('spName', $spName->company_name)
                        ->with('images', $images)
                        ->with('files', $files)
                        ->with('count', $count)
                        ->with('appliedImages', $appliedImages)
                        ->with('appliedFiles', $appliedFiles)
                        ->with('quotationDetails', $quotationDetails)
                        ->with('appliedQuotationDetails', $appliedQuotationDetails);
    }

    //Download Documents
   public function docDownload(Request $request) {

        $path = public_path($request->filePath) . '/' . $request->file;
        return response()->download($path);
    }

}
