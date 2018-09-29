<?php

namespace App\Http\Controllers;

use App;
use App\Picture;
use App\Category;
use App\Language;
use App\CategoryLang;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:staff');
         $this->middleware('CanRead:category'); //->except('index','create');
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
            'reference' => 'required|unique:Category_langs,reference',
            'description' => 'required|required|max:3000',
            'category_id' => 'sometimes',
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
        return view('categories.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();

        return view('categories.backoffice.staff.create',$data);
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
        $category = new Category();
        if($request->category_id>0)
        $category->category_id = $request->category_id; 

        $category->save(); 
        
        if($request->path)
        {
            $picture = Picture::create([
                'name' => time().'.'.$request->file('path')->extension(),
                'tag' => "category",
                'path' => $request->path->store('images/categories', 'public'),
                'extension' => $request->path->extension(),
                'pictureable_type' => 'category',
                'pictureable_id' => $category->id,
            ]);

        }

        $categoryLang = new CategoryLang();
        $categoryLang->reference = $request->reference; 
        $categoryLang->description = $request->description; 
        $categoryLang->category_id = $category->id; 
        $categoryLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $categoryLang->save();
        
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        
        $data['category'] = Category::find($category);
        return view('categories.backoffice.staff.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($Category)
    {
        $data['categories'] = Category::all();
        $data['category'] = Category::find($Category);
        return view('categories.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'reference' => 'required|unique:Category_langs,reference,'.$category.',category_id',
            'description' => 'required|required|max:3000',
            'category_id' => 'sometimes',
        ]);
        
        $category = Category::find($category);
        $category->category_id = $request->category_id; 
        $category->save();
        
        if(isset($category->picture))
        {
            $picture = $category->picture;
            if($request->hasFile('path')) {
                $picture->name =time().'.'.$request->file('path')->extension();
                $picture->tag = "category";
                $picture->path = $request->file('path')->store('images/categories', 'public');
                $picture->extension = $request->file('path')->extension();
                $picture->save(); 
    
            }
        }else{
            if($request->path)
            {
                $picture = Picture::create([
                    'name' => time().'.'.$request->file('path')->extension(),
                    'tag' => "category",
                    'path' => $request->path->store('images/categories', 'public'),
                    'extension' => $request->path->extension(),
                    'pictureable_type' => 'category',
                    'pictureable_id' => $category->id,
                ]);
    
            }
        }
        $categoryLangId = $category->categoryLang->first()->id;

        $categoryLang = CategoryLang::find($categoryLangId);
        $categoryLang->reference = $request->reference; 
        $categoryLang->description = $request->description; 
        $categoryLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $categoryLang->save(); 
        
        return redirect('categories');
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
