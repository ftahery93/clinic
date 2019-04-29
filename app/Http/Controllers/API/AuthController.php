<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Exceptions\NoActiveAccountException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\API\RegisteredUser;
use Validator;
use DB;
use Carbon\Carbon;
use DateTime;
use App\Models\Admin\LanguageManagement;
//use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;

class AuthController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request) {

        $this->middleware('api');        
        $this->Lang=$request->header('Accept-Language');
        $this->middleware('localization:'.$this->Lang);
    }

    /**
     * register API
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) {
        
        $input = $request->all();

        $validator = Validator::make($request->only(['mobile']), [
                    'mobile' => 'required|digits:8|unique:registered_users'
        ]);
        if ($validator->fails()) {
          // dd($validator->messages());
//             if ($validator->messages()->has('mobile'))
//                 $err=$validator->messages()->first('mobile');             
             
            return response()->json(['error' =>LanguageManagement::getLabel('text_errorMobile8Digit',$this->Lang)], 422);
        }
        $RegisteredUser = RegisteredUser::create([
                    'mobile' => $request->mobile,
                    'status' =>0,
                    'otp' => substr(str_shuffle("0123456789"), 0, 5),
        ]);

         return response()->json([
                    'message' => LanguageManagement::getLabel('text_successRegistered',$this->Lang),
                    
              ]);
    }

    /**
     * Authentication.
     */
    public function login(Request $request) {
    
        // validate the info, create rules for the inputs
        $rules = array(
            'mobile' => 'required|digits:8', // make sure the email is an actual email
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {            
            return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile8Digit',$this->Lang)], 417);
        } else {

            //check Mobile from database
            if (!RegisteredUser::where('mobile', '=', $request->input('mobile'))->exists()) {
                return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile',$this->Lang)], 417);
            }
            //check Mobile from database
            elseif (!RegisteredUser::where('mobile', '=', $request->input('mobile'))
                            ->where('status', '=', 1)
                            ->exists()) {
                return response()->json(['error' => LanguageManagement::getLabel('text_accountDeactivated',$this->Lang)], 401);
            }

            
            // attempt to do the login
            $RegisteredUser = RegisteredUser::where('mobile', $request->input('mobile'))->get()->first();
            $tokenResult = $RegisteredUser->createToken($RegisteredUser->mobile, ['*']);
             $token = $tokenResult->token;

           // $token->expires_at = config('global.AuthExpiryDate');

            //$token->save();

            return response()->json([
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer',
                        //'expires_at' => Carbon::parse(
                             //   $tokenResult->token->expires_at
                       // )->toDateTimeString()
            ]);
            
        }
    }

    public function logout(Request $request) {
      //dd($request->user('api'));
//        if (RegisteredUser::tokenExpired($request->user('api')->token()->expires_at)) {
//            return response()->json([
//                        'message' => 'Token MisMatch'
//            ]);
//        } else {
//            $request->user('api')->token()->revoke();
//            return response()->json([
//                        'message' => 'Successfully logged out'
//            ]);
       // }
            
            if($request->user('api')){
             $request->user('api')->token()->revoke();
            return response()->json([
                        'message' => LanguageManagement::getLabel('text_successLoggout',$this->Lang)
            ]);  
            }else{
                return response()->json([
                        'message' => LanguageManagement::getLabel('text_tokenMismatch',$this->Lang)
            ]);
            }
    }

    public function verifyOTP(Request $request) {
      
        $input = $request->all();

        $validator = Validator::make($request->only(['otp']), [
                    'otp' => 'required'
        ]);
        if ($validator->fails()) {

            return response()->json(['error' => LanguageManagement::getLabel('text_OTPrequired',$this->Lang)], 417);
        }
        //Verify OTP from database
        if (!RegisteredUser::where('otp', '=', $request->input('otp'))->where('mobile', '=', $request->input('mobile'))->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_wrongOTP',$this->Lang)], 417);
        }
        else{
        $RegisteredUser = RegisteredUser::where('mobile', $request->input('mobile'))->get()->first();
        RegisteredUser::where('mobile', '=', $request->input('mobile'))->update(array('status' => 1));
        $tokenResult = $RegisteredUser->createToken($RegisteredUser->mobile, ['*']);
        $token = $tokenResult->token;

           // $token->expires_at = config('global.AuthExpiryDate');

            //$token->save();

            return response()->json([
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer',
                        //'expires_at' => Carbon::parse(
                             //   $tokenResult->token->expires_at
                       // )->toDateTimeString()
            ]);
        }
      
    }

    public function resendOTP(Request $request) {
         $input = $request->all();

        $validator = Validator::make($request->only(['mobile']), [
                    'mobile' => 'required|digits:8'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile8Digit',$this->Lang)], 417);
        }
          $input['otp']=substr(str_shuffle("0123456789"), 0, 5);
          RegisteredUser::where('mobile', '=', $request->input('mobile'))->update(array('otp' => $input['otp']));
        return response()->json([
                    'otp' => $input['otp']
        ]);
    }

//    public function refresh(Request $request) {
//        $http = new GuzzleHttp\Client;
//
//        $response = $http->post(env('APP_URL') . '/oauth/token', [
//            'form_params' => [
//                'grant_type' => 'password',
//                'client_id' => 'client-id',
//                'client_secret' => 'client-secret',
//                'username' => 'taylor@laravel.com',
//                'password' => 'my-password',
//                'scope' => '',
//            ],
//        ]);
//
//        return json_decode((string) $response->getBody(), true);
//    }

}
