<?php

namespace App\Http\Controllers;

use App\Partner;
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
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
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
}
