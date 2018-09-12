<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Partner;
use App\Guest;
use DB;
use Illuminate\Http\Request;
use Auth;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:partner,email',
            'password' => 'required|min:6|confirmed',
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $password = bcrypt($request->password);
        $name = str_before($request->email, '@');
        while(PartnerAccount::where('name', $name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($partner)
    {
        $data['partner'] = Partner::findOrfail($partner);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        isset($request->partner) ? $partner = $request->partner : $partner = auth()->guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        return view('system.backoffice.partner.settings',[
            'partner' => $partner,
        ]);
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
            'name' => 'required|sometimes',
            'email' => 'required',
            'company_name' => 'required|sometimes',
            'trade_registry' => 'required|numeric',
            'ice' => 'required|numeric',
            'about' => 'nullable',
            ]);
            
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);

        // $PhoneController = new PhoneController();
        // $PhoneController->validateRequest($request);

        $request->validate([
            'number.0' => 'required|numeric',
            'number.1' => 'nullable|numeric',
            'number.2' => 'nullable|numeric',
            'code_country.0' => 'required',
            'code_country.1' => 'nullable',
            'code_country.2' => 'nullable',
        ]);
        
        isset($request->partner) ? $partner = $request->partner : $partner = auth()->guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        // La modification des infos de parteanire
        $partner->company_name  =  $request->input('company_name');
        if($request->input('name') != $partner->name)
        {
            $reqeust->validate([
                'name' => 'unique:partners,name',
            ]);
            $partner->name  =  $request->input('name');
        }

        if($request->input('email') != $partner->email)
        {
            $request->validate([
                'email' => 'unique:partners,email',
            ]);
            $partner->email  =  $request->input('email');
        }
        
        $partner->trade_registry  =  $request->input('trade_registry');
        $partner->ice  =  $request->input('ice');
        $partner->about  =  $request->input('about');
        $partner->save();

        if($request->hasFile('path')) 
        {
            $picture = $partner->picture;
            $picture->path = $request->file('path')->store('images/partners', 'public');
            $picture->extension = $request->file('path')->extension();
            $picture->save();
        }

        foreach($request->number as $key => $phone_number)
        {
            if($phone_number == null && isset($request->id[$key]))
            {
                $phone = Phone::find($request->id[$key]);
                $phone->delete();
            }
            else if($phone_number != null)
            {
                if($request->id[$key])
                {
                    $phone = Phone::find($request->id[$key]);
                    $phone->number = $phone_number;
                    $phone->save();
                }
                else
                {
                    $phone = Phone::withTrashed()->where('number', $phone_number)->first();
                    if($phone)
                    {
                        $phone->restore();
                    }
                    else
                    {
                        $phone = Phone::create([
                            'number' => $phone_number,
                            'type' => $request->type[$key],
                            'code_country_id' => $request->code_country[$key],
                            'phoneable_type' => 'partner',
                            'phoneable_id' => $partner->id,
                        ]);
                    }
                }
            }
        }
        // La modificatuin des adresses
        $address = $partner->address;
        $address->country = $request->input('country');
        $address->city = $request->input('city');
        $address->address = $request->input('address');
        $address->address_two = $request->input('address_two');
        $address->full_name = $request->input('full_name');
        $address->zip_code = $request->input('zip_code');
        $partner->address->save();
        return back()->with('partner', $partner);
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



