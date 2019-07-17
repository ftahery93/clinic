<?php

namespace App;

use App\LanguageManagement;
use Illuminate\Support\Facades\Validator;

class Utility
{
    public function getErrorMessages($language)
    {
        $message = [
            'email.required' => $this->getMessage($language, 'text_errorEmail'),
            'email.unique' => $this->getMessage($language, 'email_exist'),
            'email.exists' => $this->getMessage($language, ''),
            'email.email' => $this->getMessage($language, ''),
            'username.required' => $this->getMessage($language, 'required_username'),
            'username.unique' => $this->getMessage($language, 'username_exist'),
            'password.required' => $this->getMessage($language, 'required_password'),
            'confirm_password.required' => $this->getMessage($language, 'required_confirm_password'),
            'confirm_password.same' => $this->getMessage($language, 'password_mismatch'),
            'type.required' => $this->getMessage($language, 'required_type'),
            'id.required' => $this->getMessage($language, 'required_id'),
            'category.required' => $this->getMessage($language, 'required_category'),
            'price.required' => $this->getMessage($language, 'required_price'),
            'fullname.required' => $this->getMessage($language, 'text_errorName'),
            'otp.required' => $this->getMessage($language, 'text_OTPrequired'),
            'mobile.required' => $this->getMessage($language, 'text_errorMobile'),
            'mobile.digits' => $this->getMessage($language, 'text_errorMobile8Digit'),
            'mobile.unique' => $this->getMessage($language, 'text_mobileNumberExist'),
            'name.required' => $this->getMessage($language, ''),
            'image.required' => $this->getMessage($language, ''),
            'country_id.required' => $this->getMessage($language, 'text_errorCountry'),
            'country_id.exists' => $this->getMessage($language, ''),
            'player_id.required' => $this->getMessage($language, ''),
            'device_type.required' => $this->getMessage($language, ''),
            'order_id.required' => $this->getMessage($language, ''),
            'order_id.exists' => $this->getMessage($language, ''),
            'paymentId.required' => $this->getMessage($language, ''),
            'shipment_id.required' => $this->getMessage($language, ''),
            'shipment_id.exists' => $this->getMessage($language, ''),
            'shipment_ids.required' => $this->getMessage($language, ''),
            'shipment_ids.array' => $this->getMessage($language, ''),
            'shipment_ids.min.numeric' => $this->getMessage($language, ''),
            'isOffer.required' => $this->getMessage($language, ''),
            'isOffer.boolean' => $this->getMessage($language, ''),
            'offer_id.required_if' => $this->getMessage($language, ''),
            'offer_id.exists' => $this->getMessage($language, ''),
            'amount.required_if' => $this->getMessage($language, 'amount_required_when_not_offer'),

        ];
        return $message;
    }

    public function getMessage($language, $labelName)
    {
        return LanguageManagement::getLabel($labelName, $language);
    }

    public function checkForErrorMessages($request, $validationMessages, $errorcode)
    {
        $language = $request->header('Accept-Language');
        $messages = $this->getErrorMessages($language);

        $validator = Validator::make($request->all(), $validationMessages, $messages);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()->first(),
            ], $errorcode);
        }
    }

}
