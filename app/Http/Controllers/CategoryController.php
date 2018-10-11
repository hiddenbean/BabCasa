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
            'reference' => 'required|unique:category_langs,reference,NULL,id,deleted_at,NULL',
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
        
        $trashed_category_lang = CategoryLang::withTrashed()->where('reference', $request->reference)->first();
        if($trashed_category_lang)
        {
            $category = $trashed_category_lang->category;
            $this->restore($category->id);
            $category_lang = $category->categoryLang->first();
        }
        else
        {   
            $category = new Category();
        }

        
        $request->category_id ? $category->category_id = $request->category_id : null ;
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
        if(!isset($category_lang))
        {
            $category_lang = new CategoryLang();
            $category_lang->category_id = $category->id;
            $category_lang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        }
        $category_lang->reference = $request->reference;
        $category_lang->description = $request->description;
        $category_lang->save();
        
        return redirect('categories')->with(
            'success',
            'Category has been added successfuly !!'
        );
    }

    public function restore($category_id)
    {
        $category = Category::withTrashed()->findOrFail($category_id);
        $category->restore();
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
            'reference' => 'required|unique:category_langs,reference,'.$category.',category_id',
            'description' => 'required|required|max:3000',
            'category_id' => 'sometimes',
        ]);
        
        $category = Category::find($category);
        $request->category_id == 0 ? $category_parent = null: $category_parent = $request->category_id;
        $category->category_id = $category_parent; 
        $category->save();
        
        if($request->hasFile('path')) {
            if(isset($category->picture))
            {
                $picture = $category->picture;
            }
            else
            {
                $picture = new Picture();
            }
            $picture->name =time().'.'.$request->file('path')->extension();
            $picture->tag = "category";
            $picture->path = $request->file('path')->store('images/categories', 'public');
            $picture->extension = $request->file('path')->extension();
            $picture->save();
        }

        $category_lang = $category->categoryLang->first();

        $category_lang->reference = $request->reference;
        $category_lang->description = $request->description;
        $category_lang->category_id = $category->id;
        $categoryLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $category_lang->save();
        
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
        $category = Category::findOrFail($Category);

        if(isset($category->products[0]) || isset($category->bundles[0]) || isset($category->markets[0])|| isset($category->details[0]) || isset($category->attributes[0]))
        {return $category->products;
            return  redirect()
                        ->back()
                        ->with(
                            'error',
                            'category can\'t be deleted it has products/bundles/markets !!' 
                        );
        }

        foreach($category->subCategories as $sub_category)
        {
            if(isset($sub_category->products[0]) || isset($sub_category->bundles[0]) || isset($category->markets[0]))
            {
                return  redirect()
                            ->back()
                            ->with(
                                'error',
                                'category can\'t be deleted it has a subcategory with products/bundles/markets !!'
                            );
            }
        }
        $category->delete();
        return redirect('categories')->with(
                            'success',
                            'Category has been deleted successfuly !!'
        );

    }

    // 'error',
    // 'category can\'t be deleted it has a subcategory with products/bundles/markets !!'
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'categories' => 'required',
        ]);
        $error = false;
        
        foreach($request->categories as $Category)
        {
            $cantDelete = false;

            $category = Category::findOrFail($Category);
    
            if(isset($category->products[0]) || isset($category->bundles[0]) || isset($category->markets[0]) ) {$cantDelete = true;$error = true;}
    
            foreach($category->subCategories as $sub_category)
            {
                if(isset($sub_category->products[0]) || isset($sub_category->bundles[0]) || isset($category->markets[0]) ) {$cantDelete = true;$error = true;}
    
            }
            if(!$cantDelete) 
                $category->delete();

        }
        if(!$error) 
        {
            return redirect('categories')->with(
                            'success',
                            'Category has been deleted successfuly !!'
             );

        }
        else 
        {
            return redirect('categories')->with(
                'error',
                'category can\'t be deleted it has a relation with products / bundles / markets / attributes'
            );
        }


    }
}
