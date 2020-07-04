<?php

namespace App\Http\Controllers\API\Patient;

use App\Authentication;
use App\Employee;
use App\LanguageManagement;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Utility;
use Carbon\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    private $access_token;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->access_token = uniqid(base64_encode(str_random(50)));
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
            'user.password' => 'required'
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $user = $request->user;
        $register = Patient::create([
            'name' => $user['name'],
            'civil_id' => $user['civil_id'],
            'phone_number' => $user['phone_number'],
            'age' => $user['age'],
            'address' => $user['address'],
            'password' => $user['password'],
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
        $patient = Patient::where('phone_number', $user['phone_number'])->get()->first();
        if ($patient) {
            $token = '' . $patient->id . '' . $this->access_token;
            Authentication::create([
                'user_id' => $patient->id,
                'access_token' => $token,
                'type' => 1
            ]);
            if ($user['password'] == $patient->password) {
                return response()->json([
                    'patient' => $patient,
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

    public function createEmployee(Request $request)
    {
        $validator = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $employee = Employee::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $token = '' . $employee->id . '' . $this->access_token;
        // Authentication::create([
        //     'user_id' => $employee->id,
        //     'access_token' => $token,
        //     'type' => 2
        // ]);

        return response()->json([
            'employee' => $employee,
            'access_token' => $token
        ]);
    }
}
