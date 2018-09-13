<?php

namespace App\Http\Controllers;

use App;
use App\Detail;
use App\Language;
use App\DetailLang;
use Illuminate\Http\Request;

class DetailController extends Controller
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
            'value' => 'required|unique:detail_langs,value',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['details'] = Detail::all();

        return view('details.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('details.backoffice.staff.create');
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

        $detail = new Detail();
        $detail->save(); 

        $detailLang = new DetailLang();
        $detailLang->value = $request->value; 
        $detailLang->detail_id = $detail->id; 
        $detailLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $detailLang->save();
        
        return redirect('details');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show($detail)
    {
        
        $data['detail'] = Detail::find($detail);
        return 1;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit($detail)
    {

        $data['detail'] = Detail::find($detail);
        return view('details.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $detail)
    {
        $this->validateRequest($request);
        
        $detail = Detail::find($detail);
        $detailLangId = $detail->detailLang->first()->id;

        $detailLang = DetailLang::find($detailLangId);
        $detailLang->value = $request->value; 
        $detailLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $detailLang->save(); 
        
        return redirect('details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($detail)
    {
        // récupérer photo
        $detail = Detail::findOrFail($detail);
       $detail->delete();
       return redirect('details');

    }
}
