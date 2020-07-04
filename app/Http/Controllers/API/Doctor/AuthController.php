<?php

namespace App\Http\Controllers\API\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Authentication;
use App\Doctor;
use App\LanguageManagement;
use Illuminate\Support\Facades\Storage;
use App\Patient;
use App\Utility;

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
    private $access_token;
    private $utility;
    public function __construct(Request $request)
    {
        $this->access_token = uniqid(base64_encode(str_random(50)));
        $this->utility =  new Utility();
    }

    public function register(Request $request)
    {
        $validator = [
            'user' => 'required',
            'user.name' => 'required',
            'user.civil_id' => 'required',
            'user.phone_number' => 'required',
            'user.age' => 'required',
            'user.address' => 'required',
            'user.password' => 'required',
            'user.speciality' => 'required',
            'user.file' => 'required'
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $user = $request->issue;

        $file_data = $user['file'];
        $file_name = 'issue_image' . time() . '.png';

        if ($file_data != null) {
            Storage::disk('public')->put('doctor_images/' . $file_name, base64_decode($file_data));
        }

        $user = $request->user;
        $register = Doctor::create([
            'name' => $user['name'],
            'civil_id' => $user['civil_id'],
            'phone_number' => $user['phone_number'],
            'age' => $user['age'],
            'address' => $user['address'],
            'password' => $user['password'],
            'image' => $file_name,
            'speciality' => $user['speciality'],
        ]);
        return response()->json([
            'message' => LanguageManagement::getLabel('text_successRegistered', 'en'),
        ]);
    }


    public function login(Request $request)
    {
        $validator = [
            'user' => 'required',
            'user.phone_number' => 'required',
            'user.password' => 'required'
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $user = $request->user;
        $doctor = Doctor::where('phone_number', $user['phone_number'])->get()->first();
        if ($doctor) {
            if ($doctor->status == 0) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('text_accountDeactivated', 'en'),
                ], 404);
            }
            $token = '' . $doctor->id . '' . $this->access_token;
            Authentication::create([
                'user_id' => $doctor->id,
                'access_token' => $token,
                'type' => 2
            ]);
            if ($user['password'] == $doctor->password) {
                return response()->json([
                    'patient' => $doctor,
                    'access_token' => $token
                ]);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('invalid_credentials', 'en'),
                ], 404);
            }
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('user_not_found', 'en'),
            ], 404);
        }
    }
}
