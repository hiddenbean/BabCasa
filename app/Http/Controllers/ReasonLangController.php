<?php

namespace App\Http\Controllers;

use App\ReasonLang;
use App\Reason;
use Illuminate\Http\Request;

class ReasonLangController extends Controller
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
     * @param  \App\ReasonLang  $reasonLang
     * @return \Illuminate\Http\Response
     */
    public function show(ReasonLang $reasonLang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReasonLang  $reasonLang
     * @return \Illuminate\Http\Response
     */
    public function edit(ReasonLang $reasonLang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReasonLang  $reasonLang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reason)
    {
           // return $request;
           $reason = Reason::find($reason);
           foreach($request->references as $key => $reference)
           {
               $reasonLang = $reason->reasonLangs->where('lang_id',$request->languages_id[$key])->first();
               if(!isset($reasonLang))
               {
                   $reasonLang = new reasonLang();
                   $reasonLang->reason_id = $reason->id;
                   $reasonLang->lang_id = $request->languages_id[$key];
               }
   
               if($reference != '')
               {
                   $reasonLang->reference = $reference;
                   $reasonLang->description = $request->descriptions[$key];
                   }
                   else
                   {
                   $reasonLang->reference = '';
                   $reasonLang->description = '';
       
                   }
                   $reasonLang->save();
               
               
           }
           return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReasonLang  $reasonLang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReasonLang $reasonLang)
    {
        //
    }
}
