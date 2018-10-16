<?php

namespace App\Http\Controllers\Auth;
//use this class to override the showResetForm funtion.
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use password to import the password reset configuration from Config\Auth.
use Password;
use Auth;
class StaffResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new partner login controller instance.
     * Call te auth middleware and specify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:staff');
    }

    /**
     * Get the broker to be used during password reset for a partner.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('staff');
    } 

    /**
     * Get the partner guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard()
    {
        return Auth::guard('staff');
    }
    
    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $staff, $token = null)
    {
        return view('system.backoffice.staff.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
