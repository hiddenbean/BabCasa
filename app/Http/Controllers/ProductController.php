<?php

namespace App\Http\Controllers;

use Auth;
use App;
use Ajax;

use App\Tag;
use App\Product;
use App\Picture;
use App\Partner;
use App\Language;
use App\Category;
use App\DetailValue;
use App\Productlang;
use App\productValue;
use App\DetailValueLang;
use App\productDateValue;
use App\productDoubleValue;
use App\productVarcharValue;
use App\productVarcharValueLang;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductLangController;
use App\Http\Controllers\productValueController;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:staff,partner,business');
        
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
            'reference' => 'required|unique:product_langs,reference',
            'short_description' => 'required|required|max:306',
            'description' => 'required|required|max:3000',
            'categories' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Auth::guard('partner')->user()->products;
        //  return $data;
        return view('products.backoffice.partners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
		$data['children_categories'] = Category::where('category_id', null)->get();
        $array = [];
        foreach($data['children_categories'] as $category)
        {
            $category['level'] = '';
            array_push($array, $category);
            $array = $this->toArray($array,$category); 
        }
		$data['categories'] = $array;
		
        $data['tags'] = Tag::all();
        // return $data['tags']->first()->tagLang->first()->tag; 
        $data['languages'] = Language::all();
        $data['products'] = product::all();
        return view('products.backoffice.partners.create',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pic(Request $request)
    {
		return dd(1);
		// Ajax::redrawView('pics'); 
        // return Ajax::view('products.backoffice.partners.create',$data);
	}
	
	public function storeWithRedirect(Request $request) {
		return $request;
        $product = self::store($request);
        return redirect('products/'.$product->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $product = self::store($request);
        return redirect('products/create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        return $request->detail_val;
        $products = [];
        $products = json_decode($request->attribures);

        $this->validateRequest($request);

        $product = new Product();
        
        $product->price = $request->price;
        $product->currency_id = $request->currency_id;
        $product->quantity = $request->quantity;
        $product->for_business = ($request->for_business=='on') ? 1 : 0;
        $product->save();

        if($request->categories)
        {
            foreach($categories as $category)
            {
                $product->Categories()->attach($category);

            }

        }
        
        $productlang = new Productlang();
        $productlang->reference = $request->reference;
        $productlang->short_description = $request->short_description;
        $productlang->description = $request->description;
        $productlang->product_id = $product->id;
        $productlang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $productlang->save();
        // $pictureController = new PictureController();
        // $pictureController->validateRequest($request);
        
        
        ///////// ADD PICTURES
        foreach($request->product_pictures as $product_picture) {
            
            $picture = Picture::create([
                'name' => time().'.'.$product_picture->getClientOriginalExtension(),
                'tag' => "products_value",
                'path' => $product_picture->store('images/products', 'public'),
                'extension' => $product_picture->extension(),
                'pictureable_type' => 'Product',
                'pictureable_id' => $product->id,
            ]);
            
        }
        ///////// ADD DETAILS
        foreach($request->detail_val as $k => $value) {
            
            $detailValue = new DetailValue();
            $detailValue->detail_id = $request->detail_id[$k];
            $detailValue->product_id = $product->id;
            $detailValue->save();
            
            $detailValueLang = new DetailValueLang();
            $detailValueLang->value = $value;
            $detailValueLang->detail_value_id = $detailValue->id;
            $detailValueLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
            $detailValueLang->save();
            
        }
        ///////// ADD TAGS
        foreach($request->tag_id as $tag) {
            
            $product->tags()->attach($tag);

        }
        $variantPictures = $request->variant_pictures;

        $this->getGenerations($products, $product->id, $variantPictures);
    }

    
    public function getGenerations($products, $productId, $variantPictures, $currGeneration = 0, $result = array(), $parentId = null)
    {
        $currGeneration++;
        //    dd($products[0]->picture);
            foreach($products as $k => $v) {
                $product = $v;
                if(isset($product->children))
            {
                $productValue = new productValue();
                $productValue->product_id = $productId;
                $productValue->product_id = $product->attr;
                $productValue->product_value_id = $parentId;
                $productValue->save();
                // echo $product->attr.'<br>';
                $this->productValueContent($productValue->id,$product->value , $product->attr );
                
                // unset($product->children);
                // dd($product);
                $result[$currGeneration][$k] = $product;
                    $this->getGenerations($v->children,$productId, $variantPictures, $currGeneration, $result,$productValue->id);
            //     return;
            }
            else 
            {
                // dd($k);
                $productValue = new productValue();
                $productValue->product_id = $productId;
                $productValue->product_id = $product->attr;
                $productValue->currency_id =  $product->currency_id;
                $productValue->price =  $product->price;
                $productValue->quantity =  $product->quantity;
                $productValue->product_value_id = $parentId;
                $productValue->save();
                if(isset($product->picture))
                {
                    $this->picture($variantPictures[$product->picture],$productValue->id);
                }
                // echo $product->attr.'<br>';
                $this->productValueContent($productValue->id,$product->value , $product->attr );
            }
        }
             return $result;
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function productValueContent($productValueId,$value,$productId)
    {
        $type = product::find($productId)->type;
        $value = str_replace("- ","",$value);
        switch ($type) {
            case 'varchar':
                
                $productVarcharValue = new productVarcharValue();
                $productVarcharValue->product_value_id = $productValueId;
                $productVarcharValue->save();

                $productVarcharValueLang = new productVarcharValueLang();
                $productVarcharValueLang->value = $value;
                $productVarcharValueLang->product_varchar_value_id = $productVarcharValue->id;
                $productVarcharValueLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
                $productVarcharValueLang->save();
                
                break;
            case 'double':

                $productDoubleValue = new productDoubleValue();
                $productDoubleValue->value = (double)$value;
                $productDoubleValue->product_value_id = $productValueId;
                $productDoubleValue->save();
                break;
            case 'date':

                $productDateValue = new productDateValue();
                $productDateValue->value = strtotime($value);
                $productDateValue->product_value_id = $productValueId;
                $productDateValue->save();
                break;
        }
    }

    public function picture($picture,$productValueId)
    {
        if($picture) 
        {
            $picture = Picture::create([
                'name' => time().'.'.$picture->getClientOriginalExtension(),
                'tag' => "products_value",
                'path' => $picture->store('images/products', 'public'),
                'extension' => $picture->extension(),
                'pictureable_type' => 'productValue',
                'pictureable_id' => $productValueId,
            ]);
        }
        
    }
    public function show($product)
    {
        return view('products.backoffice.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $data['product'] = Product::find($product);
        $data['Categorys'] = $data['product']->Categorys;
        $data['pictures'] = $data['product']->pictures;
        $data['tags'] = $data['product']->tags;
        $data['detail_values'] = $data['product']->detailValues;

        return view('edit_product',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

    /**
     * 
     * 
     */
    public function trash() {
        return view('products.backoffice.partners.trash');
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
}
