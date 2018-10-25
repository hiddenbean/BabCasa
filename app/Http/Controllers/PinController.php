<?php

namespace App\Http\Controllers;

use App\Pin;
use DateTime;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff,business,partner');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userName)
    {
        $type = $this->userType($userName);
        $user = $type[0]::where('name', $userName)->first();
        $pin = $this->pinExistence($user);
        if(!$pin)
        {
            $date = new DateTime();
            $date = date_modify($date,"+5 minutes");
            $code = rand(100000, 999999);
            $pin = Pin::create([
                'code' => $code,
                'expired' => 0,
                'expired_at' => date_format($date,"Y-m-d H:i:s"),
                'pinable_type' => $type[1],
                'pinable_id' => $user->id
            ]);
        }
        if($this->sendPinCode($pin, $user))
        {
            $url = str_before(url()->current(), $user->name).''.$user->name;
            return redirect($url.'/pin/verification')
                                ->with(
                                    'success', 
                                    'the message has been sent successfuly !!'
                                );
        }
        return redirect()
                        ->back()
                        ->with(
                            'error',
                            'The user doesn\'t have a valid number !!'
                        );
    }

    public function userType($userName)
    {
        $url_split = str_after(str_before(url()->current(), '/'.$userName), '.com/');
        switch ($url_split)
        {
            case 'partners' : return ['App\Partner', 'partner', 'partners.backoffice.staff']; break;
            case 'clients/business' : return ['App\Business', 'business', 'business_clients.backoffice.staff']; break;
            case 'clients' : return 'App\Client'; break;
            case 'staff' : return ['App\Staff', 'staff', 'staff.backoffice']; break;
        }
    }

    public function pinExistence($user)
    {
        $date = new DateTime();
        $date = date_format($date, 'y-m-d H:i:s');
        $pin = $user->pins()->whereDate('expired', false)->where('expired_at', '>' , $date)->first();
        return $pin;
    }

    /**
     * Send sms to the partner in case of changing password by a staff member
     * 
     * @param User $user
     * @return \illuminate\Http\Response
     */
    public function sendPinCode($pin, $user)
    {
        $phone = $user->phones->where('type', 'phone')->first();
        if($phone)
        {   $nexmo = app('Nexmo\Client');
            $nexmo->message()->send([
                'to'   => $phone->country->code.''.$phone->number,
                'from' => '0610256365',
                'text' => 'Mr '.$user->name.' this is your code to reset password.'.$pin->code
            ]);
            return true;
        }
        return false;
    }

    public function checkPinForm($userName)
    {
        $type = $this->userType($userName);
        $user = $type[0]::where('name', $userName)->first();
        return view($type[2].'.pin_verification', ['user' => $user]);
    }

    public function checkPin(Request $request, $userName)
    {
        $request->validate([
            'pin_code' => 'required|numeric|digits:6',
        ]);
        $type = $this->userType($userName);
        $user = $type[0]::where('name', $userName)->first();
        $pin = $this->pinExistence($user);
        if(!$pin)
        {
            return redirect()
                            ->back()
                            ->with(
                                'error',
                                'The you pin is invalid, you need to request a new pin !!'
                            );
        }
        if($pin->code != $request->pin_code)
        {
            return redirect()
                            ->back()
                            ->with(
                                'error',
                                'The you pin is invalid !!'
                            );
        }

        $password = str_random(10);
        $user->password = Hash::make($password);
        $user->save();
        $pin->expired = true;
        $pin->save();
        $url = str_before(url()->current(), $user->name).''.$user->name.'/password/'.$password;
        return redirect($url);
    }

    public function showPassword($userName, $password)
    {
        $type = $this->userType($userName);
        $user = $type[0]::where('name', $userName)->first();
        return view($type[2].'.password', [
            'password' => $password,
            'user' => $user,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function show(Pin $pin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function edit(Pin $pin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pin $pin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pin $pin)
    {
        //
    }
}
