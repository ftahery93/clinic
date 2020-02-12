<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Utility;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;


class ResetCompanyPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $utility;
    public $language;
    private $accessToken;
    protected $guard = 'api';
    protected $broker = 'companies';


    use ResetsPasswords;

    public function __construct(Request $request)
    {
        $this->utility = new Utility();
    }

    public function getEmail()
    {
        return $this->showLinkRequestForm();
    }


    public function showResetForm(Request $request, $token = null)
    {

        return view('auth.api_passwords.reset')->with(
            ['token' => $token, 'email' => decrypt($request->email), 'url' => env('BACKEND_PATH') . '/password/resetCompanyPassword']
        );
    }


    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {

        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
    }


    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return view('auth.api_passwords.success')->with('success',  trans('messages.reset_password_success'));
    }
    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
    public function broker()
    {
        return Password::broker($this->broker);
    }

    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
