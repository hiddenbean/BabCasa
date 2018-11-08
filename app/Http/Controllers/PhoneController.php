<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff,partner,business');
        
    }

      /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    public function validateRequest(Request $request)
    {
        $request->validate([
            'numbers.0' => 'required|numeric|unique:phones,number|digits:9',
            'numbers.1' => 'nullable|numeric|unique:phones,number|digits:9',
            'fax_number' => 'nullable|numeric|unique:phones,number|digits:9',
            'code_country.0' => 'required|exists:countries,id',
            'code_country.1' => 'nullable|exists:countries,id',
            'code_country.2' => 'nullable|exists:countries,id',
        ]);
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
    public function store(Request $request, $type, $country_id, $owner, $owner_id)
    {
        $phone = new Phone();
        $phone->number = $request->admin_number;
        $phone->type = $type;
        $phone->country_id = $country_id;
        $phone->phoneable_type = $owner;
        $phone->phoneable_id = $ownerid;
        $phone->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($phone)
    {
        $phone = Phone::findOrfail($phone);
        $phone->delete();
    }
}
