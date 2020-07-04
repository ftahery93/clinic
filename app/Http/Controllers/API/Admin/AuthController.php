<?php

namespace App\Http\Controllers\API\Admin;

use App\Admin;
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

    public function login(Request $request)
    {
        $validator = [
            'user' => 'required',
            'user.username' => 'required',
            'user.password' => 'required'
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }
        $user = $request->user;
        $admin = Admin::where('username', $user['username'])->get()->first();
        if ($admin) {
            $token = '' . $admin->id . '' . $this->access_token;
            Authentication::create([
                'user_id' => $admin->id,
                'access_token' => $token,
                'type' => 3
            ]);
            if ($user['password'] == $admin->password) {
                return response()->json([
                    'admin' => $admin,
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
