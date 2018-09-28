<?php

namespace App\Http\Controllers;

use App;
use App\Profile;
use App\Language;
use App\Permission;
use App\ProfileLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class profileController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:staff');
        // $this->middleware('AuthorizeGet:profile'); //->except('index','create');
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
        return view('profiles.backoffice.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('profiles.backoffice.create');
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

        $profile = new Profile();
        $profile->save(); 
        
        $profileLang = new ProfileLang();
        $profileLang->reference = $request->reference; 
        $profileLang->description = $request->description; 
        $profileLang->profile_id = $profile->id; 
        $profileLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $profileLang->save();
        
        return redirect('profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($profile)
    {
        
        $data['profile'] = Profile::find($profile);
        $data['permissions'] = Permission::all();
        return view('profiles.backoffice.show',$data);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function permissions(Request $request,$profile)
    {
        //return $request->can;
        $profile = Profile::find($profile);
        $profile->permissions()->detach();

        foreach($request->permissions as $key =>$permission)
        {
            switch ($request->can[$key]) {
                case 0:
                $canRead = 0;
                $canWrite = 0;
                    break;
                
                case 1:
                $canRead = 1;
                $canWrite = 0;
                    break;
                
                case 2:
                $canRead = 1;
                $canWrite = 1;
                    break;
            }
            $profile->permissions()->attach($permission,['can_read'=>$canRead,'can_write'=>$canWrite]);

        }
        return redirect()->back();
        
        $data['permissions'] = Permission::all();
        return view('profiles.backoffice.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $data['profile'] = Profile::find($profile);
        // return $data;
        return view('profiles.backoffice.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile)
    {
        $request->validate([
            'reference' => 'required|unique:profile_langs,reference,'.$profile.',profile_id',
            'description' => 'required|required|max:3000',
        ]);
        
        $profile = Profile::find($profile);
        $profile->save();
        
        $profileLangId = $profile->profileLang->first()->id;
        
        $profileLang = ProfileLang::find($profileLangId);
        $profileLang->reference = $request->reference; 
        $profileLang->description = $request->description; 
        $profileLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $profileLang->save(); 
        
        return redirect('profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($profile)
    {
        // récupérer photo
        $profile = Profile::findOrFail($profile);
       $profile->delete();
       return redirect('profiles');

    }
}
