<?php

namespace App\Http\Controllers;

use Auth;
use App\Partner;
use App\Discount;
use App\Language;
use App\DiscountLang;
use Illuminate\Http\Request;

class DiscountController extends Controller
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
          
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['discounts'] =Auth::guard('partner')->user()->discounts;
                 $view = 'discounts.backoffice.partner.all';
                 break;

             case 'staff':
                $data['discounts'] = Discount::all();
                $view = 'discounts.backoffice.staff.index';
                 break;
         }
         return $data;
         return view($view,$data);
    }

    public function current()
    {
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['discounts'] = Auth::guard('partner')->user()->discounts()->where('start_at','<',date('Y-m-d'))->where('end_at','>',date('Y-m-d'))->get();
                 $view = 'discounts.backoffice.partner.all';
                 break;

             case 'staff':
                $data['discounts'] = Discount::where('start_at','<',date('Y-m-d'))->where('end_at','>',date('Y-m-d'))->get();
                $view = 'discounts.backoffice.staff.index';
                 break;
         }
         return $data;
        return view($view,$data);
    }
    public function expired()
    {
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['discounts'] = Auth::guard('partner')->user()->discounts()->where('end_at','<',date('Y-m-d'))->get();
                 $view = 'discounts.backoffice.partner.all';
                 break;

             case 'staff':
                $data['discounts'] = Discount::where('end_at','<',date('Y-m-d'))->get();
                $view = 'discounts.backoffice.staff.index';
                 break;
         }
         return view($view,$data);
    }
    
    public function next()
    {
        
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['discounts'] = Auth::guard('partner')->user()->discounts()->where('start_at','>',date('Y-m-d'))->get();
                 $view = 'discounts.backoffice.partner.all';
                 break;

             case 'staff':
                $data['discounts'] = Discount::where('start_at','>',date('Y-m-d'))->get();
                $view = 'discounts.backoffice.staff.index';
                 break;
         }
         return view($view,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve the partner
       return view('discounts.backoffice.partner.create');
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
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'reference' =>'required|unique:discount_langs,reference',
            'description' => 'required',
        ]);
        
        $discount = new Discount();
        $discount->redaction_percentage = $request->redaction_percentage;
        $discount->start_at = $request->start_at;
        $discount->end_at = $request->end_at;
        $discount->partner_id = Auth::guard('partner')->user()->id;
        $discount->save();
          // Add LANGUAGES 
          foreach(Language::all() as $lang)
          {
              $discountLang = new DiscountLang();
              $discountLang->detail_id = $discount->id;
              $discountLang->lang_id = $lang->id;
              $discountLang->reference = ($lang->id == $request->language) ? $request->reference : "";
             $discountLang->description = ($lang->id == $request->language) ? $request->description : "";
              $discountLang->save();
          }

        $products[] = $request->products;
        foreach($products as $key => $product_id)
        {
            $discount->products()->attache($product_id, ['quantity' => $request->input('quantity')[$key]]);
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
        $data['discount'] = DiscountLang::where('reference', $discount)->firstOrFail()->discount;
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $view = 'discount.backoffice.partner.show';
                 break;

             case 'staff':
                $view = 'discount.backoffice.staff.show';
                 break;
         }
         return $data;
         return view($view,$data);
         
       
        return $discount;
        // return view('discounts.backoffice.show',['discount'=> $discount,'partner'=>$partner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit($discount)
    {
        $data['discount'] = DiscountLang::where('reference', $discount)->firstOrFail()->discount;
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $view = 'discount.backoffice.partner.edit';
                 break;

             case 'staff':
                $view = 'discount.backoffice.staff.edit';
                 break;
         }
         return $data;
         return view($view,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $discount)
    {
        $request->validate([
            'redaction_percentage' => 'required|numeric|digits_between:1,3|max:100',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'reference' =>'required|unique:discount_langs,reference,'.$discount.',discount_id',
            'description' => 'required',
            ]);
            
        $discount = DiscountLang::where('reference', $discount)->firstOrFail()->discount;
        $discount->redaction_percentage = $request->redaction_percentage;
        $discount->start_at = $request->start_at;
        $discount->end_at = $request->end_at;
        $discount->save();

        $discount_lang = $discount->categoryLang();
        $discount_lang->reference = $request->reference;
        $discount_lang->description = $request->description;
        $discount_lang->lang_id = 1;
        $discount_lang->save();

        $discount->products()->detach();

        foreach($request->products as $key => $product_id)
        {
            $discount->products()->attache($product_id, ['quantity' => $request->input('quantity')[$key]]);
        }
        // return redirect('discounts');
    
    }
    public function userType()
    {
        $profiles= [ 'partner', 'staff'];
        for($i=0; $i<2; $i++)
        {
            if(auth()->guard($profiles[$i])->check())
            {
                break;
            }
        }
        return $profiles[$i];
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($discount)
    {
        $discount = DiscountLang::where('reference', $discount)->firstOrFail()->discount;
        if($discount->start_at < date('Y-m-d') && $discount->end_at > date('Y-m-d'))
        {
            return 'discount cant delete because it s current';
        }
        $discount->products()->detach();
        $discount->delete();
        
        // return redirect('disocunts/upcoming');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function muliDestroy(Request $request)
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
