<?php

namespace App\Http\Controllers;

use App;
use Auth;
use DB;
use App\Staff;
use App\Profile;
use App\Picture;
use App\Language;
use App\Address;
use App\Country;
use App\Gender;
use App\Phone;
use App\Claim;
use App\Partner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClaimNotification;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Hash;
use App\Guest;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class StaffController extends Controller
{use Queueable;
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:staff,email',
            'gender_id' => 'required',
            'birthday' => 'required|date',
            'password' => 'required|min:6',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['staffs'] = Staff::where('id','!=',0)->get();
        return view('staff.backoffice.staff.index',$data);
    }

    /**
     * 
     */
    public function trash() {
        $data['staffs'] = Staff::onlyTrashed()->get();
        return view('staff.backoffice.staff.trash',$data);
    }
    
    public function dashboard()
    {
        return view('system.backoffice.staff.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['profiles'] = Profile::all();
        $data['countries'] = Country::all();
        $data['genders'] = Gender::all();
        return view('staff.backoffice.staff.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->gender_id = $request->gender_id;
        $staff->birthday = date('Y-m-d H:i:s',strtotime($request->birthday));
        $staff->password = bcrypt($request->password);
        $staff->profile_id = $request->profile_id;
        $staff->save();
        
        if($request->path)
        {
            $picture = Picture::create([
                'name' => time().'.'.$request->file('path')->extension(),
                'tag' => "staff",
                'path' => $request->path->store('images/staff', 'public'),
                'extension' => $request->path->extension(),
                'pictureable_type' => 'staff',
                'pictureable_id' => $staff->id,
                ]);
                
            }
        if($request->address)
        {
            $adress = new Adress();
            $adress->address = $request->address;
            $adress->address_two = $request->address_two;
            $adress->ful_name = $request->ful_name;
            $adress->zip_code = $request->zip_code;
            $adress->ful_name = $request->ful_name;
            $adress->city = $request->city;
            $adress->save();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($staff)
    {
        // return date('Y-m-d',strtotime("-1 week"));
        $data['staff'] = Staff::findOrFail($staff);
        $data['activities'] = $data['staff']->logs
                                            ->where('created_at','>=' ,date('Y-m-d h:i:s',strtotime("-1 week") ))
                                            ->groupBy(function($item){return $item->created_at->format('d-M-y');});
        return view('staff.backoffice.staff.show',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $data['profiles'] = Profile::all();
        $data['countries'] = staff::all();
        $data['staff'] =  Auth::guard('staff')->user();
        //$data['staff'] = Staff::find(Auth::guard('staff')->user()->id);
        return view('system.backoffice.staff.profile',$data);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($staff)
    {
        $data['profiles'] = Profile::all();
        $data['countries'] = Country::all();
        $data['genders'] = Gender::all();
        $data['staff'] = Staff::findOrFail($staff);
        return view('staff.backoffice.staff.edit',$data);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$staff)
    {
        $full_name= $request->first_name.' '.$request->last_name;
        $request['full_name'] = $full_name;
        $request['email'] .= '@babcasa.com';
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:staff,email,'.$staff.',id',
            'gender_id' => 'required',
            'birthday' => 'required|date',
            'profile_id' => 'required|exists:profiles,id',
        ]);
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);

        
        $request->validate([
            'number' => 'required|numeric|unique:phones,number,'.$staff.',phoneable_id,phoneable_type,staff|digits:9',
            'code_country' => 'sometimes',
            ]);
            
            $staff = Staff::findOrFail($staff);
            $staff->name = $request->name;
            $staff->first_name = $request->first_name;
            $staff->last_name = $request->last_name;
            $staff->email = $request->email;
            $staff->gender_id = $request->gender_id;
            $staff->profile_id = $request->profile_id;
            $staff->birthday = date('Y-m-d H:i:s',strtotime($request->birthday));
            $staff->save();
            
            
            $address = $staff->address;
            $address->address = $request->address;
            $address->address_two = $request->address_two;
            $address->full_name = $request->full_name;
            $address->zip_code = $request->zip_code;
            $address->country_id = $request->country_id;
            $address->city = $request->city;
            $address->save();
            

            if($request->hasFile('path')) 
            {
                $picture = $staff->picture;
                if(!$staff->picture)
                {   
                    $picture = new Picture();
                    $picture->pictureable_id = $staff->id;
                    $picture->pictureable_type = 'staff';
                }
                $picture->name = time().'.'.$request->file('path')->extension();
                $picture->tag = "staff_avatar";
                $picture->path = $request->path->store('images/staff', 'public');
                $picture->extension = $request->path->extension();
                $picture->save();
            }
            if($request->number)
            {
                
                $phone = Phone::where('id', $request->phone_id)
                ->whereIn('type', ['phone', 'fix'])
                ->where('phoneable_id', $staff->id)
                ->first();
                if($phone == null)
                {
                    $phone = new Phone();
                    $phone->phoneable_id = $staff->id;
                    $phone->phoneable_type = 'staff';
                }
                $phone->number = $request->number;
                $phone->type = "phone";
                $phone->save();
            
        }
        $page = Auth::guard('staff')->id() == $staff->id ? 'account' : 'staff';  
        return redirect($page);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($Staff)
    {
        $staff = Staff::findOrFail($Staff);
        if(isset($staff->claims[0]))
        {
            $messages['error'] = 'Staff can\'t be deleted he is in an association with claim !!';
            return redirect('staff')->with('messages',$messages);
        }
        $staff->delete();
        $messages['success'] = 'Staff has been deleted successfuly !!';
        return redirect('staff')->with('messages',$messages);

    }


    /**
     *
     * 
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'staffs' => 'required',
            ]);
        $e=$s=0;
        $messages = [];
        
        foreach($request->staffs as $Staff)
        {
            $staff = Staff::findOrFail($Staff);
    
            if(!isset($staff->claims[0])) 
            {
                $s++;
                $staff->delete();
                $messages['success'] = $s. ($s == 1 ? ' staff' :' Staff') .' has been deleted successfuly';
            }
    
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' staff' : ' Staff') . ' can\'t be deleted he has claims';
            }
        }
        return redirect('staff')->with('messages', $messages);
    }
    /**
     * 
     * 
     */
    public function restore($Staff)
    {
        $staff = Staff::onlyTrashed()->where('id', $Staff)->first();
        $staff->restore();
        $messages['success'] = 'staff has been restored successfuly !!';
        return redirect('staff')->with('messages',$messages);
    }
    /**
     * 
     */
    public function multiRestore(Request $request)
    {
        $request->validate([
            'staffs' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->staffs as  $Staff)
        {
            $staff = Staff::onlyTrashed()->where('id', $Staff)->first();
            $staff->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' staff' :' staff') .' has been restored successfuly';
        }
        return redirect('staff')->with('messages',$messages);
    }

    /**
     * Show all open sessions for the account.
     * Option to change password and to desable the account.
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        $staff = Auth::guard('staff')->user();
        $guests = Guest::some($staff->id);
        return view('system.backoffice.staff.security', [
            'staff' => $staff,
            'guests' => $guests,
        ]);
    }

    /**
     * Desable staffs account.
     *
     * @param  \Iluminate\Http\Request $request
     * @param  \App\Staff  $staff
     * @param  \App\Guest  $session_id
     * @return \Illuminate\Http\Response
     */
    public function sessionDestroy(Request $request,$staff, $session_id)
    {
        DB::table('sessions')->where('id', $session_id)->delete();
        return redirect(str_before(url()->current(), '.com').'.com/security');
    }

    public function resetPasswordForm()
    {
        return view('system.backoffice.staff.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $staff = auth()->guard('staff')->user();
        $hasher = app('hash');
        if ($hasher->check($request->old_password, $staff->password)) 
        {
            $password = Hash::make($request->password);
            $staff->password = $password;
            $staff->save();
            return redirect('security')
                                    ->with(
                                        'success',
                                        'Password has been changed successfuly !!'
                                    );
        }
        return redirect()
                        ->back()
                        ->with(
                            'error',
                            'Old password is not correct !!'
                        );
    }

    public function reset(Request $request, $staff)
    {
        $password_communicated = ($request->password_communicated=='on') ? 1 : 0;
        if($password_communicated)
        {
            $password = Hash::make($request->password);
            $staff = Staff::where('name', $staff)->first();
            if($staff)
            {
                $staff->password = $password;
                $staff->save();
                $messages['success'] = 'Password reset has been done successfuly !!';
            }
            else
            {
                $messages['error'] = 'Staff member doesn\'t exist !!';
            }
        }
        else
        {
            $messages['error'] = 'Please communicate the password !!';
        }
        return redirect()
                        ->back()
                        ->with('messages', $messages);
    }

    public function log()
    {
        $activities = Auth::guard('staff')->user()->logs
                                        ->where('created_at','>=' ,date('Y-m-d h:i:s',strtotime("-1 week") ))
                                        ->groupBy(function($item){return $item->created_at->format('d-M-y');});


        foreach($activities as $key => $activitys)
        {
            $data['activities'][$key]= $activitys->sortByDesc('created_at');
        }

        krsort($data['activities']);
        return view('logs.backoffice.index', $data);
    }

    public function notification()
    {   $array = [Staff::find(2), Partner::find(1)];
        $staff = Staff::find(2);
        $partner = Partner::find(1);
        // $test = $staff->merge($partner);
        //return $test = array_merge($staff->toArray(), $partner->toArray());
        $claim = Claim::find(1);
        Notification::send($staff, new ClaimNotification($partner, " has added a new claim ", $claim));
        // Notification::send($array, new ClaimNotification($partner, " has added a new claim ", $claim));
        return 'hkji';
    }
}
