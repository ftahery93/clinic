<?php
namespace App\Http\Controllers\API\User;

use App\Authentication;
use App\Country;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Models\Admin\User;
use App\Models\API\Otp;
use App\OneSignalUser;
use App\RegisteredUser;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Contact;

class UserProfileController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        //$this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }
    /**
     *
     * @SWG\Get(
     *         path="/user/getProfile",
     *         tags={"User Profile"},
     *         operationId="getUserProfile",
     *         summary="Get User Profile",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
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
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getProfile(Request $request)
    {
        $user = RegisteredUser::find($request->user_id);
        $country = Country::find($user->country_id);
        $user["country"] = collect($country);
        return collect($user);
    }
    
    /**
     *
     * @SWG\Put(
     *         path="/user/updateProfile",
     *         tags={"User Profile"},
     *         operationId="updateProfile",
     *         summary="Update User profile",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
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
     *        @SWG\Parameter(
     *             name="Update profile body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="fullname",
     *                  type="string",
     *                  description="Users full name",
     *                  example="Fakhruddin Tahery"
     *              ),
     *              @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  description="User email",
     *                  example="ftahery@vavisa-kw.com"
     *              ),
     *              @SWG\Property(
     *                  property="image",
     *                  type="string",
     *                  description="Profile image base64",
     *                  example="9vjklhtyi9765/87997jhbsdfh/iutvs......"
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
    public function updateProfile(Request $request)
    {
        // $validator = [
        //     'fullname' => 'required',
        //     'email' => 'required',
        // ];
        // $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        // if ($checkForMessages) {
        //     return $checkForMessages;
        // }
        $user = RegisteredUser::find($request->user_id);
        if (!empty($request->email) && $request->email != $user->email) {
            $user = RegisteredUser::where('email', $request->email)->get()->first();
            if ($user != null) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('email_exist', $this->language),
                ]);
            }
        }
        $user = RegisteredUser::find($request->user_id);
        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
        ]);
        if ($request->image != null) {
            $file_data = $request->image;
            $file_name = 'user_image_' . time() . '.png';
            if ($file_data != null) {
                Storage::disk('public')->put('user_images/' . $file_name, base64_decode($file_data));
                if ($user->image != null) {
                    Storage::disk('public')->delete('user_images/' . $user->image);
                }
            }
            $user->update([
                'image' => $file_name,
            ]);
        }
        $country = Country::find($user->country_id);
        $user["country"] = collect($country);
        return collect($user);
        // return response()->json([
        //     'message' => LanguageManagement::getLabel('text_successUpdated', $this->language),
        //     'user' => collect($user),
        // ]);
    }
    // public function changeMobileNumber(Request $request)
    // {
    //     $validator = [
    //         'mobile' => 'required|digits:8',
    //     ];
    //     $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
    //     if ($checkForMessages) {
    //         return $checkForMessages;
    //     }
    //     $user = RegisteredUser::find($request->user_id);
    //     if ($user->mobile != $request->mobile) {
    //         $existingUser = RegisteredUser::where('mobile', $request->mobile)->get()->first();
    //         if ($existingUser == null) {
    //             //$existingOtp = Otp::where('mobile', $request->mobile)->get()->first();
    //             $generatedOtp = substr(str_shuffle("0123456789"), 0, 5);
    //             $otpUser = Otp::create([
    //                 'mobile' => $request->mobile,
    //                 'otp' => $generatedOtp,
    //             ]);
    //             return response()->json([
    //                 'otp' => $otpUser->otp,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'error' => LanguageManagement::getLabel('text_mobileNumberExist', $this->language),
    //             ], 409);
    //         }
    //     } else {
    //         return response()->json(['error' => LanguageManagement::getLabel('text_mobileNumberExist', $this->language)], 409);
    //     }
    // }
    /**
     *
     * @SWG\Put(
     *         path="/user/updateMobileNumber",
     *         tags={"User Profile"},
     *         operationId="updateMobileNumber",
     *         summary="Update User's Mobile number",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
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
     *        @SWG\Parameter(
     *             name="Change number body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="idToken",
     *                  type="string",
     *                  description="Firebase sign-in token",
     *                  example="eyonasdn9nlaskjda/askh/askldhjoasjhdasd0asdasdhkas..."
     *              ),
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="User's Mobile number - *(Required)",
     *                  example="99653421"
     *              ),
     *              @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="User's Country ID - *(Required)",
     *                  example=5
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
     *             description="Invalid OTP. Unauthorized"
     *        ),
     *        @SWG\Response(
     *             response=409,
     *             description="Mobile number already registered"
     *        ),
     *     )
     *
     */
    public function updateMobileNumber(Request $request)
    {
        $validator = [
            'mobile' => 'required|digits:8',
            'idToken' => 'required',
            'country_id' => 'required|exists:countries,id',
        ];
        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }
        $user = RegisteredUser::find($request->user_id);
        $country = Country::find($request->country_id);
        $existingUser = RegisteredUser::where('mobile', $request->mobile)->where('country_id', $country->id)->get()->first();
        if ($existingUser != null) {
            return response()->json([
                'error' => LanguageManagement::getLabel('text_mobileNumberExist', $this->language),
            ], 409);
        } else {
            $response = $this->getFirebaseUser($request->idToken);
            $response = json_decode($response, true);
            if (!array_key_exists('users', $response)) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('mobile_not_found', $this->language),
                ], 404);
            }
            if (strpos($response['users'][0]['phoneNumber'], $country->country_code . $request->mobile) === false) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('mobile_not_found', $this->language),
                ], 404);
            }
            $user->update([
                'country_id' => $request->country_id,
                'mobile' => $request->mobile,
            ]);
            $country = Country::find($user->country_id);
            $user["country"] = collect($country);
            $accessToken = uniqid(base64_encode(str_random(50)));
            $token = '' . $user->id . '' . $user->mobile . '' . $accessToken;
            $access_token = $request->header('Authorization');
            $authenticatedUser = Authentication::where('access_token', $access_token)->get()->first();
            $newAuthenticatedUser = Authentication::create([
                'access_token' => $token,
                'type' => $authenticatedUser->type,
                'user_id' => $user->id,
            ]);
            return response()->json([
                'message' => LanguageManagement::getLabel('text_successUpdated', $this->language),
                'user' => collect($user),
                'access_token' => $token,
            ]);
        }
    }
    /**
     *
     * @SWG\Post(
     *         path="/user/logout",
     *         tags={"User Logout"},
     *         operationId="logout",
     *         summary="Logout the user from the app",
     *         security={{"ApiAuthentication":{}}},
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
     *        @SWG\Parameter(
     *             name="Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="player_id",
     *                  type="string",
     *                  description="users one signal player id",
     *                  example="22eshlsaj-a98asdmha-asdjad"
     *              ),
     *          ),
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
        if ($authenticateEntry == null) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_user_found', $this->language),
            ], 404);
        }
        $oneSignalUser = OneSignalUser::where('user_id', $request->user_id)->where('player_id', $request->player_id)->get()->first();
        if ($oneSignalUser == null) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_user_found', $this->language),
            ], 404);
        }
        $authenticateEntry->delete();
        $oneSignalUser->delete();
        return response()->json([
            'message' => LanguageManagement::getLabel('text_successLoggout', $this->language),
        ]);
    }

      /**
     *
     * @SWG\Get(
     *         path="/user/getEmail",
     *         tags={"User Profile"},
     *         operationId="getEmail",
     *         summary="Get User's emai;'",
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
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getEmail()
    {
        $page = Contact::find(1);
        return response()->json($page);
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
