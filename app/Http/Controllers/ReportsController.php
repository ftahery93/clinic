<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use App\Shipment;
use App\WalletTransaction;
use Carbon\Carbon;

class ReportsController extends Controller
{
    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    public function showCommission(Request $request)
    {
        $transactions = WalletTransaction::where('wallet_in', 0)->get();
        $groupedTransactions = collect($transactions)->groupBy('company_id')->map(function ($row) {
            return $row->sum('amount');
        });

        if ($request->start_date && $request->end_date) {
            $groupedTransactions = collect($transactions)->where('created_at', '>=', Carbon::parse($request->start_date))
                ->where('created_at', '<=', Carbon::parse($request->end_date))->groupBy('company_id')->map(function ($row) {
                    return $row->sum('amount');
                });
        }
        $transactions = [];
        $totalAmount = 0.0;
        foreach ($groupedTransactions as $key => $eachTransaction) {
            $company = Company::find($key);
            $eachResponse['company_name'] = $company->name_en;
            $eachResponse['amount'] = $eachTransaction;
            $totalAmount = $totalAmount + $eachTransaction;
            $transactions[] = $eachResponse;
        }
        $transactions = collect($transactions);
        return view("backend.reportCommission", compact("transactions", "totalAmount"));
    }

    public function shipmentReport(Request $request)
    {
        $shipments = Shipment::whereNotNull('company_id')->get();

        if ($request->start_date && $request->end_date) {
            $shipments = collect($shipments)->where('created_at', '>=', Carbon::parse($request->start_date))
                ->where('created_at', '<=', Carbon::parse($request->end_date));
        }

        $shipmentCounts = collect($shipments)->groupBy('company_id');
        $shipmentCountResponse = [];

        foreach ($shipmentCounts as $key => $eachShipment) {
            $company = Company::find($key);
            $eachResponse['company_name'] = $company->name_en;
            $eachResponse['count'] = count($eachShipment);
            $shipmentCountResponse[] = $eachResponse;
        }
        return view("backend.shipmentReport", compact("shipmentCountResponse"));
    }
}
