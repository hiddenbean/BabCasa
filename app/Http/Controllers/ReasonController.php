<?php

namespace App\Http\Controllers;

use App;
use App\Reason;
use App\ReasonLang;
use App\Language;
use Illuminate\Http\Request;

class ReasonController extends Controller
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
            'reference' => 'required|unique:reason_langs,reference,null,id,deleted_at,null',
            'description' => 'max:3000',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['reasons'] = Reason::all();
        return view('reasons.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('reasons.backoffice.staff.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $trashedReasonLang = ReasonLang::onlyTrashed()->where('reference', $request->reference)->first();
        if(isset($trashedReasonLang))
        {
            return redirect('reasons/'.$trashedReasonLang->reason_id);
        }
        
        $this->validateRequest($request);
        $reason = new Reason();
        $reason->save();
             // Add LANGUAGES 
             foreach(Language::all() as $lang)
             {
                 $reasonLang = new ReasonLang();
                 $reasonLang->reason_id = $reason->id;
                 $reasonLang->lang_id = $lang->id;
                 $reasonLang->reference = ($lang->id == $request->language) ? $request->reference : "";
                 $reasonLang->description = ($lang->id == $request->language) ? $request->description : "";
                 $reasonLang->save();
             }
     
        
        return redirect('reasons');
    }
    public function storeWithRedirect(Request $request) {
        $reason = self::store($request);
        return redirect('reasons/'.$reason->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $reason = self::store($request);
        return redirect('reasons/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function show($reason)
    {
        $data['reason'] = Reason::withTrashed()->findOrFail($reason);
        $data['languages'] = Language::all();

        return view('reasons.backoffice.staff.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function edit($reason)
    {
        $data['reason'] = reason::find($reason);
        return view('reasons.backoffice.staff.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reason)
    {
        $request->validate([
            'reference' => 'required|unique:reasons,reference,'.$reason,
            'short_description' => 'required|required|max:600',
            'description' => 'required|required|max:3000',
        ]);
        
        $reason = Reason::find($reason);
        $reason->save();

        $reasonLangId = $reason->reasonLang()->id;

        $reasonLang = ReasonLang::find($reasonLangId);
        $reasonLang->description = $request->description; 
        $reasonLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $reasonLang->save(); 
        
        return redirect('reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($Reason)
    {
        $reason = Reason::findOrFail($Reason);
        if(isset($reason->statuses[0]))
        {
            return redirect('reasons')
                                ->with(
                                    'error',
                                    'Reason can\'t be deleted it is in an association with statuses !!'
                                    );
        }
        $reason->delete();
        return redirect('/reasons')
                            ->with(
                                'success',
                                'Reason deleted successfuly !!'
                                );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reasons  $reasons
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        

        $request->validate([
            'reasons' => 'required',
        ]);
        $error = false;
        
        foreach($request->reasons as $Reason)
        {
            $cantDelete = false;

            $reason = Reason::findOrFail($Reason);
    
            if(isset($reason->statuses[0])) {$cantDelete = true;$error = true;}
    
            if(!$cantDelete) 
                $reason->delete();

        }
        if(!$error) 
        {
            return redirect('reasons')->with(
                            'success',
                            'Reason has been deleted successfuly !!'
            );

        }
        else 
        {
            return redirect('reasons')->with(
                'error',
                'Reason can\'t be deleted it has a relation with products '
            );
        }
    }
    /**
     * 
     */
    public function trash () {
        return view('reasons.backoffice.staff.trash');
    }

    /**
     * 
     */
    public function translations () {
        $data["languages"] =  Language::all();
        return view('reasons.backoffice.staff.translations', $data);
    }
}
