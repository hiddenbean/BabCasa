<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PartnerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:partner')->except('logout');
    }

    /**
     * Show the application's login form for the finale client.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('system.backoffice.partner.login');
    }

    /**
     * Validate a registration request.
     * Check which login the partner used to log in.
     * attempt to log in the partner.
     * If true redirect to the partner's home page.
     * If false Redirect to the previous page.
     * 
     * @param  \Illuminate\Http\Request.
     * @return \Illuminate\Http\Response.
     */
    public function login(Request $request)
    {
        $this->validateReqeust($request);
        
        if(Auth::guard('partner')->attempt($request->only('email', 'password'), $request->remember))
        {
            return redirect()->intended('/');
        }
        return redirect()->back();
    }

    /**
     * Validate the partner's login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validateReqeust(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:partners,email',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Log the partner out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function logout(Request $request)
   {
       Auth::guard('partner')->logout();
       $request->session()->invalidate();
       return redirect('/sign-in');
   }

   public function redirecTo()
    {
        return '/';
    }
}
