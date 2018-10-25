<?php

namespace App\Http\Controllers;

use App\CategorieLang;
use App\Category;
use App\Language;
use Illuminate\Http\Request;

class CategoryLangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        
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
            'reference' => 'required|unique:category_langs,category',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();

        return view('categories.backoffice.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.backoffice.create');
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

        $Category = new Category();
        $Category->save(); 

        $CategoryLang = new CategoryLang();
        $CategoryLang->Category = $request->Category; 
        $CategoryLang->Category_id = $Category->id; 
        $CategoryLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $CategoryLang->save();
        
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show($Category)
    {
        
        $data['Category'] = Category::find($Category);
        return 1;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($Category)
    {

        $data['Category'] = Category::find($Category);
        return view('categories.backoffice.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Category)
    {
        $category = Category::withTrashed()->findOrFail($Category);
        $languages = Language::all();
        foreach($request->references as $key => $reference)
        {
            $category_lang = $category->categoryLangs()->where('lang_id',$languages[$key]->id)->first();
            $category_lang->reference = $reference;
            $category_lang->description = $request->descriptions[$key];
            $category_lang->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($Category)
    {
        // récupérer photo
        $Category = Category::findOrFail($Category);
       $Category->delete();
       return redirect('categories');

    }
}
