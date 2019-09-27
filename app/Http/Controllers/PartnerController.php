<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Password;
use App\Guest;
use App\Staff;
use App\Status;
use App\Phone;
use App\Reason;
use App\Partner;
use App\Country;
use App\Address;
use App\Picture;
use App\Language;
use DateTime;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
use App\Notifications\NewPartner;
use App\Notifications\NewStatus;
use App\Notifications\UpdateStatus;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:partner')->only('dashboard','');
        // $this->middleware('auth:staff')->except('dashboard');
        $this->middleware('auth:staff,partner');
    }
    
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'name' => 'required|unique:partners,name',
            'email' => 'required|email|unique:partners,email',
            'admin_email' => 'required|email|unique:partners,admin_email',
            'first_name' => 'required',
            'last_name' => 'required',
            'about' => 'required',
            'taxe_id' => 'required|numeric|digits:10',
        ]);
    }

    public function dashboard(Request $request)
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
     * 
     */
    public function trash() {
        $data['partners'] = Partner::onlyTrashed()->get();
        return view('partners.backoffice.staff.trash',$data);
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

        $request['full_name'] =$request->first_name.' '.$request->last_name;
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $PictureController = new PictureController();
        $PictureController->validateRequest($request);
        
        $phone = new PhoneController();
        $phone->validateRequest($request);

        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $partner = Partner::create([
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
        $status->user_id = $partner->id;
        $status->user_type = 'partner';
        $status->staff_id = auth()->guard('staff')->user()->id;
        $status->save();

        $address = new  Address();
        $address->address = $request->address;
        $address->address_two = $request->address_two;
        $address->full_name = $request->first_name.' '.$request->last_name;
        $address->zip_code = $request->zip_code;
        $address->is_default = true;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->is_default = true;
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
                $phone->type = $key==3 ? "fax" : "phone";
                $phone->is_default =$key==0 ? true: false;
                $phone->verify = false;
                $phone->tag = $key==0 ? 'admin': 'company';
                $phone->country_id = $request->code_country[$key];
                $phone->phoneable_type = 'partner';
                $phone->phoneable_id = $partner->id;
                $phone->save();
            }
        }
        
        $token = Password::getRepository()->create($partner);
        $partner->sendPasswordResetNotification($token);
        $partner->notify(new NewPartner());
            
        return $partner;
    }

        /**
     * 
     */
    public function storeWithRedirect(Request $request) {
        $partner = self::store($request);
        return redirect('affiliates/'.$partner->name);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $partner = self::store($request);
        return redirect('affiliates/create');
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
        $data['partner'] = Partner::withTrashed()->where('name',$partner)->first();
        $activities = $data['partner']->logs
        ->where('created_at','>=' ,date('Y-m-d h:i:s',strtotime("-1 week") ))
        ->groupBy(function($item){return $item->created_at->format('d-M-y');});
        $data['activities'] = [];
        foreach($activities as $key => $activitys)
        {
            $data['activities'][$key]= $activitys->sortByDesc('created_at');
        }

        krsort($data['activities']);
        return view('partners.backoffice.staff.show',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function orders($partner)
    {
        $data['partner'] = Partner::where('name',$partner)->first();
        $data['orders'] = $data['partner']->orders;
        return view('partners.backoffice.staff.orders',$data);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function products($partner)
    {
        $data['partner'] = Partner::where('name',$partner)->first();

        $data['products'] =  $data['partner']->products;
        return view('partners.backoffice.staff.products',$data);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function discounts($partner)
    {
        $data['partner'] = Partner::where('name',$partner)->first();
        //return 'still work on ';
        $data['discounts'] = $data['partner']->discounts;
        return view('partners.backoffice.staff.discounts',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function bills($partner)
    {
        $data['partner'] = Partner::where('name',$partner)->first();

        // $data['bills'] = $data['partner']->bills;
        return view('partners.backoffice.staff.bills',$data);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function statuses($partner)
    {
        $data['partner'] = Partner::where('name',$partner)->first();

        $data['statuses'] = $data['partner']->statuses;
        return view('partners.backoffice.staff.statuses',$data);
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
        $data['company_phones'] =  $data['partner']->phones()->where('tag','=','company')->get();
        $data['company_fax'] =  $data['partner']->phones()->where('tag','=','fax')->first();
        return view('partners.backoffice.staff.edit',$data);

    }
    public function account()
    {
        $data['countries'] = Country::all();
        $data['partner'] = Auth::guard('partner')->user();
        $data['company_phones'] =  $data['partner']->phones()->where('tag','=','company')->get();
        $data['company_fax'] =  $data['partner']->phones()->where('tag','=','fax')->first();
        return view('system.backoffice.partner.account',$data);

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
        $name = auth()->guard('partner')->check() ?  Auth::guard('partner')->user()->name : $partner;
        $partner = partner::where('name', $name)->first();
        $request->validate([
            'company_name' => 'required|unique:partners,company_name,'.$partner->id,
            'name' => 'required|unique:partners,name,'.$partner->id,
            'email' => 'required|email|unique:partners,email,'.$partner->id,
            'admin_email' => 'required|email|unique:partners,admin_email,'.$partner->id ,
            'first_name' => 'required',
            'last_name' => 'required',
            'about' => 'required',
            'taxe_id' => 'required|numeric|digits:10',
        ]);
        
        $request['full_name'] =$request->first_name.' '.$request->last_name;;
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'numbers.1' => 'required|numeric|unique:phones,number,'.$request->phone_id[1],
            'numbers.2' => 'nullable|numeric|unique:phones,number,'.$request->phone_id[2],
            'numbers.3' => 'nullable|numeric|unique:phones,number,'.$request->phone_id[3],
            'code_country.0' => 'required',
            'code_country.1' => 'nullable',
            'code_country.2' => 'nullable',
            'code_country.3' => 'nullable',
            ]);   
            $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
            
            $partner->name = $request->name;
            $partner->company_name = $request->company_name;
            $partner->about = $request->about;
            $partner->email = $request->email;
            $partner->first_name =  $request->first_name;
            $partner->last_name =  $request->last_name;
            $partner->admin_email =  $request->admin_email;
            $partner->is_register_to_newsletter = $is_register_to_newsletter;
            $partner->taxe_id = $request->taxe_id;
            $partner->save();

            $address = $partner->address;
            $address->address = $request->address;
            $address->address_two = $request->address_two;
            $address->full_name = $request->full_name;
            $address->zip_code = $request->zip_code;
            $address->country_id = $request->country_id;
            $address->city = $request->city;
            $address->save();
            
            if($request->hasFile('path')) 
            {
                $picture = $partner->picture;
                $picture->name = time().'.'.$request->file('path')->extension();
                $picture->tag = "partner_avatar";
                $picture->path = $request->path->store('images/partners', 'public');
                $picture->extension = $request->path->extension();
                $picture->save();
            }
            
        foreach($request->numbers as $key => $number)
        {
            if($number != null)
            {
                $phone = Phone::where('id', $request->phone_id[$key])
                                                                ->whereIn('type', ['phone', 'fix'])
                                                                ->where('phoneable_id', $partner->id)
                                                                ->first();
                if($phone == null)
                {
                    $phone = new Phone();
                    $phone->phoneable_id = $partner->id;
                    $phone->phoneable_type = 'partner';
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
        if(Auth::guard('partner')->id() == $partner->id)
        {
            $status = new Status();
            $status->is_approved = 2;
            $status->user_id = $partner->id;
            $status->user_type = 'partner';
            $status->staff_id = $this->staffTarget()->id;
            $status->save();

            $data['causer']=['id'=>$partner->id, 'type'=>'partner'];
            $data['link'] = 'http://staff.babcasa.com/fr/affiliates/'.$partner->name;
            $this->staffTarget()->notify(new UpdateStatus($data));

            $page = 'account';  
        }
        else 
        {

            $page ='affiliates';  
        }
        return redirect($page);
    }
    
    public function staffTarget()
    {
        $minStaff=Staff::first();
        $min =  $minStaff->statuses->where('is_approved',2)->count();
        foreach(Staff::all() as $staff)
        {
            if($staff->permission('request') && $staff->statuses->where('is_approved',2)->count() < $min)
            {
                $min = $staff->statuses->where('is_approved',2)->count();
                $minStaff = $staff;
            } 

        }
        return $minStaff;
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($Partner)
    {
        $partner = Partner::findOrFail($Partner);
        if(
            isset($partner->claims[0])
            || isset($partner->orders()->whereIn('status', ['in_progress', 'waiting'])->first()->id)
            || isset($partner->products[0])
        )
        {
            $messages['error'] = 'partner can\'t be deleted he is in an association with product/claim/order !!';
            return redirect('affiliates')->with('messages',$messages);
        }
        $partner->delete();
        $messages['success'] = 'partner has been deleted successfuly !!';
        return redirect('affiliates')->with('messages',$messages);

    }
     /**
     *
     * 
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'affiliates' => 'required',
            ]);
        $e=$s=0;
        $messages = [];
        
        foreach($request->affiliates as $Affiliate)
        {
            $affiliate = Partner::findOrFail($Affiliate);
    
            if(
                !isset($affiliate->claims[0])
                && !isset($affiliate->orders()->whereIn('status', ['in_progress', 'waiting'])->first()->id)
                && !isset($affiliate->products[0])
            ) 
            {
                $s++;
                $affiliate->delete();
                $messages['success'] = $s. ($s == 1 ? ' affiliate' :' affiliates') .' has been deleted successfuly';
            }
    
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' affiliate' : ' affiliates') . ' can\'t be deleted he has product/claim/order';
            }
        }
        return redirect('affiliates')->with('messages', $messages);
    }

     /**
     * 
     * 
     */
    public function restore($Partner)
    {
        $partner = Partner::onlyTrashed()->findOrFail($Partner);
        $partner->restore();
        $messages['success'] = 'partner has been restored successfuly !!';
        return redirect('affiliates')->with('messages',$messages);
    }
    /**
     * 
     */
    public function multiRestore(Request $request)
    {
        $request->validate([
            'affiliates' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->affiliates as  $affiliate)
        {
            $affiliate = Partner::onlyTrashed()->where('id', $affiliate)->first();
            $affiliate->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' affiliate' :' affiliates') .' has been restored successfuly';
        }
        return redirect('affiliates')->with('messages',$messages);
    }

   
    public function stuckPartner($partner)
    {
        $orderStatus = $partner->orders()->whereIn('status', ['in_progress', 'finished'])->get();
        //$marketStatus = $partner->markets()->whereIn('status', ['in_progress', 'finished'])->get();
        $stuck = isset($orderStatus[0]) ? true : false;
        return $stuck;
    }


    public function redirectURL($url, $partner)
    {
        $destroy_url = str_after($url, '/'.$partner);
        if($destroy_url == '/desactivate')
        {
            return str_before($url, $partner).''.$partner.'/security';
        }
        return str_before($url, '/'.$partner);
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
    public function disapprove($Partner,$reason)
    {
        $partner = Partner::findOrFail($Partner);

        $status = new Status();
        $status->user_id = $partner->id;
        $status->user_type = 'partner';
        $status->staff_id = auth()->guard('staff')->user()->id;
        if($reason != 0)
        {
            $status->is_approved =0;
            $status->save();
            $Reason = Reason::findOrFail($reason);
            $status->reasons()->attach($Reason->id);

        }else
        {
            $status->is_approved = 1;
            $status->save();
        }

        $data['causer']=['id'=>auth()->guard('staff')->user()->id, 'type'=>'staff'];
        $data['link'] = 'http://partner.babcasa.com/account';
        $partner->notify(new UpdateStatus($data));
        return redirect()->back();
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

    public function reset(Request $request, $partner)
    {
        $password_communicated = ($request->password_communicated=='on') ? 1 : 0;
        if($password_communicated)
        {
            $password = Hash::make($request->password);
            $partner =Partner::where('name', $partner)->first();
            if($partner)
            {
                $partner->password = $password;
                $partner->save();
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

    public function sendResetLinkEmail($partner) {
        $partner = Partner::where('name', $partner)->first();
        $token = Password::getRepository()->create($partner);

        $partner->sendPasswordResetNotification($token);

        $messages['success'] = 'Password reset has been sent successfuly !!';

        return back()->with('messages', $messages);
    }
}



