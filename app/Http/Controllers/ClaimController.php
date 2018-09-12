<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ClaimMessageController;
use App\Claim;
use App\Subject;
use App\Partner;
use App\ClaimMessage;
use Illuminate\Http\Request;
Use Auth;

class ClaimController extends Controller
{
    /**
     * Create a new partner controller instance.
     * Call te auth middleware and pecify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:partner');
    }

      public function validateClaim(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
    }
    /**
     * Display a list of partner's claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $data['partner'] = Partner::where('name',$partner)->firstOrFail();
        $data['claims']=$data['partner']->claims;
        return view('claims.backoffice.partner.index',$data);  
    }

    /**
     * Show the form for creating a new claim for the authenticated partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subject)
    {
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $data['partner'] = Partner::where('name',$partner)->firstOrFail();
        $data['subjects']=Subject::all();
        $data['Subject']=Subject::where('name',$subject)->firstOrFail();
        return view('claims.backoffice.partner.create',$data); 
    }

    /**
     * Store a newly created claim.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateClaim($request);

        $user = $this->userType();
        $complainer=auth()->guard($user)->user();
        
        $claim = new Claim();
        
        $claim->title = $request->title;
        $claim->status = true;
        $claim->subject_id = $request->subject_id;
        $claim->staff_id = 1;
        $claim->claimable_type = $user;
        $claim->claimable_id = $complainer->id;
        $claim->save();
        
        $message = new ClaimMessage();
        
        $message->message = $request->message;
        $message->status = true;
        $message->claim_id = $claim->id;
        $message->claim_messageable_type = $user;
        $message->claim_messageable_id = $complainer->id;

        $message->save();
        return redirect('support/ticket');
         
    }

  

    public function userType()
    {
        $profiles= [ 'partner', 'staff'];
        for($i=0; $i<4; $i++)
        {
            if(auth()->guard($profiles[$i])->check())
            {
                break;
            }
        }
        return $profiles[$i];
    }

    /**
     * Display the claim along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        $claim=Claim::where('id', $id)->first();
        return  $claim;
    }

  

    public function validateMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
    }
    
    public function destroy( $id)
    {
        $claim = Claim::findOrFail($id);
        $claim->delete();
    }

    public function changeStatus($id)
    {
        $claim=Claim::where('id', $id)->firstOrFail();
        $claim->status=false;
        $claim->update();
    }

}
