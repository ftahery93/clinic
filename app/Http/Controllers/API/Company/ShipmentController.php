<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\API\Company;
use App\Models\API\Shipment;
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

    public function getPendingShipments(Request $request)
    {
        $shipments = Shipment::where('status', 1)->get();

        return collect($shipments);
    }

    public function acceptShipment(Request $request)
    {
        $validationMessages = [
            'id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $shipment = Shipment::find($request->id);
        $shipment->update([
            'status' => 2,
        ]);
    }

    public function getShipments(Request $request)
    {
        $shipments = Shipment::where('status', 2)->where('company_id', $request->company('api')->id)->get();
        return collect($shipments);
    }

    public function getShipmentHistory(Request $request)
    {
        $shipments = Shipment::where('status', 4)->where('company_id', $request->user('api')->id)->get();
        return collect($shipments);
    }
}
