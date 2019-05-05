<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utility;
use App\Models\API\Company;
use Illuminate\Support\Facades\Hash;

class CompanyEntryController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    public function register(Request $request)
    {
        $validator = [
            'email' => 'required|unique:companies|email',
            'mobile' => 'required|digits:8|unique:companies',
            'is_user' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $registeredCompany = Company::create([
            'mobile' => $request->mobile,
            'status' => 0,
            'otp' => substr(str_shuffle("0123456789"), 0, 5),
            'password' => bcrypt($request->password),
            'approved' => false,
        ]);

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),
        ]);
    }

    public function login(Request $request)
    {
        $valdiationMessages = [
            'email' => 'required',
            'password' => 'required',
            'player_id' => 'required'
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $valdiationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        if (!Company::where('mobile', '=', $request->input('mobile'))
            ->where('status', '=', 1)
            ->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_accountDeactivated', $this->Lang)], 401);
        } elseif (!RegisteredUser::where('mobile', '=', $request->input('mobile'))->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile', $this->Lang)], 417);
        }

        $registeredCompany = Company::where('mobile', $request->input('mobile'))->get()->first();

        if ($registeredCompany->approved) {
            $tokenResult = $registeredCompany->createToken($registeredCompany->mobile, ['*']);

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('text_accountNotApproved', $this->Lang)
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
