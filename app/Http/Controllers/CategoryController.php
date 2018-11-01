<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Detail;
use App\Picture;
use App\Partner;
use App\Staff;
use App\Product;
use App\Category;
use App\Language;
use App\Attribute;
use App\CategoryLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CategoryNotification;

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
            'description' => 'required',
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
        $reference_check = $this->checkReference($request);
        if($reference_check)
        {
            $messages['error'] = $request->reference.' already exists on the same level.';
            return redirect('categories/'.$reference_check)
                                    ->with('messages', $messages);
        }
        $category = new Category();
        $request->category_parent ? $category->category_id = $request->category_parent : null ;
        $category->save();

        $this->notify($category, ' has added a new category ');

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
        $languages = Language::all();
        foreach($languages as $language)
        {
            $category_lang = new CategoryLang();
            if($language->id == $request->language)
            {
                $category_lang->reference = $request->reference;
                $category_lang->description = $request->description;
            }
            $category_lang->category_id = $category->id;
            $category_lang->lang_id = $language->id;
            $category_lang->save();
        }
        
        if(isset($request->category_children))
        {
            foreach($request->category_children as $child)
            {
                if($child != $request->category_parent && $child != $this->getSuperParent($request->category_parent))
                {
                    $sub_category = Category::findOrFail($child);
                    $sub_category->category_id = $category->id;
                    $sub_category->save();
                }
            }
        }
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
        
        return redirect('categories')->with(
            'success',
            'Category has been added successfuly !!'
        );
    }

    public function notify($category, $data)
    {
         $partners = Partner::whereIn('id', function($query) use ($category) {
            $query->select('partner_id')->from('products')->whereIn('id', function($query) use ($category) {
                $query->select('product_id')->from('category_product')->whereIn('category_id', [$category->id, $category->category_id]);
            })->get();  
        })->get();

        $staff = Auth::guard('staff')->user();
        
        Notification::send($partners, new CategoryNotification($staff, $data, $category));
        $staff->notify(new CategoryNotification($staff, $data, $category));
    }

    /**
     * Check if there is a category on the same level with the same reference
     * This function checks the trashed once as well
     * 
     * @param Illuminte\Http\Request $request
     * @return boolean;
     */
    public function checkReference(Request $request)
    {
        if($request->category_parent)
        {
            $cats = Category::withTrashed()->findOrFail($request->category_parent)->subCategories;
        }
        else 
        {
            $cats = Category::withTrashed()->where('category_id',NULL)->get();
        }
        $found = false;
        if(isset($cats[0]))
        {
            foreach($cats as $cat)
            {
                if($cat->categoryLang()->reference == $request->reference)
                {
                    $found = $cat->id;
                    break;
                }
            }
        }
        return $found;
    }

    /**
     * Gets the category parent or the terminal of the category.
     * 
     * @param $category_id
     * @return integer
     */
    public function getSuperParent($parent)
    {
        $categopry = Category::findOrFail($parent);
        if(!$category->category_id)
        {
            $this->getSuperParent($category->category_id);
        }
        return $category->id;
    }

  
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $data['category'] = Category::withTrashed()->findOrFail($category);
        // return $data['category']->products->groupBy();
        $data['sub_categories'] = $data['category']->subCategories;
        $array = [];
        foreach($data['sub_categories'] as $category)
        {
            $category['level'] = '-';
            array_push($array, $category);
            $array = $this->toArray($array,$category, $category['level']); 
        }
        $data['sub_categories'] = $array;
        $data['products'] = $data['category']->products;
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
        $data['category'] = Category::withTrashed()->findOrFail($category);
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
        $level = $level.'– ';
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
            'description' => 'required',
            'category_parent' => 'sometimes',
            'details' => 'sometimes',
            'attribute' => 'sometimes',
            'path' => 'sometimes',
        ]);

        $category = Category::withTrashed()->findOrFail($category);
        $request->category_parent == 0 ? $category_parent = null : $category_parent = $request->category_parent;
        $category->update([
            'category_id' =>$category_parent,
        ]);
        
        return $this->notify($category, ' has updated the category ');
        
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

        $category->attributes()->detach();
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
    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        if(!isset($category->products[0]) && !isset($category->bundles[0]) && !isset($category->markets[0]) && !isset($category->subCategories[0])) {
            $category->delete();
            $this->notify($category, ' has deleted the category ');
            $messages['success'] = 'Category has been deleted successfuly';
        }
        else 
        {
            $messages['error'] = 'Category can\'t be deleted it has a relation with products';
        }
        return redirect('categories')
                        ->with('messages', $messages);
    }

    // 'error',
    // 'category can\'t be deleted it has a subcategory with products/bundles/markets !!'
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'categories' => 'required',
        ]);

        $e=$s=0;
        $messages = [];
        foreach($request->categories as $category_id)
        {
            $category = Category::findOrFail($category_id);
            if(!isset($category->products[0]) && !isset($category->bundles[0]) && !isset($category->markets[0]) && !isset($category->subCategories[0])) {
                $s++;
                $category->delete();
                $this->notify($category, ' has deleted the category ');
                $messages['success'] = $s. ($s == 1 ? ' category' :' categories') .' has been deleted successfuly';
            }
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' category' : ' categories') . ' can\'t be deleted it has a relation with products';
            }
            
        }
        
        return redirect('categories')
                        ->with('messages', $messages);
    }

    public function restore($category)
    {
        $category = Category::onlyTrashed()->where('id', $category)->first();
        $category->restore();
        $this->notify($category, ' has restored the category ');
        $messages['success'] = 'Category has been restored successfuly';
        return redirect('categories')
                        ->with('messages', $messages);
       
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'categories' => 'required',
        ]);
        $iteration = 0;
        foreach ($request->categories as  $attr)
         {
            $category = Category::onlyTrashed()->where('id', $attr)->first();
            $category->restore();
            $this->notify($category, ' has restored the category ');
            $iteration++;
        }
        $messages['success'] = $iteration. ($iteration > 1 ? ' categories' : ' category'). ' has been restored successfuly';
        return redirect('categories')
                        ->with('messages', $messages);
       
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
        $data['category'] = Category::withTrashed()->findOrFail($category);
        $data['languages'] = Language::all();

        return view('categories.backoffice.staff.translations', $data);
    }

    
}
