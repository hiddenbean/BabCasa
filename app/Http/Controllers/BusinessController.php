<?php

namespace App\Http\Controllers;

use App\Business;
use App\Country;
use App\Phone;
use Hash;
use Password;
use App\Address;
use App\Picture;
use App\Status;
use App\Reason;
use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;

use App\Notifications\NewBusiness;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff,business');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['businesses'] = Business::all();
        return view('businesses.backoffice.staff.index',$data);
    }

    /**
     * Display a trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data['businesses'] = Business::onlyTrashed()->get();
        return view('businesses.backoffice.staff.trash',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('businesses.backoffice.staff.create', $data);
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

        $request['full_name'] =$request->first_name.' '.$request->last_name;
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $PictureController = new PictureController();
        $PictureController->validateRequest($request);
        
        $phone = new PhoneController();
        $phone->validateRequest($request);

        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $business = Business::create([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'company_name' => $request->company_name,
            'name' => $request->name,
            'password' => bcrypt(str_random(8)),
            'email' =>  $request->email,
            'admin_email' =>  $request->admin_email,
            'about' => $request->about,
            'is_register_to_newsletter' => $is_register_to_newsletter,
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
        $address->full_name = $request->first_name.' '.$request->last_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->is_default = true;
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
                $phone->type = $key==3 ? "fax" : "phone";
                $phone->is_default =$key==0 ? true: false;
                $phone->verify = false;
                $phone->tag = $key==0 ? 'admin': 'company';
                $phone->country_id = $request->code_country[$key];
                $phone->phoneable_type = 'business';
                $phone->phoneable_id = $business->id;
                $phone->save();
            }
        }
        
        $business->notify(new NewBusiness());
            
            return $business;
    }

    public function storeWithRedirect(Request $request) {
        // return $request;
        $business = self::store($request);
        return redirect('businesses/'.$business->name);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $business = self::store($request);
        return redirect('businesses/create');
    }

    public function validateRequest(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'name' => 'required|unique:businesses,name',
            'email' => 'required|email|unique:businesses,email',
            'admin_email' => 'required|email|unique:businesses,admin_email',
            'first_name' => 'required',
            'last_name' => 'required',
            'about' => 'required',
            'taxe_id' => 'required|numeric|digits:10',
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
        $data['business'] = Business::withTrashed()->where('name',$business)->first();
        $activities = $data['business']->logs
                                            ->where('created_at','>=' ,date('Y-m-d h:i:s',strtotime("-1 week") ))
                                            ->groupBy(function($item){return $item->created_at->format('d-M-y');});

        $data['activities'] = [];
        foreach($activities as $key => $activitys)
        {
            $data['activities'][$key]= $activitys->sortByDesc('created_at');
        }

        krsort($data['activities']);
        return view('businesses.backoffice.staff.show',$data);
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
        $data['company_phones'] =  $data['business']->phones()->where('tag','=','company')->get();
        $data['company_fax'] =  $data['business']->phones()->where('tag','=','fax')->first();
        return view('businesses.backoffice.staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Business)
    {
        $business = Business::where('name', $Business)->first();
        $request->validate([
            'company_name' => 'required|unique:businesses,company_name,'.$business->id,
            'name' => 'required|unique:businesses,name,'.$business->id,
            'email' => 'required|email|unique:businesses,email,'.$business->id,
            'admin_email' => 'required|email|unique:businesses,admin_email,'.$business->id ,
            'first_name' => 'required',
            'last_name' => 'required',
            'about' => 'required',
            'taxe_id' => 'required|numeric|digits:10',
        ]);
        
        $request['full_name'] =$request->first_name.' '.$request->last_name;
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'numbers.1' => 'nullable|numeric|unique:phones,number,'.$request->phone_id[1],
            'code_country.0' => 'required',
            'code_country.1' => 'nullable',
            'code_country.2' => 'nullable',
        ]);   
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;

        $business->company_name = $request->company_name;
        $business->about = $request->about;
        $business->email = $request->email;
        $business->first_name =  $request->first_name;
        $business->last_name =  $request->last_name;
        $business->admin_email =  $request->admin_email;
        $business->is_register_to_newsletter = $is_register_to_newsletter;
        $business->taxe_id = $request->taxe_id;
        $business->save();
        
        $status = new Status();
        $status->is_approved = 2;
        $status->user_id = $business->id;
        $status->user_type = 'business';
        $status->staff_id = auth()->guard('staff')->user()->id;
        $status->save();
        
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
                        $phone->tag = $key==0 ? 'admin':  $key==3 ? 'fax' : 'company';
                        $phone->type = $key==3 ? "fax" : "phone";
                        $phone->is_default =$key==1||$key==0 ? true: false;
                        $phone->verify = false;

                    }
                $phone->number = $number;
                $phone->country_id = $request->code_country[$key];
            
                $phone->save();
                }
            }
        }

            
        return redirect('businesses');
    }
    
    public function disapprove($business,$reason)
    {
        $status = new Status();
        $status->user_id = $business;
        $status->user_type = 'business';
        $status->staff_id = auth()->guard('staff')->user()->id;
        if($reason != 0)
        {
            $status->is_approved =0;
            $status->save();
            $Reason = Reason::findOrFail($reason);
            $status->reasons()->attach($Reason->id);

        }else
        {
            $status->is_approved =1;
            $status->save();
        }
       
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($Business)
    {
        $business = Business::findOrFail($Business);
        if(
            isset($business->claims[0])
            || isset($business->orders()->whereIn('status', ['in_progress', 'waiting'])->first()->id)
            || isset($business->products[0])
        )
        {
            $messages['error'] = 'business can\'t be deleted he is in an association with product/claim/order !!';
            return redirect('businesses')->with('messages',$messages);
        }
        $business->delete();
        $messages['success'] = 'business has been deleted successfuly !!';
        return redirect('businesses')->with('messages',$messages);

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
        $request->validate([
            'businesses' => 'required',
            ]);
        $e=$s=0;
        $messages = [];
        
        foreach($request->businesses as $Business)
        {
            $business = Business::findOrFail($Business);
    
            if(
                !isset($business->claims[0])
                && !isset($business->orders()->whereIn('status', ['in_progress', 'waiting'])->first()->id)
                && !isset($business->products[0])
            ) 
            {
                $s++;
                $business->delete();
                $messages['success'] = $s. ($s == 1 ? ' business' :' businesses') .' has been deleted successfuly';
            }
    
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' business' : ' businesses') . ' can\'t be deleted he has product/claim/order';
            }
        }
        return redirect('businesses')->with('messages', $messages);
    }

     /**
     * 
     * 
     */
    public function restore($business)
    {
        $business = business::onlyTrashed()->findOrFail($business);
        $business->restore();
        $messages['success'] = 'business has been restored successfuly !!';
        return redirect('businesses')->with('messages',$messages);
    }
    /**
     * 
     */
    public function multiRestore(Request $request)
    {
        $request->validate([
            'businesses' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->businesses as  $business)
        {
            $business = business::onlyTrashed()->where('id', $business)->first();
            $business->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' business' :' businesses') .' has been restored successfuly';
        }
        return redirect('businesses')->with('messages',$messages);
    }
    public function reset(Request $request, $business)
    {
        $password_communicated = ($request->password_communicated=='on') ? 1 : 0;
        if($password_communicated)
        {
            $password = Hash::make($request->password);
            $business =Business::where('name', $business)->first();
            if($business)
            {
                $business->password = $password;
                $business->save();
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
    public function sendResetLinkEmail($business) {
        $business = Business::where('name', $business)->first();
        $token = Password::getRepository()->create($business);

        $business->sendPasswordResetNotification($token);

        $messages['success'] = 'Password reset has been sent successfuly !!';

        return back()->with('messages', $messages);
    }
}
