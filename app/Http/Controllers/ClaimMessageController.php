<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Business;
use App\ClaimMessage;
use App\Subject;
use Auth;
use DateTime;
use App\Claim;
use App\Notifications\NewClaim;

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
            $staff= $claim->staff;

            if($user == 'staff')
            {
                $this->userNotify($claim->claimable_id,$claim->claimable_type,$staff->id);
            }else
            {
                $data['causer']=['id'=> $staff->id, 'type'=>'staff'];
                $data['link'] = 'http://staff.babcasa.com/fr/support';
                $staff->notify(new NewClaim($data));
    
            }
            
        }
        return redirect('support');
    }

    
    public function userNotify($id,$type,$staffId)
    {
        $data['causer']=['id'=> $staffId, 'type'=>'staff'];
        $data['link'] = 'http://'.$type.'.babcasa.com/fr/support';
        switch ($type) {
            case 'partner':
                return Partner::findOrFail($id)->notify(new NewClaim($data)); 
            break;
            case 'business':
                return Business::findOrFail($id)->notify(new NewClaim($data)); 
            break;
        }

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
