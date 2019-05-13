<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\API\Company;
use App\Shipment;
use App\Utility;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    public function addShipment(Request $request)
    {
        $validationMessages = [
            'category_id' => 'required',
            'delivery_companies_id' => 'required',
            'price' => 'required',
            'address_id_from' => 'required',
            'address_id_to' => 'required',
            'pickup_time' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipment = new Shipment();
        $shipment->category_id = $request->category_id;
        $shipment->price = $request->price;
        $shipment->address_id_from = $request->address_id_from;
        $shipment->address_id_to = $request->address_id_to;
        $shipment->pickup_time = $request->pickup_time;

        $companies = Company::findMany($request->delivery_company_ids);
        // send notification to all the companies using player id

        $shipment->save();
    }

    public function getShipments(Request $request)
    {
        $pending = [];
        $accepted = [];

        $shipments = Shipment::where('user_id', $request->user('api')->id);

        if ($shipments) {
            foreach ($shipments as $shipment) {
                switch ($shipment->status) {
                    case 1:
                        $pending[] = $shipment;
                        break;
                    case 2:
                        $accepted[] = $shipment;
                        break;
                }
            }

            return response()->json([
                'pending' => $pending,
                'accepted' => $accepted,
            ]);
        }
    }

    public function getShipmentDetails(Request $request)
    {
        $validationMessages = [
            'id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipment = Shipment::find($request->id);
        if ($shipment) {
            return $shipment;
        }
    }
}
