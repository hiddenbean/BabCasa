<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StaffLoginController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }

    /**
     * Show the application's login form for the staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('system.backoffice.staff.login');
    }

    /**
     * Validate a registration request.
     * Check which login the staff used to log in.
     * attempt to log in the staff.
     * If true redirect to the staff's home page.
     * If false Redirect to the previous page.
     * 
     * @param  \Illuminate\Http\Request.
     * @return \Illuminate\Http\Response.
     */
    public function login(Request $request)
    {
        $this->validateReqeust($request);
        $loginRequest = [
            'email' => $request->username."@babcasa.com",
            'password' => $request->password,
        ];
        $remember = $request->remember === "on" ? true : false;
        if(Auth::guard('staff')->attempt($loginRequest, $remember))
        {
            activity()
                    ->causedBy(auth()->guard('staff')->user())
                    ->log("logged in");
            return redirect()->intended('/');
        }
        return redirect()->back()->withInput()->withErrors([
            "faild" => "Your username or password is incorrect",
        ]);
    }

    /**
     * Validate the staff's login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validateReqeust(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Log the staff out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $staff = auth()->guard('staff')->user();
        activity()
                ->causedBy($staff)
                ->log("logged out");
        Auth::guard('staff')->logout();
        $request->session()->invalidate();
        return redirect('sign-in');
    }

    public function redirecTo()
    {
        return '/';
    }
}
