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
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
}
