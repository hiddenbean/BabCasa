<?php

namespace App\Http\Controllers;

use App;
use App\Staff;
use App\Profile;
use App\Language;
use App\Adress;
use App\Phone;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:staff');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:staff,name',
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
        // $id = Auth::guard('staff')->user()->id;
        $data['staffs'] = Staff::where('id','!=',0)->get();
        return view('staff.backoffice.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['profiles'] = Profile::all();
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

        }


        // $phone->phone = $request->phone;
        // $phone->phone_tow = $request->phone_tow;
        // $phone->fax = $request->fax;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($staff)
    {
        $data['staff'] = Staff::where('name',$staff);
        return $data;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($staff)
    {

        $data['staff'] = Staff::where('name',$staff);

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
        $this->validateRequest($request);

        // Auth::guard('staff')->user()->id
        $staff = Staff::where('name',$staff);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->gender = $request->gender;
        $staff->birthday = $request->birthday;
        $staff->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($staff)
    {
        $staff = Staff::findOrFail($staff);
        $staff->delete();
        return redirect('staffs');
    }
}
