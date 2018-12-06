<?php

namespace App\Http\Controllers;

use App\Partner;
use App\ClaimMessage;
use App\Subject;
use Auth;
use DateTime;
use App\Claim;
use Illuminate\Http\Request;


class ClaimMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff,partner');
        
    }

      /**
     * Show the form for creating a new claim for the authenticated partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($claim)
    {
        $data['claim']= Claim::find($claim);
        $type = $this->userType();
        switch ($type) {
            case 'partner': $view = 'messages.backoffice.partner.create';break;
            case 'staff':$view = 'messages.backoffice.staff.create';break;
        }
        return view($view,$data);
    }


    public function store(Request $request,$Claim)
    {
        if($request->message)
        {
            $claim = Claim::findOrFail($Claim);
            $user = $this->userType();
            $message_writer=auth()->guard($user)->user();
    
            $claim_message=ClaimMessage::create([
                'message' => $request->message,
                'status' => true,
                'claim_messageable_type' => $user,
                'claim_messageable_id' => $message_writer->id,
                'claim_id' => $claim->id,
            ]);

        }
        return redirect('support');
    }

    public function userType()
    {
        $profiles= [ 'partner', 'staff','business'];
        for($i=0; $i<3; $i++)
        {
            if(auth()->guard($profiles[$i])->check())
            {
                break;
            }
        }
        return $profiles[$i];
    }

}
