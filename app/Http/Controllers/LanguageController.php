<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        
    }
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:languages,name',
            'alpha_2_code' => 'required',
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['language'] = Language::all();
        return view('languages.backoffice.staff.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.backoffice.staff.create');
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

       $language = new Language();
       $language->name = $request->name;
       $language->alpha_2_code = $request->alpha_2_code;
       $language->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show($language)
    {
        $data['language'] = Language::findOrFail($language);
        return view('languages.backoffice.staff.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($language)
    {
        $data['language'] = Language::findOrFail($language);
        return view('languages.backoffice.staff.edit',$data);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Language)
    {
        $request->validate([
            'name' => 'required|unique:languages,name,'.$Language,
            'alpha_2_code' => 'required',
        ]);
        $language = Language::findOrFail($Language);
        $language->name = $request->name;
        $language->alpha_2_code = $request->alpha_2_code;
        $language->save();
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($Language)
    {
        $language = Language::findOrFail($Language);
        if(
              isset($language->languageLangs[0])
            ||isset($language->languageVarcharValueLangs[0])
            ||isset($language->bundleLangs[0])
            ||isset($language->categoryLangs[0])
            ||isset($language->discountLangs[0])
            ||isset($language->detailLangs[0])
            ||isset($language->detailValueLangs[0])
            ||isset($language->productLangs[0])
            ||isset($language->tagLangs[0])
        )
        {
            $messages['error'] = 'Language can\'t be deleted it has relation !!';
            return redirect('languages')
                             ->with('messages',$messages);
        }
        $language->delete();
        $messages['success'] = 'Language has been deleted successfuly !!';
        return redirect('/languages')
                            ->with('messages',$messages);
    }

    public function multiDestroy(Request $request)
    {
        $request->validate([
            'languages' => 'required',
            ]);
        $e=$s=0;
        $messages = [];
        foreach($request->languages as $Language)
        {
            $language = Language::findOrFail($Language);
            if(
                isset($language->languageLangs[0])
                && !isset($language->languageVarcharValueLangs[0])
                && !isset($language->bundleLangs[0])
                && !isset($language->categoryLangs[0])
                && !isset($language->discountLangs[0])
                && !isset($language->detailLangs[0])
                && !isset($language->detailValueLangs[0])
                && !isset($language->productLangs[0])
                && !isset($language->tagLangs[0])
            )
             {
                $s++;
                $language->delete();
                $messages['success'] = $s. ($s == 1 ? ' language' :' languages') .' has been deleted successfuly';
                
            }
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' language' : ' languages') . ' can\'t be deleted it has a relation';
            }
        }
            
        return redirect('languages')
                ->with('messages', $messages);
    }

    public function restore($Language)
    {
         $language = Language::onlyTrashed()->where('id', $Language)->first();
        $language->restore();
        $messages['success'] = 'language has been restored successfuly !!';
        return redirect('languages')->with('messages',$messages);
       
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'languages' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->languages as  $Language)
         {
            $language = Language::onlyTrashed()->where('id', $Language)->first();
           $language->restore();
           $s++;
           $messages['success'] = $s. ($s == 1 ? ' languages' :' languagess') .' has been restored successfuly';
        }
         return redirect('languages')->with('messages',$messages);
       
    }


    /**
     * Display a listing of the removed languages.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data['languages'] = Language::onlyTrashed()->get();
        return view('languages.backoffice.staff.trash',$data);
    }
}
