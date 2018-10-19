<?php

namespace App\Http\Controllers;

use App\DetailLang;
use App\Detail;
use App\Language;
use Illuminate\Http\Request;

class DetailLangController extends Controller
{
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
    public function create($detail)
    {
        $data['languages'] = Language::all();
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
     * @param  \App\detail_lang  $detail_lang
     * @return \Illuminate\Http\Response
     */
    public function show(detail_lang $detail_lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_lang  $detail_lang
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_lang $detail_lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_lang  $detail_lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Detail)
    {
        $detail = Detail::find($Detail);
       foreach($request->values as $key => $value)
       {
        $detailLang = $detail->detailLangs->where('lang_id',$request->languages_id[$key])->first();
        if(!isset($detailLang))
            {
                $detailLang = new DetailLang();
                $detailLang->detail_id = $detail->id;
                $detailLang->lang_id = $request->languages_id[$key];
            }
           if($value != '')
           {
                $detailLang->value = $value;
            }
            else
            {
                $detailLang->value = ' ';

            }
            $detailLang->save();
       }
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_lang  $detail_lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_lang $detail_lang)
    {
        //
    }
}
