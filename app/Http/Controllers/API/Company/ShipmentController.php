<?php

namespace App\Http\Controllers\API\Company;

use App\Helpers\MailSender;
use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Company;
use App\Models\API\RegisteredUser;
use App\Models\API\Shipment;
use App\Models\API\Wallet;
use App\Utility;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    public function getPendingShipments(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->id)->where('status', 1)->get();
        return collect($shipments);
    }

    public function getAcceptedShipments(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->id)->where('status', 2)->get();
        return collect($shipments);
    }

    public function getShipmentById(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);

        switch ($shipment->status) {
            case 1:
                $wallet = Wallet::where('company_id', $request->id)->get()->first();
                if ($wallet) {
                    $shipment["wallet_amount"] = $wallet->balance;
                } else {
                    $shipment["wallet_amount"] = 0;
                }
                return collect($shipment);

            case 2:
                $shipment["status"] = LanguageManagement::getLabel('booked', $this->language);
                return collect($shipment);
            case 3:
                $shipment["status"] = LanguageManagement::getLabel('picked_up', $this->language);
                return collect($shipment);
            case 4:
                $shipment["status"] = LanguageManagement::getLabel('delivered', $this->language);
                return collect($shipment);
        }

    }

    public function acceptShipment(Request $request)
    {
        $validator = [
            'shipment_id' => 'required',
            'payment_type' => 'required',
        ];

        $shipment = Shipment::find($request->shipment_id);

        if ($shipment->status == 1) {
            switch ($request->payment_type) {
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
            }

            $shipment->update([
                'status' => 2,
                'company_id' => $request->id,
            ]);

            $user = RegisteredUser::find($shipment->user_id);

            MailSender::sendMail($user->email, "Shipment Accepted", "Hello User, Your shipment is accepted by DHL");
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('shipment_booked_already', $this->language),
            ], 404);
        }

    }

    public function shipmentPickedUp(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment->company_id == $request->id) {
            $shipment->update([
                'status' => 3,
            ]);
        }
        $user = RegisteredUser::find($shipment->user_id);

        MailSender::sendMail($user->email, "Shipment Picked Up", "Hello User, Your shipment is picked");
    }

    public function shipmentDelivered(Request $request, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment->company_id == $request->id) {
            $shipment->update([
                'status' => 4,
            ]);
        }
        $user = RegisteredUser::find($shipment->user_id);

        MailSender::sendMail($user->email, "Shipment Delivered Up", "Hello User, Your shipment is delivered");
    }

    public function getShipments(Request $request)
    {
        $shipments = Shipment::where('company_id', $request->id)->get();
        return collect($shipments);
    }

    public function getShipmentHistory(Request $request)
    {
        $shipments = Shipment::where('status', 4)->where('company_id', $request->user('api')->id)->get();
        return collect($shipments);
    }
}
