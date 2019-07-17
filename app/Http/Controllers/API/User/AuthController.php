<?php
namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
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
/**
 * @SWG\SecurityScheme(
 *   securityDefinition="ApiAuthentication",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization"
 * )
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
        //$this->middleware('checkVersion');
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
     *         path="/user/register",
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
            'country_id' => 'required|exists:countries,id',
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
     *         path="/user/login",
     *         tags={"User Login"},
     *         operationId="login",
     *         summary="Login a user to app",
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *         @SWG\Parameter(
     *             name="Mobile",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="idToken",
     *                  type="string",
     *                  description="user Firebase Sign-in token",
     *                  example="eyjshddss/9as7asdjlaksjd8admsjdnlkloiasjdoiasduasldijad..."
     *              ),
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
     *             @SWG\Property(
     *                  property="device_type",
     *                  type="integer",
     *                  description="device type, 1-iOS, 2-Android",
     *                  example=1
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
     *             response=404,
     *             description="Mobile not found"
     *        ),
     *     )
     *
     */
    public function login(Request $request)
    {
        $validator = [
            'idToken' => 'required',
            'mobile' => 'bail|required|digits:8',
            'country_id' => 'required|exists:countries,id',
            'player_id' => 'required',
            'device_type' => 'required',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $response = $this->getFirebaseUser($request->idToken);
        $response = json_decode($response, true);
        if (!array_key_exists('users', $response)) {
            return response()->json([
                'error' => LanguageManagement::getLabel('mobile_not_found', $this->language),
            ], 404);
        }
        $country = Country::find($request->country_id);
        if (strpos($response['users'][0]['phoneNumber'], $country->country_code . $request->mobile) === false) {
            return response()->json([
                'error' => LanguageManagement::getLabel('mobile_not_found', $this->language),
            ], 404);
        }
        $registeredUser = RegisteredUser::where('mobile', $request->mobile)->where('country_id', $country->id)->get()->first();
        $player_id = OneSignalUser::where('player_id', $request->player_id)->get()->first();
        if ($registeredUser == null) {
            $registeredUser = RegisteredUser::create([
                'mobile' => $request->mobile,
                'status' => 1,
                'country_id' => $request->country_id,
            ]);
            OneSignalUser::create([
                'user_id' => $registeredUser->id,
                'player_id' => $request->player_id,
                'device_type' => $request->device_type,
            ]);
        } else {
            if ($player_id == null) {
                OneSignalUser::create([
                    'user_id' => $registeredUser->id,
                    'player_id' => $request->player_id,
                    'device_type' => $request->device_type,
                ]);
            }
        }
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

    private function getFirebaseUser($idToken)
    {
        $fields = array(
            'idToken' => $idToken,
        );
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/identitytoolkit/v3/relyingparty/getAccountInfo?key=" . env('FIREBASE_API_KEY'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        return $response;
    }
}
