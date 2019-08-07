<?php

namespace App\Http\Controllers\API\Company;

use App\Company;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $utility;
    public $language;
    protected $guard = 'api';
    protected $broker = 'companies';
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Post(
     *         path="/company/forgotPassword",
     *         tags={"Company Forgot Password"},
     *         operationId="forgotPassword",
     *         summary="Request for password reset",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *     @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *         @SWG\Parameter(
     *             name="body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *               @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  description="User's email - *(Required)",
     *                  example="info@dhl.com"
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *       )
     *
     */
    public function sendResetLinkEmail(Request $request)
    {

        $validator = [
            'email' => 'required|email',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);

        if ($checkForError) {
            return $checkForError;
        }

        // We will send the password reset link to this application user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the application user. Finally, we'll send out a proper response.

        $response = $this->broker()->sendResetLink($request->only('email'));

        if ($response == 'passwords.user') {
            return response()->json([
                'error' => LanguageManagement::getLabel('email_not_found', $this->language),
            ], 401);
        }
        if ($response == 'passwords.sent') {
            return response()->json([
                'message' => LanguageManagement::getLabel('forgot_password_email_sent', $this->language),
            ]);
        }
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkResponse($response)
    {
        return response()->json(['success' => trans($response)], 200);
    }
    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['error' => trans($response)], 422);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker($this->broker);
    }

    protected function guard()
    {
        return Auth::guard($this->guard);
    }

}
