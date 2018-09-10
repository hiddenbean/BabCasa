<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productlang;
use App\Categorie;
use App\Language;
use App\Picture;
use App\Attribute;
use App\Currencie;
use App\AttributeValue;
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
        $data['categories'] = Categorie::all();
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
        $attributes = [];
        $attributes = json_decode($request->attribures);
        // $this->attributeValueContent(1,'64' , 2 );
        $this->validateRequest($request);
        // dd($attributes);
        $product = new Product();
        
        $product->price = $request->price;
        $product->currency_id = $request->currency_id;
        $product->quantity = $request->quantity;
        $product->for_business = ($request->for_business=='on') ? 1 : 0;
        $product->save();

        // $product->categories()->attach($request->categorie_id);

        $productlang = new Productlang();
        $productlang->reference = $request->reference;
        $productlang->short_description = $request->short_description;
        $productlang->description = $request->description;
        $productlang->product_id = $product->id;
        $productlang->lang_id = $request->lang_id;
        $productlang->save();
        // $pictureController = new PictureController();
        // $pictureController->validateRequest($request);
        //
      $pictures = $request->picture;

      
       $this->getGenerations($attributes, $product->id, $pictures);
    }
   public function getGenerations($attributes, $productId, $pictures, $currGeneration = 0, &$result = array(), $parentId = null)
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
                    $this->getGenerations($v->children,$productId, $pictures, $currGeneration, $result,$attributeValue->id);
                  
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
                    $this->picture($pictures[$attribute->picture],$attributeValue->id);
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
    public function edit(product $product)
    {
        //
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
