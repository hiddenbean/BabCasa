<?php

namespace App\Http\Controllers\Auth;
//use this class to override the showLinkRequestForm funtion.
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

//use password to import the password reset configuration from Config\Auth.
use Password;
class StaffForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
     * Get the broker to be used during password reset for a finale client.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('staff');
    } 

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('system.backoffice.staff.password.email');
    }
}
