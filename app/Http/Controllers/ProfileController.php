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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data['profiles'] = Profile::onlyTrashed()->get();
        return view('profiles.backoffice.trash', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        $data['permissions'] = Permission::all();
        return view('profiles.backoffice.create',$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trashedProfileLang = ProfileLang::onlyTrashed()->where('reference', $request->reference)->first();
        if(isset($trashedProfileLang))
        {
            return redirect('profiles/'.$trashedProfileLang->profile_id);
        }
        $this->validateRequest($request);

        $profile = new Profile();
        $profile->save(); 

          // Add LANGUAGES 
          foreach(Language::all() as $lang)
          {
              $profileLang = new ProfileLang();
              $profileLang->profile_id = $profile->id;
              $profileLang->lang_id = $lang->id;
              $profileLang->reference = ($lang->id == $request->language) ? $request->reference : "";
              $profileLang->description = ($lang->id == $request->language) ? $request->description : "";
              $profileLang->save();
          }

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

          return $profile;
        
    }

      /**
     * 
     */
    public function storeWithRedirect(Request $request) {
        $profile = self::store($request);
        return redirect('profiles/'.$profile->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $profile = self::store($request);
        return redirect('profiles/create');
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
        $data['languages'] = Language::all();
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
        return true;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $data['profile'] = Profile::findOrFail($profile);
        $data['permissions'] = Permission::all();
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
        ]);
        
        $profile = Profile::findOrFail($profile);
        $profile->save();
        
        $profileLangId = $profile->profileLang()->id;
        
        $profileLang = ProfileLang::find($profileLangId);
        $profileLang->reference = $request->reference; 
        $profileLang->description = $request->description; 
        $profileLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $profileLang->save(); 

       self::permissions($request,$profile->id);
        
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
        if(isset($profile->staff[0]))
        {
            $messages['error'] = 'profile can\'t be deleted it related with staff !!';
            return  redirect('profiles')
                        ->with('messages',$messages);
        }
        $profile->delete();
        $messages['success'] = 'profile has been deleted successfuly !!';
        return redirect('profiles')
                    ->with('messages', $messages);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'profiles' => 'required',
        ]);
        $e=$s=0;
        $messages = [];
        foreach($request->profiles as $profile)
        {
            $profile = Profile::findOrFail($profile);
            if(!isset($profile->staff[0])) {
                $s++;
                $profile->delete();
                $messages['success'] = $s. ($s == 1 ? ' profile' :' profiles') .' has been deleted successfuly';
            }
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' profile' : ' profiles') . ' can\'t be deleted it has a relation with staff';
            }
        }

        return redirect('profiles')
                        ->with('messages', $messages);
    }

    public function restore($Profile)
    {
        $profile = Profile::onlyTrashed()->where('id', $Profile)->first();
        $profile->restore();
        $messages['success'] = 'profile has been restored successfuly !!';
        return redirect('profiles')->with('messages',$messages);
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'profiles' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->profiles as  $Profile)
        {
            $profile = Profile::onlyTrashed()->where('id', $Profile)->first();
            $profile->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' profile' :' profiles') .' has been restored successfuly';
        }
        return redirect('profiles')->with('messages',$messages);
    }
      /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function translations($profile)
    {
        $data['languages'] = Language::all();
        $data['profile'] = Profile::findOrFail($profile);
        return view('profiles.backoffice.translations', $data);
    }
    
}
