<?php

namespace App\Http\Controllers;

use Hash;
use Password;
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
        //$this->middleware('auth:particular_clients, staff');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:particular_clients,name',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:particular_clients,email',
            'gender_id' => 'required',
            'birthday' => 'required|date',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Display a trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unactive()
    {
        $data['particulars'] = ParticularClient::onlyTrashed()->get();
        return view('clients.backoffice.staff.unactive',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['particulars'] = ParticularClient::all();
        // return $data['particulars'][0]->phone;
        return view('clients.backoffice.staff.index',$data);
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

        $PhoneController = new PhoneController();
        $PhoneController->validateRequest($request);
        
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'numbers.1' => 'nullable|numeric|unique:phones,number|digits:9',
            'numbers.1' => 'nullable|numeric|unique:phones,number|digits:9',
            'code_country.0' => 'required',
            'code_country.1' => 'required',
        ]);
        
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $particularClient = new ParticularClient();
        $particularClient->name = $request->name;
        $particularClient->first_name = $request->first_name;
        $particularClient->last_name = $request->last_name;
        $particularClient->email = $request->email;
        $particularClient->gender_id_id = $request->gender_id;
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
                $phone->phoneable_type = 'particular_client';
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
            $phone->phoneable_type = 'particular_client';
            $phone->phoneable_id = $particularClient->id;
            $phone->save();
        }
        

        if($request->address)
        {
            $address = new Address();
            $address->address = $request->address;
            $address->address_two = $request->address_two;
            $address->full_name = $request->full_name;
            $address->zip_code = $request->zip_code;
            $address->country_id = $request->country_id;
            $address->city = $request->city;
            $address->addressable_type = 'particular_client';
            $address->addressable_id = $particularClient->id;
            $address->save();
            
        }
        if($request->path)
        {
            $picture = Picture::create([
                'name' => time().'.'.$request->file('path')->extension(),
                'tag' => "particular_client_avatar",
                'path' => $request->path->store('images/particular_clients', 'public'),
                'extension' => $request->path->extension(),
                'pictureable_type' => 'particular_client',
                'pictureable_id' => $particularClient->id,
                ]);
                
            }
            return redirect('clients/particular');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\particular_clients  $particular_clients
     * @return \Illuminate\Http\Response
     */
    public function show($client)
    {
        $data['client'] = ParticularClient::withTrashed()->where('name',$client)->first();
        return view('clients.backoffice.staff.show',$data);
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
            'gender_id' => 'required',
            'birthday' => 'required|date',
        ]);
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number,'.$request->phone_id[0],
            'code_country.0' => 'required',
            'code_country.1' => 'required',
        ]);      
        $is_register_to_newsletter = ($request->is_register_to_newsletter=='on') ? 1 : 0;
        $particularClient = ParticularClient::find($particulaClient);
        $particularClient->first_name = $request->first_name;
        $particularClient->last_name = $request->last_name;
        $particularClient->email = $request->email;
        $particularClient->gender_id = $request->gender_id;
        $particularClient->birthday = date('Y-m-d H:i:s',strtotime($request->birthday));
        $particularClient->is_register_to_newsletter = $is_register_to_newsletter;
        $particularClient->save();
        
        $address = $particularClient->address;
        $address->address = $request->address;
        $address->address_two = $request->address_two;
        $address->full_name = $request->full_name;
        $address->zip_code = $request->zip_code;
        $address->country_id = $request->country_id;
        $address->city = $request->city;
        $address->save();
             
        if($request->hasFile('path')) 
        {
            $picture = $particularClient->picture;
            $picture->name = time().'.'.$request->file('path')->extension();
            $picture->tag = "particular_client_avatar";
            $picture->path = $request->path->store('images/particular_clients', 'public');
            $picture->extension = $request->path->extension();
            $picture->save();
        }
        

        foreach($request->numbers as $key => $number)
        {
            if($number != null)
            {
                $phone = Phone::where('id', $request->phone_id[$key])
                                                                ->whereIn('type', ['phone', 'fix'])
                                                                ->where('phoneable_id', $particularClient->id)
                                                                ->first();
                if($phone == null)
                {
                    $phone = new Phone();
                    $phone->phoneable_id = $particularClient->id;
                    $phone->phoneable_type = 'particular_client';
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
                                ->where('phoneable_id', $partner->id)
                                ->first();
            if($fax == null)
            {
                $fax = new Phone();
                $phone->phoneable_id = $partner->id;
                $phone->phoneable_type = 'particular_client';
            }
            $phone = Phone::find($request->fax_id);
            $phone->number = $request->fax_number;
            $phone->type = "fix";
            $phone->country_id = $request->code_country[2];
            $phone->save();
        }
        return redirect('clients/particular');
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
        if($this->stuckParticularClient($particulaClient))
        {
            return redirect()
                            ->back()
                            ->with(
                                'error',
                                'Particular can\'t be deleted it has unsolved orders/markets !!'
                            );
        }
        $particulaClient->delete();
        return redirect($this->redirectURL(url()->current(), $particular))
                                ->with(
                                    'success',
                                    'Particular has been deleted successfuly !!'
                                );
    }

    public function stuckParticularClient($particularClient)
    {
        $orderStatus = $particularClient->orders()->whereIn('status', ['in_progress', 'finished'])->get();
        //$marketStatus = $client->markets()->whereIn('status', ['in_progress', 'finished'])->get();
        isset($orderStatus[0]) ? $stuck = true : $stuck = false;
        return $stuck;
    }

    public function redirectURL($url, $particular)
    {
        $destroy_url = str_after($url, '/'.$particular);
        if($destroy_url == '/desactivate')
        {
            return str_before($url, $particular).''.$particular.'/security';
        }
        return str_before($url, '/'.$particular);
    }

    public function multiDestroy(Request $request)
    {
        foreach($request->particular_clients as $particular_client)
        {
            $particular_client = Business::where('name', $particular_client)->first();
            if(!$this->stuckParticularClient($particular_client))
            {
                $particular_client->delete();
            }
        }
        return redirect('clients/particular');
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

    public function restore($particular_client)
    {
        $particular_client = ParticularClient::onlyTrashed()->where('name', $particular_client)->first();
        $particular_client->restore();
        $messages['success'] = 'Particular client has been restored successfuly !!';
        return redirect('clients/particular')->with('messages',$messages);
    }

    public function multiRestore()
    {
        $request->validate([
            'particular_clients' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->particular_clients as  $particular_client)
        {
            if($particular_client != null)
            {
                $particular_client = Business::onlyTrashed()->where('name', $particular_client)->first();
                $particular_client->restore();
                $s++;
                $messages['success'] = $s. ($s == 1 ? ' particular client' :' particular clients') .' has been restored successfuly';
            }
        }
        return redirect('clients/particular')->with('messages',$messages);
    }

    public function reset(Request $request, $client)
    {
        $password_communicated = ($request->password_communicated=='on') ? 1 : 0;
        if($password_communicated)
        {
            $password = Hash::make($request->password);
            $client =ParticularClient::where('name', $client)->first();
            if($client)
            {
                $client->password = $password;
                $client->save();
                $messages['success'] = 'Password reset has been done successfuly !!';
            }
            else
            {
                $messages['error'] = 'Client member doesn\'t exist !!';
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
    public function sendResetLinkEmail($client) {
        $client = ParticularClient::where('name', $client)->first();
        $token = Password::getRepository()->create($client);
        return 1;

        $client->sendPasswordResetNotification($token);

        $messages['success'] = 'Password reset has been sent successfuly !!';

        return back()->with('messages', $messages);
    }
}
