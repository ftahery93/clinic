<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\Admin\User;
use App\Models\API\RegisteredUser;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Validator;

//use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;

class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     * register API
     *
     * @return \Illuminate\Http\Response
     */
    /**
     *
     * @SWG\Post(
     *         path="/register",
     *         tags={"register"},
     *         operationId="register",
     *         summary="Register a user to app",
     *         @SWG\Parameter(
     *             name="User",
     *             in="body",
     *             required=true,
     *             @SWG\Schema(ref="#/definitions/User"),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="success",
     *             @SWG\Schema(ref="#/definitions/User"),
     *         ),
     *     )
     *
     */
    public function register(Request $request)
    {
        $validator = [
            'mobile' => 'required|digits:8|unique:registered_users',
            'is_user' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $registeredUser = RegisteredUser::create([
            'mobile' => $request->mobile,
            'status' => 0,
            'otp' => substr(str_shuffle("0123456789"), 0, 5),
            'is_user' => $request->is_user,
        ]);

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),

        ]);
    }

    /**
     * Authentication.
     */
    /**
     *
     * @SWG\Post(
     *         path="/login",
     *         tags={"login"},
     *         operationId="login",
     *         summary="Login user to the app",
     *         @SWG\Parameter(
     *             name="User",
     *             in="body",
     *             required=true,
     *             @SWG\Schema(ref="#/definitions/User"),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="success",
     *             @SWG\Schema(ref="#/definitions/User"),
     *         ),
     *     )
     *
     */
    public function login(Request $request)
    {

        // validate the info, create rules for the inputs
        $rules = array(
            //'mobile' => 'required|digits:8', // make sure the email is an actual email

        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile8Digit', $this->Lang)], 417);
        } else {
            /*
            //check Mobile from database
            if (!RegisteredUser::where('mobile', '=', $request->input('mobile'))->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_errorMobile', $this->Lang)], 417);
            }
            //check Mobile from database
            elseif (!RegisteredUser::where('mobile', '=', $request->input('mobile'))
            ->where('status', '=', 1)
            ->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_accountDeactivated', $this->Lang)], 401);
            }

            // attempt to do the login
            $RegisteredUser = RegisteredUser::where('mobile', $request->input('mobile'))->get()->first();
            $tokenResult = $RegisteredUser->createToken($RegisteredUser->mobile, ['*']);
            $token = $tokenResult->token;
             */

            // $token->expires_at = config('global.AuthExpiryDate');

            //$token->save();
            $user = User::where('username', $request->username)->get()->first();
            //return $user->email;
            $tokenResult = $user->createToken('Masafah');
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                //'expires_at' => Carbon::parse(
                //   $tokenResult->token->expires_at
                // )->toDateTimeString()
            ]);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/register",
     *         tags={"register"},
     *         operationId="register",
     *         summary="Register a user to app",
     *         @SWG\Parameter(
     *             name="User",
     *             in="body",
     *             required=true,
     *             @SWG\Schema(ref="#/definitions/User"),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="success",
     *             @SWG\Schema(ref="#/definitions/User"),
     *         ),
     *     )
     *
     */
    public function logout(Request $request)
    {
        if ($request->user('api')) {
            $request->user('api')->token()->revoke();
            return response()->json([
                'message' => LanguageManagement::getLabel('text_successLoggout', $this->Lang),
            ]);
        } else {
            return response()->json([
                'message' => LanguageManagement::getLabel('text_tokenMismatch', $this->Lang),
            ]);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/register",
     *         tags={"register"},
     *         operationId="register",
     *         summary="Register a user to app",
     *         @SWG\Parameter(
     *             name="User",
     *             in="body",
     *             required=true,
     *             @SWG\Schema(ref="#/definitions/User"),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="success",
     *             @SWG\Schema(ref="#/definitions/User"),
     *         ),
     *     )
     *
     */
    public function verifyOTP(Request $request)
    {

        $input = $request->all();

        $validator = [
            'otp' => 'required',
            'mobile' => 'required',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        //Verify OTP from database
        if (!RegisteredUser::where('otp', '=', $request->input('otp'))->where('mobile', '=', $request->input('mobile'))->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_wrongOTP', $this->language)], 417);
        } else {
            $registeredUser = RegisteredUser::where('mobile', $request->input('mobile'))->get()->first();
            $registeredUser->update(array('status' => 1));
            $tokenResult = $registeredUser->createToken($registeredUser->mobile, ['*']);
            //$token = $tokenResult->token;

            // $token->expires_at = config('global.AuthExpiryDate');

            //$token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'user' => $registeredUser,
            ]);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/register",
     *         tags={"register"},
     *         operationId="register",
     *         summary="Register a user to app",
     *         @SWG\Parameter(
     *             name="User",
     *             in="body",
     *             required=true,
     *             @SWG\Schema(ref="#/definitions/User"),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="success",
     *             @SWG\Schema(ref="#/definitions/User"),
     *         ),
     *     )
     *
     */
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
        RegisteredUser::where('mobile', '=', $request->input('mobile'))->update(array('otp' => $input['otp']));
        return response()->json([
            'otp' => $input['otp'],
        ]);
    }

    public function sendMail()
    {
        $data = array('name' => "Fakhruddin Tahery");
        Mail::send([], $data, function ($message) {
            $message->to('hashimeng21@hotmail.com', 'Hellooo')->subject
                ('Laravel Basic Testing Mail');
            $message->from('fakhriwild@gmail.com', 'Fakhruddin Tahery');
        });
    }
}
