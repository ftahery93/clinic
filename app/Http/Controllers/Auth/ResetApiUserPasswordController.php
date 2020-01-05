<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Company;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


class ResetApiUserPasswordController extends Controller
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

    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->accessToken = uniqid(base64_encode(str_random(50)));        
    }

   
    public function getEmail() {
        return $this->showLinkRequestForm();
    }

    public function showResetForm(Request $request, $token = null) { 
        
      
         $token = $request->token;
        
        if (is_null($token)) {
            return $this->getEmail();
        }
        $email = $request->input('email');
        
        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }

        if (view()->exists('auth.api_passwords.reset')) {
            return view('auth.api_passwords.reset')->with(compact('token', 'email'));
        }
       
        return view('api_passwords.auth.reset')->with(compact('token', 'email'));
    }
    
     /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
      
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }

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
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
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
        return view('auth.api_passwords.success')->with('success', LanguageManagement::getLabel('forgot_password_email_sent', 'en'));
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
