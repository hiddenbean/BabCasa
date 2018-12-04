<?php

namespace App\Http\Controllers;

use App\SubjectLang;
use App\subject;
use Illuminate\Http\Request;

class SubjectLangController extends Controller
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
     * @param  \App\SubjectLang  $subjectLang
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectLang $subjectLang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubjectLang  $subjectLang
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectLang $subjectLang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubjectLang  $subjectLang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {
           // return $request;
           $subject = subject::find($subject);
           foreach($request->references as $key => $reference)
           {
               $subjectLang = $subject->subjectLangs->where('lang_id',$request->languages_id[$key])->first();
               if(!isset($subjectLang))
               {
                   $subjectLang = new subjectLang();
                   $subjectLang->subject_id = $subject->id;
                   $subjectLang->lang_id = $request->languages_id[$key];
               }
   
               if($reference != '')
               {
                   $subjectLang->reference = $reference;
                   $subjectLang->description = $request->descriptions[$key];
                   }
                   else
                   {
                   $subjectLang->reference = '';
                   $subjectLang->description = '';
       
                   }
                   $subjectLang->save();
               
               
           }
           return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubjectLang  $subjectLang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectLang $subjectLang)
    {
        //
    }
}
