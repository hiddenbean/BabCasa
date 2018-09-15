<?php

namespace App\Http\Controllers;

use App;
use App\Tag;
use App\Product;
use App\Picture;
use App\Language;
use App\Attribute;
use App\Currencie;
use App\Category;
use App\DetailValue;
use App\Productlang;
use App\AttributeValue;
use App\DetailValueLang;
use App\AttributeDateValue;
use App\AttributeDoubleValue;
use App\AttributeVarcharValue;
use App\AttributeVarcharValueLang;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductLangController;
use App\Http\Controllers\AttributeValueController;

class ProductController extends Controller
{

    
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
            'lang_id' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data['Categories'] = Category::all();
        $data['tags'] = Tag::all();
        // return $data['tags']->first()->tagLang->first()->tag; 
        $data['languages'] = Language::all();
        $data['currencies'] = Currencie::all();
        return view('add_product',$data);
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
        $attributes = [];
        $attributes = json_decode($request->attribures);

        $this->validateRequest($request);

        $product = new Product();
        
        $product->price = $request->price;
        $product->currency_id = $request->currency_id;
        $product->quantity = $request->quantity;
        $product->for_business = ($request->for_business=='on') ? 1 : 0;
        $product->save();

        $product->Categories()->attach($request->Category_id);
        
        $productlang = new Productlang();
        $productlang->reference = $request->reference;
        $productlang->short_description = $request->short_description;
        $productlang->description = $request->description;
        $productlang->product_id = $product->id;
        $productlang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $productlang->save();
        // $pictureController = new PictureController();
        // $pictureController->validateRequest($request);
        
        
        ///////// ADD PICTURES
        foreach($request->product_pictures as $product_picture) {
            
            $picture = Picture::create([
                'name' => time().'.'.$product_picture->getClientOriginalExtension(),
                'tag' => "attributes_value",
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
            $detailValueLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
            $detailValueLang->save();
            
        }
        ///////// ADD TAGS
        foreach($request->tag_id as $tag) {
            
            $product->tags()->attach($tag);

        }
      $variantPictures = $request->variant_pictures;

      
       $this->getGenerations($attributes, $product->id, $variantPictures);
    }
   public function getGenerations($attributes, $productId, $variantPictures, $currGeneration = 0, $result = array(), $parentId = null)
    {
        $currGeneration++;
        //    dd($attributes[0]->picture);
           foreach($attributes as $k => $v) {
               $attribute = $v;
               if(isset($attribute->children))
            {
                $attributeValue = new AttributeValue();
                $attributeValue->product_id = $productId;
                $attributeValue->attribute_id = $attribute->attr;
                $attributeValue->attribute_value_id = $parentId;
                $attributeValue->save();
                // echo $attribute->attr.'<br>';
                $this->attributeValueContent($attributeValue->id,$attribute->value , $attribute->attr );
                
                // unset($attribute->children);
                // dd($attribute);
                $result[$currGeneration][$k] = $attribute;
                    $this->getGenerations($v->children,$productId, $variantPictures, $currGeneration, $result,$attributeValue->id);
                  
            //     return;
            }
            else 
            {
                // dd($k);
                $attributeValue = new AttributeValue();
                $attributeValue->product_id = $productId;
                $attributeValue->attribute_id = $attribute->attr;
                $attributeValue->currency_id =  $attribute->currency_id;
                $attributeValue->price =  $attribute->price;
                $attributeValue->quantity =  $attribute->quantity;
                $attributeValue->attribute_value_id = $parentId;
                $attributeValue->save();
                if(isset($attribute->picture))
                {
                    $this->picture($variantPictures[$attribute->picture],$attributeValue->id);
                }
                // echo $attribute->attr.'<br>';
                $this->attributeValueContent($attributeValue->id,$attribute->value , $attribute->attr );
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
    public function attributeValueContent($attributeValueId,$value,$attributeId)
    {
        $type = Attribute::find($attributeId)->type;
        $value = str_replace("- ","",$value);
        switch ($type) {
            case 'varchar':
                
                $attributeVarcharValue = new AttributeVarcharValue();
                $attributeVarcharValue->attribute_value_id = $attributeValueId;
                $attributeVarcharValue->save();

                $attributeVarcharValueLang = new AttributeVarcharValueLang();
                $attributeVarcharValueLang->value = $value;
                $attributeVarcharValueLang->attribute_varchar_value_id = $attributeVarcharValue->id;
                $attributeVarcharValueLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
                $attributeVarcharValueLang->save();
                
                 break;
            case 'double':

                $attributeDoubleValue = new AttributeDoubleValue();
                $attributeDoubleValue->value = (double)$value;
                $attributeDoubleValue->attribute_value_id = $attributeValueId;
                $attributeDoubleValue->save();
                break;
            case 'date':

                $attributeDateValue = new AttributeDateValue();
                $attributeDateValue->value = strtotime($value);
                $attributeDateValue->attribute_value_id = $attributeValueId;
                $attributeDateValue->save();
                break;
        }
    }

    public function picture($picture,$attributeValueId)
    {
        if($picture) 
        {
            $picture = Picture::create([
                'name' => time().'.'.$picture->getClientOriginalExtension(),
                'tag' => "attributes_value",
                'path' => $picture->store('images/products', 'public'),
                'extension' => $picture->extension(),
                'pictureable_type' => 'AttributeValue',
                'pictureable_id' => $attributeValueId,
            ]);
        }
        
    }
    public function show(product $product)
    {
        //
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

        // return $data['Categorys']->first()->details->first()->detailLang->first()->value;
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
}
