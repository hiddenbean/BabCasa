<?php

namespace App\Http\Controllers;

use App;
use Auth;
use DB;
use App\Staff;
use App\Profile;
use App\Language;
use App\Country;
use App\Adress;
use App\Phone;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
use App\Guest;
use Illuminate\Http\Request;

class StaffController extends Controller
{
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
            'gender' => 'required',
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
        // return $data;
        return view('staff.backoffice.index',$data);
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
        return view('staff.backoffice.create',$data);
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
        $staff->gender = $request->gender;
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
            $adress->address_tow = $request->address_tow;
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
        $data['staff'] = Staff::where('name',$staff)->first();
        // return $data['staff']->phones[0]->country; 
        return view('staff.backoffice.show',$data);
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
        $data['countries'] = Country::all();
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
        $data['staff'] = Staff::where('name',$staff)->first();
        return view('staff.backoffice.edit',$data);
        return $data;
      
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
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:staff,email,'.$staff,
            'gender' => 'required',
            'birthday' => 'required|date',
        ]);
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'numbers.1' => 'sometimes|numeric|unique:phones,number,'.$request->phone_id[1],
            'code_country.0' => 'required',
            'code_country.1' => 'required',
        ]);      

        $staff = Staff::find($staff);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->gender = $request->gender;
        $staff->profile_id = $request->profile_id;
        $staff->birthday = date('Y-m-d H:i:s',strtotime($request->birthday));
        $staff->save();
        
        $address = $staff->address;
        $address->address = $request->address;
        $address->address_tow = $request->address_tow;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->save();
             
        if($request->hasFile('path')) 
        {
            $picture = $staff->picture;
            $picture->name = time().'.'.$request->file('path')->extension();
            $picture->tag = "staff";
            $picture->path = $request->path->store('images/staff', 'public');
            $picture->extension = $request->path->extension();
            $picture->save();
        }
        

        foreach($request->numbers as $key => $number)
        {
            if($number != null)
            {
               
                $phone = Phone::find($request->phone_id[$key]);
                $phone->number = $number;
                $phone->type = "phone";
                $phone->country_id = $request->code_country[$key];
                $phone->save();
            }
        }

        if($request->fax_number)
        {
            
            $phone = Phone::find($request->fax_id);
            $phone->number = $request->fax_number;
            $phone->type = "fix";
            $phone->country_id = $request->code_country[2];
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
    public function destroy($staff)
    {
        $staff = Staff::where('name', $staff)->first();
        $staff->delete();
        return redirect('staff');
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
}
