<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\Admin\User;
use App\Models\API\Authentication;
use App\Models\API\Country;
use App\Models\API\OneSignalUser;
use App\Models\API\RegisteredUser;
use App\Utility;
use Illuminate\Http\Request;

/**
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Masafah API Documentation",
 *         description="Api description...",
 *     )
 */
class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $utility;
    public $language;
    private $accessToken;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
        $this->accessToken = uniqid(base64_encode(str_random(50)));
    }

    /**
     * register API
     *
     * @return \Illuminate\Http\Response
     */
    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/register",
     *         tags={"User Register"},
     *         operationId="register",
     *         summary="Register a user to app",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *         @SWG\Parameter(
     *             name="Registration Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="integer",
     *                  description="users mobile number",
     *                  example=88663456
     *              ),
     *          @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="Country ID",
     *                  example=4
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *     )
     *
     */
    public function register(Request $request)
    {
        $validator = [
            'mobile' => 'bail|required|digits:8|unique:registered_users',
            'country_id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $country = Country::find($request->country_id);
        $otp = substr(str_shuffle("0123456789"), 0, 5);
        $registeredUser = RegisteredUser::create([
            'mobile' => $request->mobile,
            'status' => 0,
            'otp' => $otp,
            'country_id' => $request->country_id,
        ]);

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),
            'otp' => $otp,
        ]);
    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/login",
     *         tags={"User Login"},
     *         operationId="login",
     *         summary="Login a user to app",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *         @SWG\Parameter(
     *             name="Mobile",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="integer",
     *                  description="users mobile number",
     *                  example=88663456
     *              ),
     *             @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="Country ID",
     *                  example=4
     *              ),
     *             @SWG\Property(
     *                  property="player_id",
     *                  type="string",
     *                  description="User player ID",
     *                  example="124987655838376490473s"
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *        @SWG\Response(
     *             response=401,
     *             description="Mobile not found"
     *        ),
     *     )
     *
     */
    public function login(Request $request)
    {
        $validator = [
            'mobile' => 'bail|required|digits:8',
            'country_id' => 'required',
            'player_id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $registeredUser = RegisteredUser::where('mobile', $request->mobile)->get()->first();
        $player_id = OneSignalUser::where('player_id', $request->player_id)->get()->first();

        if ($player_id == null) {
            OneSignalUser::create([
                'user_id' => $registeredUser->id,
                'player_id' => $request->player_id,
            ]);
        }

        if ($registeredUser != null) {
            $otp = substr(str_shuffle("0123456789"), 0, 5);
            $registeredUser->update([
                'otp' => $otp,
            ]);

            return response()->json([
                'otp' => $otp,
            ]);
        } else {
            //return response()->json(['error' => LanguageManagement::getLabel('mobile_not_found', $this->language)], 401);
            $country = Country::find($request->country_id);
            $otp = substr(str_shuffle("0123456789"), 0, 5);
            $registeredUser = RegisteredUser::create([
                'mobile' => $request->mobile,
                'status' => 1,
                'otp' => $otp,
                'country_id' => $request->country_id,
            ]);

            OneSignalUser::create([
                'user_id' => $registeredUser->id,
                'player_id' => $request->player_id,
            ]);

            return response()->json([
                'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),
                'otp' => $otp,
            ]);
        }
        //$token = '' . $registeredUser->id . '' . $registeredUser->mobile . '' . $this->accessToken;

    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/logout",
     *         tags={"User Logout"},
     *         operationId="logout",
     *         summary="Logout a user from the app",
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *         @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="User not found"
     *        ),
     *     )
     *
     */
    public function logout(Request $request)
    {
        $authenticateEntry = Authentication::where('access_token', $request->header('Authorization'))->get()->first();
        if (authenticateEntry != null) {
            $authenticateEntry->delete();
            return response()->json([
                'message' => LanguageManagement::getLabel('text_successLoggout', $this->language),
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_user_found', $this->language),
            ], 404);
        }

    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/verifyOTP",
     *         tags={"User OTP"},
     *         operationId="verifyOTP",
     *         summary="Verify User OTP",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Verify OTP Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="integer",
     *                  description="user's mobile number",
     *                  example=88663456
     *              ),
     *          @SWG\Property(
     *                  property="otp",
     *                  type="integer",
     *                  description="generated OTP",
     *                  example=46103
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *        @SWG\Response(
     *             response=417,
     *             description="Wrong OTP"
     *        ),
     *     )
     *
     */
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

        if (!RegisteredUser::where('otp', $request->otp)->where('mobile', $request->mobile)->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_wrongOTP', $this->language)], 417);
        } else {
            $registeredUser = RegisteredUser::where('mobile', $request->mobile)->get()->first();
            $token = '' . $registeredUser->id . '' . $registeredUser->mobile . '' . $this->accessToken;
            Authentication::create([
                'user_id' => $registeredUser->id,
                'access_token' => $token,
                'type' => 1,
            ]);
            return response()->json([
                'access_token' => $token,
                'user' => $registeredUser,
            ]);
        }
    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/resendOTP",
     *         tags={"User OTP"},
     *         operationId="resendOTP",
     *         summary="Resend User OTP",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Mobile",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="integer",
     *                  description="users mobile number",
     *                  example=88663456
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *     )
     *
     */
    public function resendOTP(Request $request)
    {
        $input = $request->all();

        $validator = [
            'mobile' => 'required|digits:8',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $input['otp'] = substr(str_shuffle("0123456789"), 0, 5);
        RegisteredUser::where('mobile', '=', $request->input('mobile'))->update(array('otp' => $input['otp']));
        return response()->json([
            'otp' => $input['otp'],
        ]);
    }
}
