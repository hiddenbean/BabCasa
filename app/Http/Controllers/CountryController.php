<?php

namespace App\Http\Controllers;

use App;
use App\Country;
use App\Language;
use App\CodeCountry;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        $this->middleware('CanRead:country'); //->except('index','create');
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
            'name' => 'required|unique:countries,name,null,id,deleted_at,null',
            'alpha_2_code' => 'required',
            'phone_code' => 'required',
            'currency' =>'required',
            'currency_symbole' =>'required',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::all();
        return view('countries.backoffice.staff.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.backoffice.staff.create');
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

        $trashedCountry = Country::onlyTrashed()->where('name', $request->name)->first();
        if(isset($trashedCountry))
        {
            return redirect('countries/'.$trashedCountry->id);
        }

        $country = new Country();
        $country->name = $request->name;
        $country->alpha_2_code = $request->alpha_2_code;
        $country->phone_code = $request->phone_code;
        $country->currency = $request->currency;
        $country->currency_symbole = $request->currency_symbole;
        $country->save(); 
        
        return $country;
    }
       /**
     * 
     */
    public function storeWithRedirect(Request $request) {
        $country = self::store($request);
        return redirect('countries/'.$country->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $country = self::store($request);
        return redirect('countries/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function show($Country)
    {
        
        $data['country'] = Country::withTrashed()->find($Country);;
        return view('countries.backoffice.staff.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function edit($Country)
    {

        $data['country'] = Country::find($Country);
        return view('countries.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $country)
    {
        $request->validate([
            'name' => 'required|unique:countries,name,'.$country,
            'alpha_2_code' => 'required|unique:countries,alpha_2_code,'.$country,
            'phone_code' => 'required',
            'currency' =>'required',
            'currency_symbole' =>'required',
        ]);
        
        $country = Country::find($country);
        $country->name = $request->name;
        $country->alpha_2_code = $request->alpha_2_code;
        $country->phone_code = $request->phone_code;
        $country->currency = $request->currency;
        $country->currency_symbole = $request->currency_symbole;
        $country->save();
        
        
        return redirect('countries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function destroy($Country)
    {
        // récupérer photo
        $country = Country::findOrFail($Country);
        if(isset($country->phones[0]) || isset($country->addresses[0]))
        {
            $messages['error'] = 'Country can\'t be deleted it is in an association with Phones/Addresses !!';
            return redirect('countries')->with('messages',$messages);
        }
        $country->delete();
        $messages['success'] = 'Country has been deleted successfuly !!';
        return redirect('countries')->with('messages',$messages);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reasons  $reasons
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'countries' => 'required',
        ]);
        $e=$s=0;
        $messages = [];
        
        foreach($request->countries as $Country)
        {
            $country = Country::findOrFail($Country);
    
            if(!isset($country->phones[0]) && !isset($country->addresses[0])) 
            {
                $s++;
                $country->delete();
                $messages['success'] = $s. ($s == 1 ? ' country' :' countries') .' has been deleted successfuly';
            }
    
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' country' : ' countries') . ' can\'t be deleted it has a relation with products';
            }
        }
        return redirect('countries')->with('messages', $messages);
    }
    
    public function restore($Country)
    {
        $country = Country::onlyTrashed()->where('id', $Country)->first();
        $country->restore();
        $messages['success'] = 'Country has been restored successfuly !!';
        return redirect('countries')->with('messages',$messages);
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'countries' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->countries as  $Country)
        {
            $country = Country::onlyTrashed()->where('id', $Country)->first();
            $country->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' Country' :' countries') .' has been restored successfuly';
        }
        return redirect('countries')->with('messages',$messages);
    }

    /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data['countries'] = Country::onlyTrashed()->get();
        return view('countries.backoffice.staff.trash',$data);
    }
}
