<?php

namespace App\Http\Controllers;

use App\ParticularClient;
use App\Country;
use App\Picture;
use App\Address;
use App\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;

class ParticularClientController extends Controller
{
    public function __construct()
    {
         //$this->middleware('auth:particular_clients');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:particular_clients,name',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:particular_clients,email',
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
        $data['particularClients'] = ParticularClient::all();
        //return $data;
        return view('particular_clients.backoffice.index',$data);
    }
    
    public function dashboard()
    {
        return view('system.backoffice.particular_clients.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('particular_clients.backoffice.create',$data);
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
        
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'numbers.1' => 'sometimes|numeric|unique:phones,number,'.$request->phone_id[1],
            'code_country.0' => 'required',
            'code_country.1' => 'required',
        ]); 
          //return $request->numbers;
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $particularClient = new ParticularClient();
        $particularClient->name = $request->name;
        $particularClient->first_name = $request->first_name;
        $particularClient->last_name = $request->last_name;
        $particularClient->email = $request->email;
        $particularClient->gender_id = $request->gender;
        $particularClient->birthday = date('Y-m-d H:i:s',strtotime($request->birthday));
        $particularClient->password = bcrypt($request->password);
        $particularClient->is_register_to_newsletter = $is_register_to_newsletter;
        $particularClient->save();
        
        foreach($request->numbers as $key => $number)
        {
            if($number != null)
            {
               
                $phone = new Phone();
                $phone->number = $number;
                $phone->type = "phone";
                $phone->country_id = $request->code_country[$key];
                $phone->phoneable_type = 'particularClient';
                $phone->phoneable_id = $particularClient->id;
                $phone->save();
            }
        }

        if($request->fax_number)
        {
            
            $phone = new Phone();
            $phone->number = $request->fax_number;
            $phone->type = "fix";
            $phone->country_id = $request->code_country[2];
            $phone->phoneable_type = 'particularClient';
            $phone->phoneable_id = $particularClient->id;
            $phone->save();
        }
        

        if($request->address)
        {
            $address = new Address();
            $address->address = $request->address;
            $address->address_tow = $request->address_tow;
            $address->full_name = $request->full_name;
            $address->zip_code = $request->zip_code;
            $address->country_id = $request->country_id;
            $address->city = $request->city;
            $address->addressable_type = 'particularClient';
            $address->addressable_id = $particularClient->id;
            $address->save();
            
        }
        if($request->path)
        {
            $picture = Picture::create([
                'name' => time().'.'.$request->file('path')->extension(),
                'tag' => "particularClient",
                'path' => $request->path->store('images/particular_clients', 'public'),
                'extension' => $request->path->extension(),
                'pictureable_type' => 'particularClient',
                'pictureable_id' => $particularClient->id,
                ]);
                
            }
            return redirect('particular-clients');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\particular_clients  $particular_clients
     * @return \Illuminate\Http\Response
     */
    public function show($particular_clients)
    {
        $data['particularClient'] = ParticularClient::where('name',$particular_clients)->first();
        // return $data['particular_clients']->phones[0]->country; 
        return view('particular_clients.backoffice.show',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\particular_clients  $particular_clients
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $data['profiles'] = Profile::all();
        $data['countries'] = Country::all();
        $data['particularClients'] =  Auth::guard('particular_clients')->user();
        //$data['particular_clients'] = ParticularClient::find(Auth::guard('particular_clients')->user()->id);

        return view('system.backoffice.particular_clients.profile',$data);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\particular_clients  $particular_clients
     * @return \Illuminate\Http\Response
     */
    public function edit($particular_clients)
    {
        $data['countries'] = Country::all();
        $data['particularClient'] = ParticularClient::where('name',$particular_clients)->first();
        return view('particular_clients.backoffice.edit',$data);
        return $data;
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\particular_clients  $particular_clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$particulaClient)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:particular_clients,email,'.$particulaClient,
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
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $particularClient = ParticularClient::find($particulaClient);
        $particularClient->first_name = $request->first_name;
        $particularClient->last_name = $request->last_name;
        $particularClient->email = $request->email;
        $particularClient->gender_id = $request->gender;
        $particularClient->birthday = date('Y-m-d H:i:s',strtotime($request->birthday));
        $particularClient->is_register_to_newsletter = $is_register_to_newsletter;
        $particularClient->save();
        
        $address = $particularClient->address;
        $address->address = $request->address;
        $address->address_tow = $request->address_tow;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->save();
             
        if($request->hasFile('path')) 
        {
            $picture = $particularClient->picture;
            $picture->name = time().'.'.$request->file('path')->extension();
            $picture->tag = "particularClient";
            $picture->path = $request->path->store('images/particular_clients', 'public');
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
        return redirect('particular-clients');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\particular_clients  $particular_clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($particular)
    {
        $particulaClient = ParticularClient::where('name', $particular)->first();
        $particulaClient->delete();
        return redirect('particular-clients');
    }

    /**
     * Show all open sessions for the account.
     * Option to change password and to desable the account.
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        $particular_clients = Auth::guard('particular_clients')->user();
        $guests = Guest::some($particularClient->id);
        return view('system.backoffice.particular_clients.security', [
            'particular_clients' => $particular_clients,
            'guests' => $guests,
        ]);
    }

    /**
     * Desable particular_clientss account.
     *
     * @param  \Iluminate\Http\Request $request
     * @param  \App\particular_clients  $particular_clients
     * @param  \App\Guest  $session_id
     * @return \Illuminate\Http\Response
     */
    public function sessionDestroy(Request $request,$particular_clients, $session_id)
    {
        DB::table('sessions')->where('id', $session_id)->delete();
        return redirect(str_before(url()->current(), '.com').'.com/security');
    }
}
