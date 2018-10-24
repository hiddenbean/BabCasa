<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Staff;
use App\Country;
use App\Address;
use App\Picture;
use App\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class StaffRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new staff register controller instance.
     * Call te auth middleware and specify the staff guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:staff,name',
            'email' => 'required|unique:staff,email',
            'password' => 'required|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender_id' => 'required',
            'profile_id' => 'required',
        ]);
    }

    /**
     * log out the authenticated users with different guard from the application.
     * Valid a registration request.
     * Create a new staff.
     * Attempt to log in the the created staff.
     * If true redirect to the staff's add details form.
     * If false Redirect to the previous page.
     * 
     * @param  \Illuminate\Http\Request.
     * @return \Illuminate\Http\Response.
     */
    protected function store(Request $request)
    {
        $this->validateRequest($request);

        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $PictureController = new PictureController();
        $PictureController->validateRequest($request);
        
        $PhoneController = new PhoneController();
        $PhoneController->validateRequest($request);

        $password = bcrypt($request->password);
        $name = $request->name;
        while(Staff::where('name', $request->name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $staff = Staff::create([
            'name' => $name,
            'email' =>  $request->email,
            'password' => $password,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => date('Y-m-d H:i:s',strtotime($request->birthday)),
            'gender_id' => $request->gender_id,
            'profile_id' => $request->profile_id,
            ]);

            $adress = new Address();
            $adress->address = $request->address;
            $adress->address_two = $request->address_two;
            $adress->full_name = $request->full_name;
            $adress->zip_code = $request->zip_code;
            $adress->country_id = $request->country_id;
            $adress->city = $request->city;
            $adress->addressable_type = 'staff';
            $adress->addressable_id = $staff->id;
            $adress->save();
             

        if($request->hasFile('path')) 
        {
            $picture = Picture::create([
                'name' =>  time().'.'.$request->file('path')->extension(),
                'tag' => "staff_avatar",
                'path' => $request->file('path')->store('images/staffs', 'public'),
                'extension' => $request->file('path')->extension(),
                'pictureable_type' => 'staff',
                'pictureable_id' => $staff->id,
            ]);
        }
        

        foreach($request->numbers as $key => $number)
        {
            if($number != null)
            {
                
                $phone = new Phone();
                $phone->number = $number;
                $phone->type = "phone";
                $phone->country_id = $request->code_country[$key];
                $phone->phoneable_type = 'staff';
                $phone->phoneable_id = $staff->id;
                $phone->save();
            }
        }

        if($request->fax_number)
            {
                $phone = new Phone();
                $phone->number = $request->fax_number;
                $phone->type = "fax";
                $phone->country_id = $request->code_country[2];
                $phone->phoneable_type = 'staff';
                $phone->phoneable_id = $staff->id;
                $phone->save();
            }
            
        return $staff;
    }

         /**
     * 
     */
    public function storeWithRedirect(Request $request) {
        $staff = self::store($request);
        return redirect('staff/'.$staff->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $staff = self::store($request);
        return redirect('staff/create');
    }

     /**
     * log out the authenticated users with different guard from the applciation.
     * 
     * @return void
     */
    public function guardsLogout()
    {
        Auth::guard('staff')->logout();
    }

    /**
     * Return the staff's registration form
     * 
     * @return \Illuminate\Http\Response.
     */
    public function showRegisterForm()
    {
        return view('system.backoffice.staff.register');
    }
}

