<?php

namespace App\Http\Controllers;

use App;
use App\Picture;
use App\Category;
use App\Language;
use App\Detail;
use App\Attribute;
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
            'reference' => 'required',
            'category_parent' => 'sometimes',
            'details' => 'sometimes',
            'attribute' => 'sometimes',
            'path' => 'sometimes',
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
        $data['children_categories'] = Category::where('category_id', null)->get();
        $array = [];
        foreach($data['children_categories'] as $category)
        {
            $category['level'] = '';
            array_push($array, $category);
            $array = $this->toArray($array,$category); 
        }
        $data['categories'] = $array;
        // return $data;
        return view('categories.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        $data['categories'] = Category::all();
        $data['details'] = Detail::all();
        $data['attributes'] = Attribute::all();
        
        $data['children_categories'] = Category::where('category_id', null)->get();
        $array = [];
        foreach($data['children_categories'] as $category)
        {
            $category['level'] = '';
            array_push($array, $category);
            $array = $this->toArray($array,$category); 
        }
        $data['categories'] = $array;
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
        if($this->checkReference($request))
        {
            return redirect('categories')
                                        ->with(
                                            'error',
                                            $request->reference.' already exists on the same level.' 
                                        );
        }
        $trashed_category_lang = CategoryLang::onlyTrashed()->where('reference', $request->reference)->first();
        if($trashed_category_lang)
        {
            $category = $trashed_category_lang->category;
            if($category->category_id == $request->category_parent)
            {
                $this->restore($category->id);
                return redirect('categories')
                                            ->with(
                                                'success',
                                                'Category has been restored from archive successfuly !!'
                                            );
            }
            else
            {
                $category = new Category();
            }
        }
        else
        {   
            $category = new Category();
        }
        $request->category_parent ? $category->category_id = $request->category_parent : null ;
        
        
        $category->save(); 

        if($request->hasFile('path')) 
        {
            $picture = Picture::create([
                'name' => time().'.'.$request->file('path')->extension(),
                'tag' => "category",
                'path' => $request->file('path')->store('images/categories', 'public'),
                'extension' => $request->file('path')->extension(),
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

        if(isset($request->category_children))
        {
            foreach($request->category_children as $child)
            {
                if($child != $request->category_parent)
                {
                    $sub_category = Category::findOrFail($child);
                    $sub_category->category_id = $category->id;
                    $sub_category->save();
                }
            }
        }

        foreach($request->details as $detail)
        {
            if($detail != null)
            {
                $category->details()->attach($detail);
            }
        }

        foreach($request->attribute as $attr)
        {
            if($attr != null)
            {
                $category->attributes()->attach($attr);
            }
        }
        
        return redirect('categories')->with(
            'success',
            'Category has been added successfuly !!'
        );
    }

    public function checkReference($request)
    {
        if($request->category_parent)
        {
            $cats = Category::find($request->category_parent)->subCategories;
        }
        else 
        {
            $cats = Category::where('category_id',NULL)->get();
        }
        $find = false;
        if(isset($cats[0]))
        {
            
            foreach($cats as $cat)
            {
                if($cat->categoryLang()->reference == $request->reference) $find=true;
            }
            if($find) 
            {
                return  $find;
            }
        }
        return $find;
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
        $data['sub_categories'] = $data['category']->subCategories;
        $array = [];
        foreach($data['sub_categories'] as $category)
        {
            $category['level'] = '-';
            array_push($array, $category);
            $array = $this->toArray($array,$category, $category['level']); 
        }
        $data['sub_categories'] = $array;
        return view('categories.backoffice.staff.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $data['category'] = Category::find($category);
        $data['details'] = Detail::all();
        $data['attributes'] = Attribute::all();
        $data['root_categories'] = Category::where('id', '!=', $data['category']['id'])->where('category_id', null)->get();
        $array = [];
        foreach($data['root_categories'] as $category)
        {
            $category['level'] = '';
            array_push($array, $category);
            $array = $this->toArray($array,$category); 
        }
        
        $array = $this->toArray($array,$data['category']);
        $data['categories'] = $array;
        return view('categories.backoffice.staff.edit',$data);
    }

    public function toArray($array, $category, $level = '')
    {
        $level = $level.'-';
        foreach($category->subCategories()->get() as $subCategory)
        {
            $subCategory['level'] = $level;
            array_push($array, $subCategory);
            $array = $this->toArray($array,$subCategory, $level);
        }
        return $array;
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
            'reference' => 'required',
            'category_parent' => 'sometimes',
            'details' => 'sometimes',
            'attribute' => 'sometimes',
            'path' => 'sometimes',
        ]);

        $category = Category::find($category);
        $request->category_parent == 0 ? $category_parent = null : $category_parent = $request->category_parent;
        $category->category_id = $category_parent; 
        $category->save();
        
        if($request->hasFile('path')) 
        {
            if(isset($category->picture))
            {
                $picture = $category->picture;
            }
            else
            {
                $picture = new Picture();
                $picture->pictureable_type = 'category';
                $picture->pictureable_id = $category->id;
            }
            $picture->name =time().'.'.$request->file('path')->extension();
            $picture->tag = "category";
            $picture->path = $request->file('path')->store('images/categories', 'public');
            $picture->extension = $request->file('path')->extension();
            $picture->save();
        }

        $category_lang = $category->categoryLang();
        $category_lang->reference = $request->reference;
        $category_lang->description = $request->description;
        $category_lang->category_id = $category->id;
        $category_lang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $category_lang->save();

        $category->subCategories()->update(['category_id'=> null]);
        if(isset($request->category_children))
        {
            foreach($request->category_children as $child)
            {
                $sub_category = Category::findOrFail($child);
                $sub_category->category_id = $category->id;
                $sub_category->save();
            }
        }
        
        $category->details()->detach();
        $category->attributes()->detach();
        if($request->details)
        {
            foreach($request->details as $detail)
            {
                if($detail != null)
                {
                    $category->details()->attach($detail);
                }
            }

        }
        if($request->attribute)
        {
            foreach($request->attribute as $attr)
            {
                if($attr != null)
                {
                    $category->attributes()->attach($attr);
                }
            }
        }
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

        if(isset($category->products[0]) || isset($category->bundles[0]) || isset($category->markets[0]))
        {
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
            $sub_category->delete();
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
                            'Categories has been deleted successfuly !!'
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
    public function restore($category)
    {
         $category = Category::onlyTrashed()->where('id', $category)->first();
        $category->restore();
         return redirect('categories');
       
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'categories' => 'required',
        ]);

        foreach ($request->categories as  $attr)
         {
            $category = Category::onlyTrashed()->where('id', $attr)->first();
           $category->restore();
        }
         return redirect('categories');
       
    }
      /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data['categories'] = Category::onlyTrashed()->get();
        return view('categories.backoffice.staff.trash', $data);
    }

     /**
     * Displaying the translations page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function translations($category)
    {
        $data['category'] = Category::findOrFail($category);
        $data['languages'] = Language::all();

        return view('categories.backoffice.staff.translations', $data);
    }

    
}
