<?php

namespace App\Http\Controllers;

use App;
use App\Country;
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
            'code_alpha' => 'required',
            'code' => 'required',
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
        return view('countries.backoffice.staff.index',$data);
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

        $trashed_country = Country::withTrashed()->where('name', $request->name)->first();

        if($trashed_country)
        {
            $country = $trashed_country;
            $country->restore();
        }
        else
        {
            $country = new Country();
            $country->name = $request->name;
        }
        
        $country->code_alpha = $request->code_alpha;
        $country->code = $request->code;
        $country->save(); 
        
        return redirect('countries')
                                ->with(
                                    'success',
                                    'Country has been deleted successfuly !!'
                                );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function show($Country)
    {
        
        $data['Country'] = Country::find($Country);
        return 1;
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
            'code_alpha' => 'required',
            'code' => 'required|unique:countries,code,'.$country,
        ]);
        
        $country = Country::find($country);
        $country->name = $request->name;
        $country->code_alpha = $request->code_alpha;
        $country->code = $request->code; 
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
        if(isset($country->phones[0]) || isset($country->addresses[0]) || isset($country->currency[0]))
        {
            return redirect('countries')
                                    ->with(
                                        'error',
                                        'Country can\'t be deleted it is in an association with Phones/Addresses/Currency !!'
                                    );
        }
        $country->delete();
        return redirect('countries')
                                ->with(
                                    'success',
                                    'Country has been deleted successfuly !!'
                                );

    }
}
