<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Discount;
use App\Language;
use App\DiscountLang;
use Illuminate\Http\Request;

class DiscountController extends Controller
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
        // Retrieve the partner
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        //Return the form to create discount
        return view('discounts.backoffice.create', [
            'partner' => $partner
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = count($request->product);
        $request->validate([
            'redaction_percentage' => 'required|numeric|digits_between:1,3|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reference' =>'required|unique:discount_langs,reference',
            'description' => 'required',
        ]);return dd($request);

        isset($request->partner) ? $partner = $request->partner : $partner = auth()->guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();

        // $lang = Language::where('symbole', app()->getLocale())->first();
        
        $discount = new Discount;
        $discount->redaction_percentage = $request->redaction_percentage;
        $discount->start_at = $request->start_date;
        $discount->end_at = $request->end_date;
        $discount->partner_id = $partner->id;
        // $discount->save();

        $discount_lang = new DiscountLang;
        $discount_lang->reference = $request->reference;
        $discount_lang->description = $request->description;
        $discount_lang->discount_id = $discount->id;
        $discount_lang->lang_id = 1;
        // $discount_lang->save();

        foreach($request->products as $key => $product_id)
        {echo "1";
            // $product = Good::where('name',$product_id)->firstOrFail();
            // $discount->product()->attache($product->id, ['quantity' => $request->input('quantity')[$key]]);
        }
        // return redirect('discounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show($discount)
    {
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $partner = Partner::where('name',$partner)->firstOrFail();
        $discount = DiscountLang::withTrashed()->where('reference', $discount)->firstOrFail()->discount;
        return $discount;
        // return view('discounts.backoffice.show',['discount'=> $discount,'partner'=>$partner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach($request->input('discounts') as $discount_id)
        {
            if($discount_id != null)
            {
                $discount = Discount::findOrFail($discount_id);
                $discount->forceDelete();
            }  
        }
        return Discount::all();
        // return redirect('disocunts/upcoming');
    }
}
