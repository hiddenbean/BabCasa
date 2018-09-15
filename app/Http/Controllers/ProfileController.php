<?php

namespace App\Http\Controllers;

use App;
use App\Profile;
use App\Language;
use App\ProfileLang;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:profile_langs,reference',
            'description' => 'required|required|max:3000',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profiles'] = Profile::all();
        return view('profiles.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('profiles.backoffice.staff.create');
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

        $Profile = new Profile();
        $Profile->reference = $request->reference; 
        $Profile->save(); 

        $ProfileLang = new ProfileLang();
        $ProfileLang->short_description = $request->short_description; 
        $ProfileLang->description = $request->description; 
        $ProfileLang->Profile_id = $Profile->id; 
        $ProfileLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $ProfileLang->save();
        
        return redirect('profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function show($Profile)
    {
        
        $data['Profile'] = Profile::find($Profile);
        return view('profiles.backoffice.staff.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function edit($Profile)
    {
        $data['Profile'] = Profile::find($Profile);
        return view('profiles.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Profile)
    {
        $request->validate([
            'reference' => 'required|unique:profiles,reference,'.$Profile,
            'short_description' => 'required|required|max:600',
            'description' => 'required|required|max:3000',
        ]);
        
        $Profile = Profile::find($Profile);
        $Profile->reference = $request->reference; 
        $Profile->save();

        $ProfileLangId = $Profile->ProfileLang->first()->id;

        $ProfileLang = ProfileLang::find($ProfileLangId);
        $ProfileLang->short_description = $request->short_description; 
        $ProfileLang->description = $request->description; 
        $ProfileLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $ProfileLang->save(); 
        
        return redirect('profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($Profile)
    {
        // récupérer photo
        $Profile = Profile::findOrFail($Profile);
       $Profile->delete();
       return redirect('profiles');

    }
}
