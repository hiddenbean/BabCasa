<?php

namespace App\Http\Controllers;

use App\AttributeLang;
use App\Attribute;
use Illuminate\Http\Request;

class AttributeLangController extends Controller
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
     * @param  \App\attribute_lang  $attribute_lang
     * @return \Illuminate\Http\Response
     */
    public function show(attribute_lang $attribute_lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attribute_lang  $attribute_lang
     * @return \Illuminate\Http\Response
     */
    public function edit(attribute_lang $attribute_lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attribute_lang  $attribute_lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attribute)
    {
        $attribute = Attribute::find($attribute);
        foreach($request->references as $key => $reference)
        {
            $attributeLang = $attribute->attributeLangs->where('lang_id',$request->languages_id[$key])->first();
            if(!isset($attributeLang))
            {
                $attributeLang = new AttributeLang();
                $attributeLang->attribute_id = $attribute->id;
                $attributeLang->lang_id = $request->languages_id[$key];
            }

            if($reference != '')
            {
                $attributeLang->reference = $reference;
                $attributeLang->description = $request->descriptions[$key];
                }
                else
                {
                $attributeLang->reference = '';
                $attributeLang->description = '';
    
                }
                $attributeLang->save();
            
            
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attribute_lang  $attribute_lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(attribute_lang $attribute_lang)
    {
        //
    }
}
