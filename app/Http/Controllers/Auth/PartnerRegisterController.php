<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Phone;
use App\Partner;
use App\Country;
use App\Address;
use App\Picture;
use App\Status;
use Illuminate\Http\Request;
use App\Notifications\PartnerNotification;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class PartnerRegisterController extends Controller
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
     * Create a new partner register controller instance.
     * Call te auth middleware and specify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:partner');
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
            'name' => 'required|unique:partners,name',
            'email' => 'required|unique:partners,email',
            'password' => 'required|min:6|confirmed',
            'company_name' => 'required',
            'trade_registry' => 'required',
            'ice' => 'required',
            'taxe_id' => 'required',
            'about' => 'required',
            'agreement' => 'required',
        ]);
    }

    /**
     * log out the authenticated users with different guard from the application.
     * Valid a registration request.
     * Create a new partner.
     * Attempt to log in the the created partner.
     * If true redirect to the partner's add details form.
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

        $phone = new PhoneController();
        $phone->validateRequest($request);
               
        
        $password = bcrypt($request->password);
        $name = $request->company_name;
        while(Partner::where('name', $request->company_name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $partner = Partner::create([
            'company_name' => $request->company_name,
            'name' => $name,
            'email' =>  $request->email,
            'password' => $password,
            'about' => $request->about,
            'trade_registry' => $request->trade_registry,
            'is_register_to_newsletter' => $is_register_to_newsletter,
            'ice' => $request->ice,
            'taxe_id' => $request->tax_id,
        ]);
            
        $partner->notify(new PartnerNotification($partner));

        $status = new Status();
        $status->is_approved = 0;
        $status->user_id = $partner->id;
        $status->user_type = 'partner';
        $status->staff_id = 1;//auth()->guard('staff')->user()->id;
        $status->save();

        $address = new  Address();
        $address->address = $request->address;
        $address->address_two = $request->address_two;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->addressable_type = 'partner';
        $address->addressable_id = $partner->id;
        $address->save();
            

        if($request->hasFile('path')) 
        {
            $picture = Picture::create([
                'name' => $request->company_name,
                'tag' => "partner_avatar",
                'path' => $request->file('path')->store('images/partners', 'public'),
                'extension' => $request->file('path')->extension(),
                'pictureable_type' => 'partner',
                'pictureable_id' => $partner->id,
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
                $phone->phoneable_type = 'partner';
                $phone->phoneable_id = $partner->id;
                $phone->save();
            }
        }

        if($request->fax_number)
            {

                $phone = new Phone();
                $phone->number = $request->fax_number;
                $phone->type = "fix";
                $phone->country_id = $request->code_country[2];
                $phone->phoneable_type = 'partner';
                $phone->phoneable_id = $partner->id;
                $phone->save();
            }  
            
        $this->guardsLogout();
        auth()->guard('partner')->login($partner);
        return redirect('/');
    }

     /**
     * log out the authenticated users with different guard from the applciation.
     * 
     * @return void
     */
    public function guardsLogout()
    {
        Auth::guard('partner')->logout();
    }

    /**
     * Return the partner's registration form
     * 
     * @return \Illuminate\Http\Response.
     */
    public function showRegisterForm()
    {
        $data['countries'] = Country::all();
        return view('system.backoffice.partner.register',$data);
    }
}

