<?php

namespace App\Http\Controllers;

use App\Condition;
use App\ConditionLang;
use Illuminate\Http\Request;

class ConditionLangController extends Controller
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
     * @param  \App\ConditionLang  $conditionLang
     * @return \Illuminate\Http\Response
     */
    public function show(ConditionLang $conditionLang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConditionLang  $conditionLang
     * @return \Illuminate\Http\Response
     */
    public function edit(ConditionLang $conditionLang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConditionLang  $conditionLang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $condition)
    {
        // return $request;
        $condition = condition::find($condition);
        foreach($request->references as $key => $reference)
        {
            $conditionLang = $condition->conditionLangs->where('lang_id',$request->languages_id[$key])->first();
            if(!isset($conditionLang))
            {
                $conditionLang = new conditionLang();
                $conditionLang->condition_id = $condition->id;
                $conditionLang->lang_id = $request->languages_id[$key];
            }

            if($reference != '')
            {
                $conditionLang->reference = $reference;
                $conditionLang->description = $request->descriptions[$key];
                }
                else
                {
                $conditionLang->reference = '';
                $conditionLang->description = '';
    
                }
                $conditionLang->save();
            
            
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConditionLang  $conditionLang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConditionLang $conditionLang)
    {
        //
    }
}
