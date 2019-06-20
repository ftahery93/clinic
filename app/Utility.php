<?php

namespace App;

use App\Models\Admin\LanguageManagement;
use Illuminate\Support\Facades\Validator;

class Utility
{
    public function getErrorMessages($language)
    {
        $message = [
            'email.required' => $this->getMessage($language, 'text_errorEmail'),
            'username.required' => $this->getMessage($language, 'required_username'),
            'password.required' => $this->getMessage($language, 'required_password'),
            'type.required' => $this->getMessage($language, 'required_type'),
            'username.unique' => $this->getMessage($language, 'username_exist'),
            'email.unique' => $this->getMessage($language, 'email_exist'),
            'confirm_password.required' => $this->getMessage($language, 'required_confirm_password'),
            'confirm_password.same' => $this->getMessage($language, 'password_mismatch'),
            'id.required' => $this->getMessage($language, 'required_id'),
            'category.required' => $this->getMessage($language, 'required_category'),
            'price.required' => $this->getMessage($language, 'required_price'),
            'fullname.required' => $this->getMessage($language, 'text_errorName'),
            'country_id.required' => $this->getMessage($language, 'text_errorCountry'),
            'otp.required' => $this->getMessage($language, 'text_OTPrequired'),
            'mobile.required' => $this->getMessage($language, 'text_errorMobile'),
            'mobile.digits' => $this->getMessage($language, 'text_errorMobile8Digit'),
            'mobile.unique' => $this->getMessage($language, 'text_mobileNumberExist'),
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
        $validator = Validator::make($request->all(), $validationMessages,$messages);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return response()->json([
                'error' => $validator->messages()->first(),
            ], $errorcode);
        }
    }

}
