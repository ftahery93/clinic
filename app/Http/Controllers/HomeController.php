<?php

namespace App\Http\Controllers;

use App\Company;
use App\RegisteredUser;
use App\Shipment;
use Auth;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            //Get the Number of Company Users
            $Company = Company::where('status', '=', '1')->get();
            $NumberofCompanyUsers = count($Company);

            //Get the Number of Registered Users
            $RegisteredUser = RegisteredUser::where('status', '=', '1')->get();
            $NumberofRegisteredUsers = count($RegisteredUser);

            //Get the Number of Pending Shipments
            $pShipments = Shipment::where('status', '=', '1')->get();
            $NumberofPendingShipments = count($pShipments);

            //Get the Number of Approved Shipments
            $aShipments = Shipment::where('status', '>=', '2')->get();
            $NumberofApprovedShipments = count($aShipments);

            //Get Total Commission
            $totalCommission = Order::sum('wallet_amount');           

            //Get Latest 20 Shipments
            $Shipments = Shipment::select('shipments.*','companies.name_en AS company_name')
            ->leftJoin('companies', 'companies.id', '=', 'shipments.company_id')
            ->take(13)->orderby('id', 'desc')->get();

            return view('backend.home', compact("NumberofCompanyUsers", "NumberofRegisteredUsers", "NumberofPendingShipments", "NumberofApprovedShipments", "Shipments", "totalCommission"));
        }
    }

    /**
     * Search from the header.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        $active_tab = 0;
        if ($request->q != "") {
            if (@Auth::user()->permissionsGroup->view_status) {
                //find Contacts
                $Contacts = Contact::where('created_by', '=', Auth::user()->id)->where('first_name', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q)
                    ->orwhere('email', '=', $request->q)
                    ->orderby('id', 'desc')->get();

                //find Webmails
                $Webmails = Webmail::where('created_by', '=', Auth::user()->id)->where('title', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('from_name', 'like', '%' . $request->q . '%')
                    ->orwhere('from_email', 'like', '%' . $request->q . '%')
                    ->orwhere('from_phone', 'like', '%' . $request->q . '%')
                    ->orwhere('to_email', 'like', '%' . $request->q . '%')
                    ->orwhere('to_name', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->get();

                //find Events
                $Events = Event::where('created_by', '=', Auth::user()->id)->where('title', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('details', 'like', '%' . $request->q . '%')
                    ->orderby('start_date', 'desc')->get();

                //find Topics
                $Topics = Topic::where('created_by', '=', Auth::user()->id)->where('title_ar', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('title_en', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_ar', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_en', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->get();

                //find Sections
                $Sections = Section::where('created_by', '=', Auth::user()->id)->where('title_ar', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('title_en', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_ar', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_en', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->get();
            } else {
                //find Contacts
                $Contacts = Contact::where('first_name', 'like', '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q)
                    ->orwhere('email', '=', $request->q)
                    ->orderby('id', 'desc')->get();

                //find Webmails
                $Webmails = Webmail::where('title', 'like', '%' . $request->q . '%')
                    ->orwhere('from_name', 'like', '%' . $request->q . '%')
                    ->orwhere('from_email', 'like', '%' . $request->q . '%')
                    ->orwhere('from_phone', 'like', '%' . $request->q . '%')
                    ->orwhere('to_email', 'like', '%' . $request->q . '%')
                    ->orwhere('to_name', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->get();

                //find Events
                $Events = Event::where('title', 'like', '%' . $request->q . '%')
                    ->orwhere('details', 'like', '%' . $request->q . '%')
                    ->orderby('start_date', 'desc')->get();

                //find Topics
                $Topics = Topic::where('title_ar', 'like', '%' . $request->q . '%')
                    ->orwhere('title_en', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_ar', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_en', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->get();

                //find Sections
                $Sections = Section::where('title_ar', 'like', '%' . $request->q . '%')
                    ->orwhere('title_en', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_ar', 'like', '%' . $request->q . '%')
                    ->orwhere('seo_title_en', 'like', '%' . $request->q . '%')
                    ->orderby('id', 'desc')->get();

            }
            if (count($Webmails) > 0) {
                $active_tab = 5;
            }
            if (count($Events) > 0) {
                $active_tab = 4;
            }
            if (count($Contacts) > 0) {
                $active_tab = 3;
            }
            if (count($Sections) > 0) {
                $active_tab = 2;
            }
            if (count($Topics) > 0) {
                $active_tab = 1;
            }

        } else {
            return redirect()->action('HomeController@search');
        }
        $search_word = $request->q;

        return view("backEnd.search",
            compact("GeneralWebmasterSections", "search_word", "Webmails", "Contacts", "Events", "Topics", "Sections",
                "active_tab"));
    }

}
