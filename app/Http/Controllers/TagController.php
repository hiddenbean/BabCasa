<?php

namespace App\Http\Controllers;

use App;
use App\Tag;
use App\TagLang;
use App\Language;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:staff');
         $this->middleware('CanRead:tag'); //->except('index','create');
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
            'tag' => 'required|unique:tag_langs,tag',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tags'] = Tag::all();

        return view('tags.backoffice.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.backoffice.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $tag = new Tag();
        $tag->save(); 

        $tagLang = new TagLang();
        $tagLang->tag = $request->tag; 
        $tagLang->tag_id = $tag->id; 
        $tagLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $tagLang->save();
        
        return redirect('tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        
        $data['tag'] = Tag::find($tag);
        return 1;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {

        $data['tag'] = Tag::find($tag);
        return view('tags.backoffice.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        $this->validateRequest($request);
        
        $tag = Tag::find($tag);
        $tagLangId = $tag->tagLang->first()->id;

        $tagLang = TagLang::find($tagLangId);
        $tagLang->tag = $request->tag; 
        $tagLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $tagLang->save(); 
        
        return redirect('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        // récupérer photo
        $tag = Tag::findOrFail($tag);
       $tag->delete();
       return redirect('tags');

    }
    
}
