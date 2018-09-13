<?php

namespace App\Http\Controllers;

use App;
use App\Reason;
use App\ReasonLang;
use App\Language;
use Illuminate\Http\Request;

class ReasonController extends Controller
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
            'reference' => 'required|unique:reasons,reference',
            'short_description' => 'required|required|max:600',
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

        return view('reasons.backoffice.staff.create');
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

        $reason = new Reason();
        $reason->reference = $request->reference; 
        $reason->save(); 

        $reasonLang = new ReasonLang();
        $reasonLang->short_description = $request->short_description; 
        $reasonLang->description = $request->description; 
        $reasonLang->reason_id = $reason->id; 
        $reasonLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $reasonLang->save();
        
        return redirect('reasons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reason  $Reason
     * @return \Illuminate\Http\Response
     */
    public function show($reason)
    {
        
        $data['reason'] = Reason::find($reason);
        return view('reasons.backoffice.staff.show',$data);
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
        return view('reasons.backoffice.staff.edit',$data);
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
        $reason->reference = $request->reference; 
        $reason->save();

        $reasonLangId = $reason->reasonLang->first()->id;

        $reasonLang = ReasonLang::find($reasonLangId);
        $reasonLang->short_description = $request->short_description; 
        $reasonLang->description = $request->description; 
        $reasonLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
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
        // récupérer photo
        $Reason = Reason::findOrFail($Reason);
       $Reason->delete();
       return redirect('reasons');

    }
}
