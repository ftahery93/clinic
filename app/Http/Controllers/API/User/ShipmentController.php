<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Price;
use App\Models\API\Shipment;
use App\Utility;
use Illuminate\Http\Request;
use App\Helpers\Notification;
use App\Models\API\Company;

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
            'address_from_id' => 'required',
            'address_to_id' => 'required',
            'pickup_time' => 'required',
            'quantity' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $price = Price::find(1);

        $shipment = new Shipment();
        $shipment->category_id = $request->category_id;
        $shipment->price = $price->price;
        $shipment->address_from_id = $request->address_from_id;
        $shipment->address_to_id = $request->address_to_id;
        $shipment->pickup_time = $request->pickup_time;
        $shipment->quantity = $request->quantity;
        $shipment->user_id = $request->id;
        $shipment->status = 1;
        $shipment->payment_type = 1;

        $deliveryCompanies =  array_map('intval',explode(",", $request->delivery_companies_id));
        $companies = Company::findMany($deliveryCompanies);
        $playerIds = [];
        foreach ($companies as $company) {
            $playerIds[] = $company->player_id;
        }
        Notification::sendNotificationToMultipleUser($playerIds);

        $shipment->save();

        return response()->json([
            'message' => LanguageManagement::getLabel('add_shipment_success', $this->language),
            'shipment_id' => $shipment->id,
        ]);
    }

    public function getShipments(Request $request)
    {
        $pending = [];
        $accepted = [];
        $pickedUp = [];
        $delivered = [];

        $shipments = Shipment::where('user_id', $request->ustger('api')->id);

        if ($shipments) {
            foreach ($shipments as $shipment) {
                switch ($shipment->status) {
                    case 1:
                        $pending[] = $shipment;
                        break;
                    case 2:
                        $accepted[] = $shipment;
                        break;
                    case 3:
                        $pickedUp[] = $shipment;
                        break;
                    case 4:
                        $delivered[] = $shipment;
                        break;
                }
            }

            return response()->json([
                'pending' => $pending,
                'accepted' => $accepted,
                'pickedUp' => $pickedUp,
                'delivered' => $delivered,
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
