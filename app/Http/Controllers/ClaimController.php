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
        $data['claims']=$partner->claims;
        return $data;  
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
        $data['subject']=Subject::where('name',$subject)->firstOrFail();
        return $data;   
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
        $subject=Subject::where('name', $request->input('subject'))->firstOrFail();
        $claim = Claim::create([
            'title' => $request->input('title'),
            'status' => true,
            'subject_id'=> $subject->id,
            'staff_id' => '',
            'claimable_type' => $user,
            'claimable_id' => $complainer->id,
        ]);
         
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
