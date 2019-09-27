<?php

namespace App\Http\Controllers;

use App\ProfileLang;
use App\Profile;
use Illuminate\Http\Request;

class ProfileLangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfileLang  $profileLang
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileLang $profileLang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfileLang  $profileLang
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileLang $profileLang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfileLang  $profileLang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$Profile)
    {
        $profile = Profile::findOrFail($Profile);
        foreach($request->references as $key => $reference)
        {
         $profileLang = $profile->profileLangs->where('lang_id',$request->languages_id[$key])->first();
            if(!isset($profileLang))
            {
                $profileLang = new profileLang();
                $profileLang->profile_id = $profile->id;
                $profileLang->lang_id = $request->languages_id[$key];
            }
            if($reference != '')
            {
                 $profileLang->reference = $reference;
                 $profileLang->description = $request->descriptions[$key];
             }
             else
             {
                 $profileLang->reference = '';
                 $profileLang->description = '';
 
             }
             $profileLang->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfileLang  $profileLang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileLang $profileLang)
    {
        //
    }
}
