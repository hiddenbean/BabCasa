<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Country;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:staff');
         $this->middleware('AuthorizeGet:currency'); //->except('index','create');
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
            'name' => 'required|unique:Currencies,name',
            'symbole' => 'required|unique:Currencies,symbole',
            'country_id' => 'required',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['currencies'] = Currency::all();
        return view('currencies.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('currencies.backoffice.staff.create',$data);
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

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->symbole = $request->symbole;
        $currency->country_id = $request->country_id;
        $currency->save(); 
        
        return redirect('currencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function show($Currency)
    {
        
        $data['Currency'] = Currency::find($Currency);
        return 1;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function edit($currency)
    {
        $data['countries'] = Country::all();
        $data['currency'] = Currency::find($currency);
        return view('currencies.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $currency)
    {
        $request->validate([
            'name' => 'required|unique:currencies,name,'.$currency,
            'symbole' => 'required|unique:currencies,symbole,'.$currency,
            'country_id' => 'required',
        ]);
        
        $currency = Currency::find($currency);
        $currency->name = $request->name;
        $currency->symbole = $request->symbole;
        $currency->country_id = $request->country_id;
        $currency->save(); 
        
        
        return redirect('currencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($currency)
    {
        // récupérer photo
        $currency = Currency::findOrFail($currency);
       $currency->delete();
       return redirect('currencies');

    }
}