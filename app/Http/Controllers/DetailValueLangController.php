<?php

namespace App\Http\Controllers;

use App\DetailValueLang;
use Illuminate\Http\Request;

class DetailValueLangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:partner');
        
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
     * @param  \App\detail_value_lang  $detail_value_lang
     * @return \Illuminate\Http\Response
     */
    public function show(detail_value_lang $detail_value_lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_value_lang  $detail_value_lang
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_value_lang $detail_value_lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_value_lang  $detail_value_lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_value_lang $detail_value_lang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_value_lang  $detail_value_lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_value_lang $detail_value_lang)
    {
        //
    }
}
