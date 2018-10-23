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
        // return $data['tags'][0]->tagLang();
        return view('tags.backoffice.staff.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('tags.backoffice.staff.create', $data);
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

        $trashedTagLang = TagLang::onlyTrashed()->where('tag', $request->tag)->first();
        if(isset($trashedTagLang))
        {
            return redirect('tags/'.$trashedTagLang->Tag_id);
        }

        $tag = new Tag();
        $tag->save(); 

         // Add LANGUAGES 
         foreach(Language::all() as $lang)
         {
            $tagLang = new TagLang();
            $tagLang->tag = ($lang->id == $request->language) ? $request->tag : ""; 
            $tagLang->tag_id = $tag->id; 
            $tagLang->lang_id = $lang->id;
            $tagLang->save();
         }
        
        return  $tag;
    }
     /**
     * 
     */
    public function storeWithRedirect(Request $request) {
        $tag = self::store($request);
        return redirect('tags/'.$tag->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $tag = self::store($request);
        return redirect('tags/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        $data['tag'] = Tag::findOrFail($tag);
        $data['languages'] = Language::all();
        $data['products'] = $data['tag']->products;
        return view('tags.backoffice.staff.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {
        $data['tag'] = Tag::findOrFail($tag);
        return view('tags.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Tag)
    {
        $request->validate([
            'tag' => 'required|unique:tag_langs,tag,'.$Tag.',tag_id',
            ]);
        $tag = Tag::findOrFail($Tag);
        $tagLangId = $tag->tagLang()->id;
        $tagLang = TagLang::findOrFail($tagLangId);
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
        if(isset($tag->product[0]))
        {
            $messages['error'] = 'tag can\'t be deleted it has products !!';
            return  redirect('tags')
                        ->with('messages',$messages);
        }
        $tag->delete();
        $messages['success'] = 'tag has been deleted successfuly !!';
        return redirect('tags')
                    ->with('messages', $messages);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'tags' => 'required',
        ]);
        $e=$s=0;
        $messages = [];
        foreach($request->tags as $tag)
        {
            $tag = Tag::findOrFail($tag);
            if(!isset($tag->products[0])) {
                $s++;
                $tag->delete();
                $messages['success'] = $s. ($s == 1 ? ' tag' :' tags') .' has been deleted successfuly';
            }
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' tag' : ' tags') . ' can\'t be deleted it has a relation with products';
            }
        }

        return redirect('tags')
                        ->with('messages', $messages);
    }

    public function restore($tag)
    {
        $tag = Tag::onlyTrashed()->where('id', $tag)->first();
        $tag->restore();
        $messages['success'] = 'tag has been restored successfuly !!';
        return redirect('tags')->with('messages',$messages);
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'tags' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->tags as  $tag)
        {
            $tag = Tag::onlyTrashed()->where('id', $tag)->first();
            $tag->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' tag' :' tags') .' has been restored successfuly';
        }
        return redirect('tags')->with('messages',$messages);
    }

    /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data['tags'] = Tag::onlyTrashed()->get();
        return view('tags.backoffice.staff.trash', $data);
    }

    /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function translations($tag)
    {
        $data['languages'] = Language::all();
        $data['tag'] = Tag::findOrFail($tag);
        return view('tags.backoffice.staff.translations', $data);
    }
    
}
