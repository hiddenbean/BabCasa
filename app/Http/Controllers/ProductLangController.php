<?php

namespace App\Http\Controllers;

use App\Productlang;
use Illuminate\Http\Request;

class ProductLangController extends Controller
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
            'reference' => 'required|unique:product_langs,reference',
            'short_description' => 'required|required|max:306',
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
     * @param  \App\product_lang  $product_lang
     * @return \Illuminate\Http\Response
     */
    public function show(product_lang $product_lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product_lang  $product_lang
     * @return \Illuminate\Http\Response
     */
    public function edit(product_lang $product_lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product_lang  $product_lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_lang $product_lang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product_lang  $product_lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_lang $product_lang)
    {
        //
    }
}
