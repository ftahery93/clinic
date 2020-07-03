<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Authentication;

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
    public function __construct(Request $request)
    {
        $this->access_token = uniqid(base64_encode(str_random(50)));
    }

    public function login()
    {
        $user = User::create();
        $token = '' . $user->id . '' . $this->access_token;
        Authentication::create([
            'user_id' => $user->id,
            'access_token' => $token,
            'type' => 1
        ]);
        return response()->json([
            'user' => $user,
            'access_token' => $token
        ]);
    }
}
