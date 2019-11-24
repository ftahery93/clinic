<?php
namespace App\Http\Controllers\API\Company;

use App\Authentication;
use App\Company;
use App\FreeDelivery;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\OneSignalCompanyUser;
use App\Utility;
use App\Wallet;
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
    /**
     *
     * @SWG\Post(
     *         path="/company/register",
     *         tags={"Company Register"},
     *         operationId="register",
     *         summary="Register a company to app",
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
     *             description="Android-1",
     *        ),
     *         @SWG\Parameter(
     *             name="Registration Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="name",
     *                  type="string",
     *                  description="Company Name - *(Required)",
     *                  example="Aramex"
     *              ),
     *              @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  description="company email - *(Required)",
     *                  example="info@dhl.com"
     *              ),
     *             @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="company mobile number - *(Required)",
     *                  example="88663456"
     *              ),
     *              @SWG\Property(
     *                  property="password",
     *                  type="string",
     *                  description="Company password - *(Required)",
     *                  example="d@h!$L"
     *              ),
     *             @SWG\Property(
     *                  property="confirm_password",
     *                  type="integer",
     *                  description="Company confirm password - *(Required)",
     *                  example="d@h!$L"
     *              ),
     *              @SWG\Property(
     *                  property="image",
     *                  type="string",
     *                  description="Company logo encoded in base64 - *(Required)",
     *                  example="9vjsjsd/sadjhadasdjhadaskjhasd...."
     *              ),
     *              @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="Company country ID - *(Required)",
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
            'name' => 'required',
            'email' => 'required|unique:companies|email',
            'mobile' => 'required|digits:8|unique:companies',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'image' => 'required',
            'country_id' => 'required|exists:countries,id',
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
            'country_id' => $request->country_id,
        ]);
        $token = '' . $registeredCompany->id . '' . $registeredCompany->name . '' . $this->access_token;
        Authentication::create([
            'access_token' => $token,
            'user_id' => $registeredCompany->id,
            'type' => 2,
        ]);
        Wallet::create([
            'company_id' => $registeredCompany->id,
            'balance' => 0,
        ]);
        FreeDelivery::create([
            'company_id' => $registeredCompany->id,
            'quantity' => 0,
        ]);
        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', $this->language),
            'user' => collect($registeredCompany),
            'access_token' => $token,
        ]);
    }
    /**
     *
     * @SWG\Post(
     *         path="/company/login",
     *         tags={"Company Login"},
     *         operationId="login",
     *         summary="Login a company to the app",
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
     *         @SWG\Parameter(
     *             name="Login Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  description="Company email",
     *                  example="info@aramex.com"
     *              ),
     *              @SWG\Property(
     *                  property="password",
     *                  type="string",
     *                  description="Company's password",
     *                  example=4
     *              ),
     *              @SWG\Property(
     *                  property="player_id",
     *                  type="string",
     *                  description="Company's One Signal player ID",
     *                  example="965789765456"
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
     *             response=401,
     *             description="Account deactivated or not approved"
     *        ),
     *     )
     *
     */
    public function login(Request $request)
    {
        $valdiationMessages = [
            'email' => 'required|email|exists:companies',
            'password' => 'required',
            'player_id' => 'required',
            'device_type' => 'required',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $valdiationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }
        if (!Company::where('email', $request->email)
            ->where('status', '=', 1)
            ->exists()) {
            return response()->json(['error' => LanguageManagement::getLabel('text_accountDeactivated', $this->language)], 401);
        }
        $registeredCompany = Company::where('email', $request->email)->get()->first();
        //$player_id = OneSignalCompanyUser::where('player_id', $request->player_id)->get()->first();
        if (Hash::check($request->password, $registeredCompany->password)) {
            if ($registeredCompany->approved) {
                $token = '' . $registeredCompany->id . '' . $registeredCompany->name . '' . $this->access_token;
                Authentication::create([
                    'access_token' => $token,
                    'user_id' => $registeredCompany->id,
                    'type' => 2,
                ]);
                //if ($player_id == null) {
                OneSignalCompanyUser::create([
                    'company_id' => $registeredCompany->id,
                    'player_id' => $request->player_id,
                    'device_type' => $request->device_type,
                ]);
                //}
                return response()->json([
                    'access_token' => $token,
                    'user' => collect($registeredCompany),
                ]);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('text_accountNotApproved', $this->language),
                ], 401);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('invalid_credentials', $this->language),
            ], 401);
        }
    }
}
