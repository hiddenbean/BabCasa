<?php

namespace App\Http\Controllers;

Use Auth;
use App\Claim;
use App\Subject;
use App\Partner;
use App\ClaimMessage;
use Illuminate\Http\Request;
use App\Notifications\ClaimNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\ClaimMessageController;

class ClaimController extends Controller
{
        // $data['causer']=['id'=>1, 'type'=>'partner'];
        // $data['link'] = 'http://staff.babcasa.com/fr/languages';
        // Auth::guard('staff')->user()->notify(new NewClaim($data));

    /**
     * Create a new partner controller instance.
     * Call te auth middleware and pecify the partner guard.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:partner,staff');
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
        $type = $this->userType();
        switch ($type) {
            case 'partner':
                $data['claims'] = Auth::guard('partner')->user()->claims;
                $view = 'claims.backoffice.partner.index';
                break;

            case 'staff':
            $data['orders'] = Claim::all();
            $view = 'orders.backoffice.staff.index';
                break;
        }
        return view('claims.backoffice.staff.index');
    }
    /**
     * Display a list of all claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        
        $data['claims']=Claim::all();
        return view('claims.backoffice.staff.index',$data);  
    }
    /**
     * Display a list of open claims.
     *
     * @return \Illuminate\Http\Response
     */

    public function open()
    {
        
        $type = $this->userType();
        switch ($type) {
            case 'partner':
                $data['claims'] = Auth::guard('partner')->user()->claims->where('status',true);
                $view = 'claims.backoffice.partner.index';
                break;

            case 'staff':
                $data['orders'] = Claim::where('status',true);
                $view = 'claims.backoffice.staff.index';
                break;
        }
        return view($view,$data);
    }

    /**
     * Display a list of close claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {       
        $type = $this->userType();
        switch ($type) {
            case 'partner':
                $data['claims'] = Auth::guard('partner')->user()->claims->where('status',false);
                $view = 'claims.backoffice.partner.index';
                break;

            case 'staff':
                $data['orders'] = Claim::where('status',false);
                $view = 'claims.backoffice.staff.index';
                break;
        }
        return view($view,$data);
    }
    /**
     * Display a list of related claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function related()
    {
        
        $data['claims']=Auth::guard('staff')->user()->claims;
        return view('claims.backoffice.staff.index',$data);  
    }

    /**
     * Show the form for creating a new claim for the authenticated partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects']=Subject::all();

        $user_type = $this->userType();
        switch ($user_type) {
            case 'partner': $view = 'claims.backoffice.partner.create';break;
            case 'staff':$view = 'claims.backoffice.staff.create';break;
        }
        return view($view,$data);
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
        

        $userType = $this->userType();
        $user=auth()->guard($userType)->user();
        
        $claim = new Claim();
        
        $claim->title = $request->title;
        $claim->status = true;
        $claim->subject_id = $request->subject_id;
        $claim->staff_id = 2;
        $claim->claimable_type = $userType;
        $claim->claimable_id = $user->id;
        $claim->save();

        $array = [Staff::find(2), $user];
        Notification::send($array, new ClaimNotification($user, " has added a new claim ", $claim));

        $message = new ClaimMessage();
        
        $message->message = $request->message;
        $message->status = true;
        $message->claim_id = $claim->id;
        $message->claim_messageable_type = $user;
        $message->claim_messageable_id = $complainer->id;

        $message->save();
        return redirect('support');
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


    /**
     * Display the claim along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['claim']=Claim::where('id', $id)->first();
        $user_type = $this->userType();
        switch ($user_type) {
            case 'partner': $view = 'claims.backoffice.partner.show';break;
            case 'staff':$view = 'claims.backoffice.staff.show';break;
        }
        return view($view,$data);
    }
    /**
     * Display the claim along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        $user_type = $this->userType();
        $user=auth()->guard($user_type)->user();
        $claim=Claim::where('id', $id)->first();
        $claim->status = 0;
        $claim->save();
        $array = [$claim->staff, $claim->claimable];
        Notification::send($array, new ClaimNotification($user, " has closed claim ", $claim));
        return redirect()->back();
    }

    /**
     * Save the message and attache it to the claim.
     * Return the claim page along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function saveReply(Request $request)
    {
        $this->validateMessage($request);
        $user_type = $this->userType();
        $user = auth()->guard($user_type)->user();
        $claim_id = $request->input('claim_id');
        $message = $request->input('message');
        $claim_message=ClaimMessage::create([
            'message' => $message,
            'status' => true,
            'claim_messageable_type' => $user_type,
            'claim_messageable_id' => $user->id,
            'claim_id' => $claim_id,
        ]);
        $array = [$claim->staff, $claim->claimable];
        Notification::send($array, new ClaimNotification($user, " has added a new message to the claim ", $claim));
        return redirect('/support/ticket/'.$claim_id);   
    }

    public function validateMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
    }
    
    public function destroy( $id)
    {
        $user_type = $this->userType();
        $user = auth()->guard($user_type)->user();
        $claim = Claim::findOrFail($id);
        $array = [$claim->staff, $claim->claimable];
        $claim->delete();
        Notification::send($array, new ClaimNotification($user, " has deleted the claim ", $claim));
        return redirect('support/ticket');
    }

    public function changeStatus($id)
    {
        $claim=Claim::where('id', $id)->firstOrFail();
        $claim->status=false;
        $claim->update();
        return back()->with('claim', $claim);
    }

}
