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
    public function __construst()
    {
        //
    }

      /**
     * Show the form for creating a new claim for the authenticated partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($claim)
    {
        $data['claim']= Claim::find($claim);
        return view('messages.backoffice.staff.create',$data); 
    }


    public function store(Request $request,$claim)
    {
        $user = $this->userType();
        $message_writer=auth()->guard($user)->user();

        $claim_message=ClaimMessage::create([
            'message' => $request->message,
            'status' => true,
            'claim_messageable_type' => $user,
            'claim_messageable_id' => $message_writer->id,
            'claim_id' => $claim,
        ]);
       
        return redirect('support/'.$claim);
    }

    public function userType()
    {
        $profiles= [ 'partner', 'staff'];
        for($i=0; $i<2; $i++)
        {
            if(auth()->guard($profiles[$i])->check())
            {
                break;
            }
        }
        return $profiles[$i];
    }

}
