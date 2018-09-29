<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Guest;
use App\Phone;
use App\Reason;
use App\Partner;
use App\Country;
use App\Address;
use App\Picture;
use App\Language;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function __construct()
    {
         //$this->middleware('auth:staff');
    }
    
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'company_name' => 'required|unique:partners,company_name',
            'name' => 'required|unique:partners,name',
            'email' => 'required|email|unique:partners,email',
            'password' => 'required|min:6',
            'about' => 'required',
            'trade_registry' => 'required',
            'ice' => 'required',
            'taxe_id' => 'required',
        ]);
    }

    public function dashboard()
    {
        return view('system.backoffice.partner.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partners'] = Partner::all();
        return view('partners.backoffice.staff.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('partners.backoffice.staff.create',$data);
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
        
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $PictureController = new PictureController();
        $PictureController->validateRequest($request);
        
              
        
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
            $status = new Status();
            $status->is_approved = 1;
            $status->partner_id = $partner->id;
            $status->staff_id = auth()->guard('staff')->user()->id;
            $status->save();

            $address = new  Address();
            $address->address = $request->address;
            $address->address_tow = $request->address_tow;
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
            
            return redirect('partners');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($partner)
    {
        $data['reasons'] = Reason::all();
        $data['partner'] = Partner::where('name',$partner)->first();
        // return $data['partner']->status->first()->is_approved;
        return view('partners.backoffice.staff.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($partner)
    {
        $data['countries'] = Country::all();
        $data['partner'] = Partner::where('name',$partner)->first();
        return view('partners.backoffice.staff.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $partner)
    {
        $request->validate([
            'company_name' => 'required|unique:partners,company_name,'.$partner,
            'email' => 'required|email|unique:partners,email,'.$partner,
            'about' => 'required',
            'trade_registry' => 'required',
            'ice' => 'required',
            'taxe_id' => 'required',
        ]);
        
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'numbers.1' => 'sometimes|numeric|unique:phones,number,'.$request->phone_id[1],
            'code_country.0' => 'required',
            'code_country.1' => 'required',
        ]);      
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;

        $partner = partner::find($partner);
        $partner->company_name = $request->company_name;
        $partner->about = $request->about;
        $partner->email = $request->email;
        $partner->trade_registry = $request->trade_registry;
        $partner->is_register_to_newsletter = $is_register_to_newsletter;
        $partner->ice = $request->ice;
        $partner->taxe_id = $request->taxe_id;
        $partner->save();
        
        $address = $partner->address;
        $address->address = $request->address;
        $address->address_tow = $request->address_tow;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->save();
             
        if($request->hasFile('path')) 
        {
            $picture = $partner->picture;
            $picture->name = time().'.'.$request->file('path')->extension();
            $picture->tag = "partner";
            $picture->path = $request->path->store('images/partner', 'public');
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
            
        return redirect('partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($partner)
    {
        if(Auth::guard('partner')->user()->id != $partner) return;
        $partner = Partner::findOrfail($partner);
        $partner->delete();
        return redirect()->back();
    }

    /**
     * Show all open sessions for the account.
     * Option to change password and to desable the account.
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        isset($request->partner) ? $partner = $request->partner : $partner = auth()->guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        $guests = Guest::some($partner->id);
        return view('system.backoffice.partner.security',[
            'partner' => $partner,
            'guests' => $guests,
        ]);
    }

    /**
     * Desable partners account.
     *
     * @param  \Iluminate\Http\Request $request
     * @param  \App\Partner  $partner
     * @param  \App\Guest  $session_id
     * @return \Illuminate\Http\Response
     */
    public function sessionDestroy(Request $request,$partner, $session_id)
    {
        DB::table('sessions')->where('id', $session_id)->delete();
        return redirect(str_before(url()->current(), '.com').'.com/security');
    }
}



