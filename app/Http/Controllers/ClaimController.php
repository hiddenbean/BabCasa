<?php

namespace App\Http\Controllers;

Use Auth;
Use Ajax;
use App\Claim;
use App\Staff;
use App\Subject;
use App\Partner;     
use App\Business;     
use App\ParticularClient;
use App\ClaimMessage;
use Illuminate\Http\Request;
use App\Notifications\ClaimNotification;
    use App\Notifications\NewClaim;
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
            'subject_id' => 'required',
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
        $data['subjects']=Subject::all();
        $claims = Auth::guard($type)->user()->claims->groupBy(function($item){return $item->created_at->format('d-M-y');});
        $data['claims'] =[];
        foreach($claims as $key => $claim)
        {
            $data['claims'][$key]= $claim->sortByDesc('created_at');
        }
        krsort($data['claims']);
        return view('claims.backoffice.'.$type.'.index',$data);
    }
    public function all()
    {
        $type = $this->userType();
        $data['subjects']=Subject::all();
        $claims = Auth::guard($type)->user()->claims->groupBy(function($item){return $item->created_at->format('d-M-y');});
        $data['claims'] =[];
        foreach($claims as $key => $claim)
        {
            $data['claims'][$key]= $claim->sortByDesc('created_at');
        }
        krsort($data['claims']);
        Ajax::redrawView('claimBody'); 
        // return $data['claims'];
        return Ajax::view('claims.backoffice.staff.body',$data);
        // return view('claims.backoffice.'.$type.'.index',$data);
    }
    
    /**
     * Display a list of open claims.
     *
     * @return \Illuminate\Http\Response
     */

    public function open()
    {
        $type = $this->userType();
        $data['subjects']=Subject::all();
        $claims = Auth::guard($type)->user()->claims->where('status',true)->groupBy(function($item){return $item->created_at->format('d-M-y');});
        $data['claims'] =[];
        foreach($claims as $key => $claim)
        {
            $data['claims'][$key]= $claim->sortByDesc('created_at');
        }
        krsort($data['claims']);
        Ajax::redrawView('claimBody'); 
        return Ajax::view('claims.backoffice.staff.body',$data);
        // return view('claims.backoffice.'.$type.'.index',$data);
    }

    /**
     * Display a list of close claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {       
        $type = $this->userType();
        $data['subjects']=Subject::all();
        $claims = Auth::guard($type)->user()->claims->where('status',false)->groupBy(function($item){return $item->created_at->format('d-M-y');});
        $data['claims'] =[];
        foreach($claims as $key => $claim)
        {
            $data['claims'][$key]= $claim->sortByDesc('created_at');
        }
        Ajax::redrawView('claimBody'); 
        return Ajax::view('claims.backoffice.staff.body',$data);
        // return view('claims.backoffice.'.$type.'.index',$data);
    }

    public function subject($subject)
    {       
        $type = $this->userType();
        $data['subjects']=Subject::all();
        $claims = Auth::guard($type)->user()->claims->where('subject_id',$subject)->groupBy(function($item){return $item->created_at->format('d-M-y');});
        $data['claims'] =[]; 
        foreach($claims as $key => $claim)
        {
            $data['claims'][$key]= $claim->sortByDesc('created_at');
        }
        krsort($data['claims']);
        Ajax::redrawView('claimBody'); 
        return Ajax::view('claims.backoffice.staff.body',$data);
        // return view('claims.backoffice.'.$type.'.index',$data);
    }


    /**
     * Show the form for creating a new claim for the authenticated partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects']=Subject::all();
        $data['partners']=Partner::all();
        $data['businesses']=Business::all();
        $data['clients']=ParticularClient::all();

        $user_type = $this->userType();
        return view('claims.backoffice.'.$user_type.'.create',$data);
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
        
        $claim->status = true;
        $claim->title = $request->title;
        $claim->subject_id = $request->subject_id;
        $claim->staff_id = $this->staffTarget()->id;
        $claim->claimable_type = $userType;
        $claim->claimable_id = $user->id;
        if($userType == 'staff')
        {
            $claim->staff_id = $user->id;
            $claim->claimable_type = $request->user_type;
            $claim->claimable_id = $request->user_id;
            $this->userNotify($request->user_id,$request->user_type);
        }else
        {
            $data['causer']=['id'=> $user->id, 'type'=>$userType];
            $data['link'] = 'http://staff.babcasa.com/fr/support';
            $this->staffTarget()->notify(new NewClaim($data));

        }
        
        
        $claim->save();
        
        // $array = [Staff::find(2), $user];
        // Notification::send($array, new ClaimNotification($user, " has added a new claim ", $claim));
        
        $message = new ClaimMessage();
        
        $message->message = $request->message;
        $message->status = true;
        $message->claim_id = $claim->id;
        $message->claim_messageable_type = $userType;
        $message->claim_messageable_id = $user->id;
        
        $message->save();
        return redirect('support');
    }

    public function userNotify($id,$type)
    {
        $data['causer']=['id'=> $this->staffTarget()->id, 'type'=>'staff'];
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

    public function staffTarget()
    {
        $minStaff=Staff::first();
        $min =  $minStaff->claims->where('status',true)->count();
        foreach(Staff::all() as $staff)
        {
            if($staff->permission('claim') && $staff->claims->where('status',true)->count() < $min)
            {
                $min = $staff->claims->where('status',true)->count();
                $minStaff = $staff;
            } 

        }
        return  $minStaff;
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
        // $array = [$claim->staff, $claim->claimable];
        // Notification::send($array, new ClaimNotification($user, " has closed claim ", $claim));
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
