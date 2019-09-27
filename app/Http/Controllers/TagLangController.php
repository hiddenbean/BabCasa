<?php

namespace App\Http\Controllers;

use App\TagLang;
use App\Tag;
use Illuminate\Http\Request;

class TagLangController extends Controller
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
     * @param  \App\tag_lang  $tag_lang
     * @return \Illuminate\Http\Response
     */
    public function show(tag_lang $tag_lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag_lang  $tag_lang
     * @return \Illuminate\Http\Response
     */
    public function edit(tag_lang $tag_lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag_lang  $tag_lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Tag)
    {
        $tag = Tag::findOrFail($Tag);
       foreach($request->tags as $key => $tagValue)
       {
        $tagLang = $tag->tagLangs->where('lang_id',$request->languages_id[$key])->first();
        if(!isset($tagLang))
            {
                $tagLang = new TagLang();
                $tagLang->tag_id = $tag->id;
                $tagLang->lang_id = $request->languages_id[$key];
            }
           if($tagValue != '')
           {
                $tagLang->tag = $tagValue;
            }
            else
            {
                $tagLang->tag = '';

            }
            $tagLang->save();
       }
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag_lang  $tag_lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag_lang $tag_lang)
    {
        //
    }
}
