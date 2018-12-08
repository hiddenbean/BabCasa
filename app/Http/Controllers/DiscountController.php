<?php

namespace App\Http\Controllers;

use Auth;
use App;
use App\Partner;
use App\Discount;
use App\Language;
use App\DiscountLang;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:discount_langs,reference',
            'description' => 'max:3000',
            'percentage' => 'required|not_in:0|numeric',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['discounts'] = discount::all();
        return view('discounts.backoffice.partner.index',$data);
    }
    public function current()
    {
        $data['discounts'] = Discount::where('start_at','<',date('Y-m-d h:s:00'))->where('end_at','>',date('Y-m-d h:s:00'))->get();
        return view('discounts.backoffice.partner.index',$data);
    }
    public function next()
    {
        $data['discounts'] = Discount::where('start_at','>',date('Y-m-d h:s:00'))->get();
        return view('discounts.backoffice.partner.index',$data);
    }
    public function expired()
    {
        $data['discounts'] = Discount::where('end_at','<',date('Y-m-d h:s:00'))->get();
        return view('discounts.backoffice.partner.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        $data['products'] = auth()->guard('partner')->user()->products;
        return view('discounts.backoffice.partner.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $trasheddiscountLang = DiscountLang::onlyTrashed()->where('reference', $request->reference)->first();
        if(isset($trasheddiscountLang))
        {
            return redirect('discounts/'.$trasheddiscountLang->discount_id);
        }
        $this->validateRequest($request);
        $discount = new Discount();
        $discount->percentage = $request->percentage;
        $discount->start_at = $request->start_at; 
        $discount->end_at = $request->end_at; 
        $discount->partner_id = auth()->guard('partner')->id(); 
        $discount->save();
            // Add LANGUAGES 
            foreach(Language::all() as $lang)
            {
                $discountLang = new DiscountLang();
                $discountLang->discount_id = $discount->id;
                $discountLang->lang_id = $lang->id;
                $discountLang->reference = ($lang->id == $request->language) ? $request->reference : "";
                $discountLang->description = ($lang->id == $request->language) ? $request->description : "";
                $discountLang->save();
            }
        
            if(isset($request->products)){

                foreach($request->products as $Product)
                {
                    $discount->products()->attach($Product,['quantity'=> 1]);
        
                }
            }

        return  $discount;
    }
    public function storeWithRedirect(Request $request) {
        $discount = self::store($request);
        return redirect('discounts/'.$discount->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $discount = self::store($request);
        return redirect('discounts/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show($discount)
    {
        $data['discount'] = discount::withTrashed()->findOrFail($discount);
        $data['languages'] = Language::all();

        return view('discounts.backoffice.partner.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit($discount)
    {
        $data['discount'] = discount::findOrFail($discount);
        
        $data['products'] = auth()->guard('partner')->user()->products;
        if($data['discount']->start_at<date('Y-m-d h:s:00') && $data['discount']->end_at > date('Y-m-d h:s:00')) {
            $messages['error'] = 'discount can\'t be deleted it\'s current !!';
            return  redirect('discounts')
                        ->with('messages',$messages);
        }
        return view('discounts.backoffice.partner.edit',$data);
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
        // return $request;
        $request->validate([
            'reference' => 'required|unique:discount_langs,discount_id,'.$discount,
            'description' => 'required|max:3000',
            'percentage' => 'required|not_in:0|numeric',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ]);
        $discount = discount::find($discount);
        $discount->percentage = $request->percentage;
        $discount->start_at = $request->start_at; 
        $discount->end_at = $request->end_at; 
        $discount->save();

        $discountLangId = $discount->discountLang()->id;

        $discountLang = discountLang::find($discountLangId);
        $discountLang->reference = $request->reference; 
        $discountLang->description = $request->description; 
        $discountLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $discountLang->save(); 
        if(isset($request->products)){
            $discount->products()->detach();
            foreach($request->products as $Product)
            {
                $discount->products()->attach($Product,['quantity'=> 1]);
    
            }
        }
        return redirect('discounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($discount)
    {
        // récupérer photo
        $discount = discount::findOrFail($discount);
        if($discount->start_at<date('Y-m-d h:s:00') && $discount->end_at > date('Y-m-d h:s:00'))
        {
            $messages['error'] = 'discount can\'t be deleted it\'s current !!';
            return  redirect('discounts')
                        ->with('messages',$messages);
        }
        $discount->delete();
        $messages['success'] = 'discount has been deleted successfuly !!';
        return redirect('discounts')
                    ->with('messages', $messages);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'discounts' => 'required',
        ]);
        $e=$s=0;
        $messages = [];
        foreach($request->discounts as $discount)
        {
            $discount = discount::findOrFail($discount);
            if($discount->start_at<date('Y-m-d h:s:00') && $discount->end_at > date('Y-m-d h:s:00')) {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' discount' : ' discounts') . ' can\'t be deleted it\'s current';
            }
            else 
            {
                $s++;
                $discount->delete();
                $messages['success'] = $s. ($s == 1 ? ' discount' :' discounts') .' has been deleted successfuly';
            }
        }

        return redirect('discounts')
                        ->with('messages', $messages);
    }
    public function restore($Discount)
    {
        $discount = Discount::onlyTrashed()->where('id', $Discount)->first();
        $discount->restore();
        $messages['success'] = 'discount has been restored successfuly !!';
        return redirect('discounts')->with('messages',$messages);
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'discounts' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->discounts as  $discount)
        {
            $discount = discount::onlyTrashed()->where('id', $discount)->first();
            $discount->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' discount' :' discounts') .' has been restored successfuly';
        }
        return redirect('discounts')->with('messages',$messages);
    }
    /**
     * 
     */
    public function trash () {
        $data['discounts'] = discount::onlyTrashed()->get();
        return view('discounts.backoffice.partner.trash',$data);
    }

    /**
     * 
     */
    public function translations ($discount) {
        $data["languages"] =  Language::all();
        $data["discount"] = discount::findOrFail($discount);
        return view('discounts.backoffice.partner.translations', $data);
    }
}
