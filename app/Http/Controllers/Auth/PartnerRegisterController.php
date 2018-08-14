<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Partner;
use App\Address;
use App\Picture;
use App\Phone;
USE App\Region;
USE App\RegionPoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PartnerAccountRegisterController;
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
        // $this->middleware('guest:partner');
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
            'company_name' => 'required',
            'trade_registry' => 'required',
            'ice' => 'required',
            'taxe_id' => 'required',
            'about' => 'required',
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
        return dd($request);
        
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $PictureController = new PictureController();
        $PictureController->validateRequest($request);
        
        $PhoneController = new PhoneController();
        $PhoneController->validateRequest($request);

        

        $password = bcrypt($request->password);
        $name = $request->company_name;
        while(Partner::where('name', $company_name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $partner = Partner::create([
            'company_name' => $request->company_name,
            'name' => $name,
            'about' => $request->about,
            'trade_registry' => $request->trade_registry,
            'ice' => $request->ice,
            'tax_id' => $request->tax_id,
            ]);

        $address = Address::create([
            'address' => $request->address,
            'address_two' => $request->address_two,
            'full_name' => $request->full_name,
            'country' => $request->country,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'addressable_type' => 'partner',
            'addressable_id' => $partner->id,
        ]);

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
        

        foreach($request->number as $key => $number)
        {
            if($number != null)
            {
                $phone = Phone::create([
                    'number' => $number,
                    'type' => 'fix',
                    'code_country_id' => $request->code_country[$key],
                    'phoneable_type' => 'partner',
                    'phoneable_id' => $partner->id,
                ]);
            }
        }

        if($request->fax_number)
            {
                $phone = Phone::create([
                    'number' => $request->fax_number,
                    'type' => 'fax',
                    'code_country_id' => $request->code_country[2],
                    'phoneable_type' => 'partner',
                    'phoneable_id' => $partner->id,
                ]);
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
        return view('system.backoffice.partner.register');
    }
}

