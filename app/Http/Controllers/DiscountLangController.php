<?php

namespace App\Http\Controllers;

use App\DiscountLang;
use App\Discount;
use Illuminate\Http\Request;

class DiscountLangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff,partner');
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
     * @param  \App\discount_lang  $discount_lang
     * @return \Illuminate\Http\Response
     */
    public function show(discount_lang $discount_lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\discount_lang  $discount_lang
     * @return \Illuminate\Http\Response
     */
    public function edit(discount_lang $discount_lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\discount_lang  $discount_lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $discount)
    {
        // return $request;
        $discount = Discount::find($discount);
        foreach($request->references as $key => $reference)
        {
            $discountLang = $discount->discountLangs->where('lang_id',$request->languages_id[$key])->first();
            if(!isset($discountLang))
            {
                $discountLang = new DiscountLang();
                $discountLang->discount_id = $discount->id;
                $discountLang->lang_id = $request->languages_id[$key];
            }

            if($reference != '')
            {
                $discountLang->reference = $reference;
                $discountLang->description = $request->descriptions[$key];
                }
                else
                {
                $discountLang->reference = '';
                $discountLang->description = '';
    
                }
                $discountLang->save();
            
            
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount_lang  $discount_lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(discount_lang $discount_lang)
    {
        //
    }
}
