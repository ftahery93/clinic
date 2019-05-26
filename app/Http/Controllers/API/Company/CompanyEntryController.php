<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Authentication;
use App\Models\API\Company;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CompanyEntryController extends Controller
{
    public $utility;
    public $language;
    private $access_token;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
        $this->access_token = uniqid(base64_encode(str_random(50)));
    }

    public function register(Request $request)
    {
        $validator = [
            'name' => 'required',
            'email' => 'required|unique:companies|email',
            'mobile' => 'required|digits:8|unique:companies',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'image' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $file_data = $request->image;
        $file_name = 'company_image_' . time() . '.png';

        if ($file_data != null) {
            Storage::disk('public')->put('company_images/' . $file_name, base64_decode($file_data));
        }
        $registeredCompany = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'image' => $file_name,
            'status' => 0,
            'otp' => substr(str_shuffle("0123456789"), 0, 5),
            'password' => bcrypt($request->password),
            'approved' => false,
        ]);

        $token = '' . $registeredCompany->id . '' . $registeredCompany->name . '' . $this->access_token;
        Authentication::create([
            'access_token' => $token,
            'user_id' => $registeredCompany->id,
        ]);

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),
            'access_token' => $token,
        ]);
    }

    public function login(Request $request)
    {
        $valdiationMessages = [
            'email' => 'required',
            'password' => 'required',
            //'player_id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $valdiationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        if (!Company::where('email', $request->email)
            ->where('status', '=', 1)
            ->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_accountDeactivated', $this->language)], 401);
        } elseif (!Company::where('email', $request->email)->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile', $this->language)], 417);
        }

        $registeredCompany = Company::where('email', $request->email)->get()->first();

        if (Hash::check($request->password, $registeredCompany->password)) {

            if ($registeredCompany->approved) {
                $token = '' . $registeredCompany->id . '' . $registeredCompany->name . '' . $this->access_token;
                Authentication::create([
                    'access_token' => $token,
                    'user_id' => $registeredCompany->id,
                ]);
                
                //TO-DO THis needs to be implemented once the app is integrated
                // $registeredCompany->update([
                //     'player_id' => $request->player_id,
                // ]);

                return response()->json([
                    'access_token' => $token,
                ]);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('text_accountNotApproved', $this->Lang),
                ], 401);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('invalid_credentials', $this->Lang),
            ], 401);
        }
    }

    public function verifyOTP(Request $request)
    {
        $validator = [
            'otp' => 'required',
            'mobile' => 'required',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        if (!Company::where('otp', '=', $request->input('otp'))->where('mobile', '=', $request->input('mobile'))->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_wrongOTP', $this->language)], 417);
        } else {
            $registeredCompany = Company::where('mobile', $request->input('mobile'))->get()->first();
            $registeredCompany->update(array('status' => 1));
            $tokenResult = $registeredCompany->createToken($registeredCompany->mobile, ['*']);

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'user' => $registeredCompany,
            ]);
        }
    }

    public function resendOTP(Request $request)
    {
        $input = $request->all();

        $validator = [
            'mobile' => 'required|digits:8',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 417);
        if ($checkForError) {
            return $checkForError;
        }
        $input['otp'] = substr(str_shuffle("0123456789"), 0, 5);
        Company::where('mobile', '=', $request->input('mobile'))->update(array('otp' => $input['otp']));
        return response()->json([
            'otp' => $input['otp'],
        ]);
    }
}
