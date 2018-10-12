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
         $this->middleware('CanRead:currency'); //->except('index','create');
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
            'name' => 'required|unique:currencies,name',
            'symbole' => 'required|unique:currencies,symbole',
            'country_id' => 'required|unique:currencies,country_id',
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
        
        return redirect('currencies')
                                ->with(
                                    'success',
                                    'Currency added successfuly !!'
                                    );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function show($Currency)
    {
        // All the informations are shown on currency index
        $data['Currency'] = Currency::find($Currency);
        return view();
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
            'name' => 'required|unique:currencies,name,'.$currency.',id',
            'symbole' => 'required|unique:currencies,symbole,'.$currency.',id',
            'country_id' => 'required|unique:currencies,country_id,'.$currency.',id',
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
        if(isset($currency->products[0]))
        {
            return  redirect()
            ->back()
            ->with(
                'error',
                'currency can\'t be deleted it has products !!' 
            );
        }
       $currency->delete();
       return redirect('currencies')
                                ->with(
                                    'success',
                                    'Currency deleted successfuly !!'
                                    );

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {

        $request->validate([
            'currencies' => 'required',
        ]);
        $error = false;
        
        foreach($request->currencies as $Currency)
        {
            $cantDelete = false;

            $currency = Currency::findOrFail($Currency);
    
            if(isset($currency->products[0])) {$cantDelete = true;$error = true;}
    
            if(!$cantDelete) 
                $currency->delete();

        }
        if(!$error) 
        {
            return redirect('currencies')->with(
                            'success',
                            'Currency has been deleted successfuly !!'
             );

        }
        else 
        {
            return redirect('currencies')->with(
                'error',
                'Currency can\'t be deleted it has a relation with products '
            );
        }

    }
}