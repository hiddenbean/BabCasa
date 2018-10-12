<?php

namespace App\Http\Controllers;

use App\Business;
use App\Country;
use App\Phone;
use App\Address;
use App\Picture;
use App\Status;
use App\Reason;
use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::all();
        return view('business_clients.backoffice.staff.index', ['businesses' => $businesses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('business_clients.backoffice.staff.create',$data);
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
        
        $phone = new PhoneController();
        $phone->validateRequest($request);
        
        $password = bcrypt($request->password);
        $name = $request->company_name;
        while(Business::where('name', $request->company_name)->first()){
            $name = $name.'_'.rand(0,9);
        }

        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;

        $business = Business::create([
            'company_name' => $request->company_name,
            'name' => $name,
            'email' =>  $request->email,
            'password' => $password,
            'about' => $request->about,
            'trade_registry' => $request->trade_registry,
            'is_register_to_newsletter' => $is_register_to_newsletter,
            'ice' => $request->ice,
            'taxe_id' => $request->taxe_id,
            ]);

        $approve = ($request->approve =='on') ? 1 : 0;

        $status = new Status();
        $status->is_approved = $approve;
        $status->user_id = $business->id;
        $status->user_type = 'business';
        $status->staff_id = auth()->guard('staff')->user()->id;
        $status->save();

        $address = new  Address();
        $address->address = $request->address;
        $address->address_two = $request->address_two;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->addressable_type = 'business';
        $address->addressable_id = $business->id;
        $address->save();

        if($request->hasFile('path')) 
        {
            $picture = Picture::create([
                'name' => $request->company_name,
                'tag' => "business_avatar",
                'path' => $request->file('path')->store('images/businesses', 'public'),
                'extension' => $request->file('path')->extension(),
                'pictureable_type' => 'business',
                'pictureable_id' => $business->id,
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
                $phone->phoneable_type = 'business';
                $phone->phoneable_id = $business->id;
                $phone->save();
            }
        }

        if($request->fax_number)
        {

            $phone = new Phone();
            $phone->number = $request->fax_number;
            $phone->type = "fix";
            $phone->country_id = $request->code_country[2];
            $phone->phoneable_type = 'business';
            $phone->phoneable_id = $business->id;
            $phone->save();
        } 
        return redirect('clients/business');

    }

    public function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:businesses,name',
            'company_name' => 'required',
            'email' => 'required|unique:businesses,email',
            'password' => 'required',
            'about' => 'required',
            'trade_registry' => 'required|numeric|digits:6',
            'ice' => 'required|numeric|digits:10',
            'taxe_id' => 'required|numeric|digits:10',
            'register_to_newsletter' => 'required',
            'approve' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show($business)
    {
        $data['countries'] = Country::all();
        $data['reasons'] = Reason::all();
        $data['business'] = Business::where('name',$business)->first();
        return view('business_clients.backoffice.staff.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit($business)
    {
        $data['countries'] = Country::all();
        $data['business'] = Business::where('name',$business)->first();
        return view('business_clients.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $business)
    {
        $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'about' => 'required',
            'trade_registry' => 'required|numeric|digits:6',
            'ice' => 'required|numeric|digits:10',
            'taxe_id' => 'required|numeric|digits:10',
        ]);
        
        
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $request->validate([
            'numbers.0' => 'required|numeric|digits:9',
            'numbers.1' => 'nullable|numeric|digits:9',
            'fax_number' => 'nullable|numeric|digits:9',
            'code_country.0' => 'sometimes',
            'code_country.1' => 'sometimes',
            'code_country.2' => 'sometimes',
        ]);
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $business = Business::where('name', $business)->first();
        $business->company_name = $request->company_name;
        $business->about = $request->about;
        $business->email = $request->email;
        $business->trade_registry = $request->trade_registry;
        $business->is_register_to_newsletter = $is_register_to_newsletter;
        $business->ice = $request->ice;
        $business->taxe_id = $request->taxe_id;
        if($request->email != $business->email)
        {
            $request->validate([
                'email' => 'unique:business,name',
            ]);
            $business->email = $request->email;
        }
        $business->save();
        $status = $business->status->first()->is_approved;
        $approve = ($request->approve=='on') ? 1 : 0;
        if($status != $approve)
        {
            $status = new Status();
            $status->is_approved = $approve;
            $status->user_id = $business->id;
            $status->user_type = 'business';
            $status->staff_id = auth()->guard('staff')->user()->id;
            $status->save();
        }

        $address = $business->address;
        $address->address = $request->address;
        $address->address_two = $request->address_two;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->save();

        if($request->hasFile('path')) 
        {
            $picture = $business->picture;
            $picture->name = time().'.'.$request->file('path')->extension();
            $picture->tag = "business_avatar";
            $picture->path = $request->path->store('images/businesses', 'public');
            $picture->extension = $request->path->extension();
            $picture->save();
        }
        
        foreach($request->numbers as $key => $number)
        {
            if($number != null)
            {
                $phone = Phone::where('id', $request->phone_id[$key])
                                                                ->whereIn('type', ['phone', 'fix'])
                                                                ->where('phoneable_id', $business->id)
                                                                ->first();
                if($phone == null)
                {
                    $phone = new Phone();
                    $phone->phoneable_id = $business->id;
                    $phone->phoneable_type = 'business';
                }
                $phone->number = $number;
                $phone->type = "phone";
                $phone->country_id = $request->code_country[$key];
                $phone->save();
            }
        }

        if($request->fax_number)
        {
            $fax = Phone::where('id', $request->fax_id)
                                ->where('type', 'fax')
                                ->where('phoneable_id', $business->id)
                                ->first();
            if($fax == null)
            {
                $fax = new Phone();
                $phone->phoneable_id = $business->id;
                $phone->phoneable_type = 'business';
            }
            $phone = Phone::find($request->fax_id);
            $phone->number = $request->fax_number;
            $phone->type = "fix";
            $phone->country_id = $request->code_country[2];
            $phone->save();
        }

        return redirect('/clients/business');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($business_name)
    {
        $business = Business::where('name', $business_name)->first();
        if(!isset($business))
        {
            
            return redirect()
                            ->back()
                            ->with(
                                'error',
                                'Delete can\'t be performed !!'
                            );
        }
       
        if($this->stuckBusiness($business))
        {
            return redirect()
                            ->back()
                            ->with(
                                'error',
                                'Business can\'t be deleted it has unsolved orders/markets !!'
                            );
        }
        $business->delete();
        return redirect($this
                            ->redirectURL(url()
                            ->current(), 
                        $business_name))
                                ->with(
                                    'success',
                                    'Business has been deleted successfuly !!'
                                );
    }

    public function stuckBusiness($business)
    {
        $orderStatus = $business->orders()->whereIn('status', ['in_progress', 'finished'])->get();
        //$marketStatus = $business->markets()->whereIn('status', ['in_progress', 'finished'])->get();
        isset($orderStatus[0]) ? $stuck = true : $stuck = false;
        return $stuck;
    }

    public function redirectURL($url, $business)
    {
        $destroy_url = str_after($url, '/'.$business);
        if($destroy_url == '/desactivate')
        {
            return str_before($url, $business).''.$business.'/security';
        }
        return str_before($url, '/'.$business);
    }

    public function multiDestroy(Request $request)
    {
        foreach($request->businesses as $business)
        {
            $business = Business::where('name', $business)->first();
            if($this->stuckBusiness($business))
            {
                $business->delete();
            }
        }
        return redirect('clients/business');
    }
}
