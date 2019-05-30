<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\Admin\User;
use App\Models\API\Authentication;
use App\Models\API\RegisteredUser;
use App\Utility;
use Illuminate\Http\Request;

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
        //$this->middleware('api');
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
     *         path="/register",
     *         tags={"register"},
     *         operationId="register",
     *         summary="Register a user to app",
     *         @SWG\Parameter(
     *             name="Mobile",
     *             in="body",
     *             required=true,
     *             @SWG\Schema(ref="#/definitions/User"),
     *        ),
     *          @SWG\Parameter(
     *             name="Password",
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
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $otp = substr(str_shuffle("0123456789"), 0, 5);
        $registeredUser = RegisteredUser::create([
            'mobile' => $request->mobile,
            'status' => 0,
            'otp' => $otp,
        ]);

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),
            'otp' => $otp,
        ]);
    }

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
        $validator = [
            'mobile' => 'required|digits:8',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $registeredUser = RegisteredUser::where('mobile', $request->mobile)->get()->first();
        if ($registeredUser != null) {
            $otp = substr(str_shuffle("0123456789"), 0, 5);
            $registeredUser->update([
                'otp' => $otp,
            ]);

            return response()->json([
                'otp' => $otp,
            ]);
        } else {
            return response()->json(['error' => LanguageManagement::getLabel('mobile_not_found', $this->Lang)], 401);
        }
        //$token = '' . $registeredUser->id . '' . $registeredUser->mobile . '' . $this->accessToken;

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
        $authenticateEntry = Authentication::where('access_token', $request->header('Authorization'))->get()->first();
        $authenticateEntry->delete();
        return response()->json([
            'message' => LanguageManagement::getLabel('text_successLoggout', $this->Lang),
        ]);
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
            return response()->json([
                'access_token' => $token,
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
}
