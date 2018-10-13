<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Category;
use App\AttributeLang;
use App\Language;
use App;
use Illuminate\Http\Request;

class AttributeController extends Controller
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
            'reference' => 'required|unique:attribute_langs,reference',
            'type' => 'required',
            'description' => 'required|required|max:3000',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['attributes'] = Attribute::all();
        return view('attributes.backoffice.staff.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('attributes.backoffice.staff.create',$data);
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
        $attributeLangTrashed = AttributeLang::onlyTrashed()->where('reference', $request->reference)->first();

        if($attributeLangTrashed)
        {
            $attribute = $attributeLangTrashed->attribute;
            $attribute->restore();
            $attributeLang = $attribute->attributeLang->first();
        }
        else
        {
            $attribute = new Attribute();
            $attribute->type = $request->type; 
        }
        
        $attribute->save();
        if(!isset($attributeLang))
        {
            $attributeLang = new AttributeLang();
        }

        $attributeLang->reference = $request->reference;
        $attributeLang->description = $request->description;
        $attributeLang->attribute_id = $attribute->id;
        $attributeLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $attributeLang->save();
        //return $request->categories;
        if($request->categories)
        {
            foreach($request->categories as $category)
            {
                $attribute->categories()->attach($category);
            } 
        }
        
        return redirect('attributes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show($attribute)
    {
        $data['attribute'] = Attribute::find($attribute);
        $data['categories'] = Category::all();
        return view('attributes.backoffice.staff.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($attribute)
    {
        $data['attribute'] = Attribute::find($attribute);
        $data['categories'] = Category::all();
        return view('attributes.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attribute)
    {
        $request->validate([
            'reference' => 'required|unique:attribute_langs,reference,'.$attribute.',attribute_id',
            'type' => 'required',
            'description' => 'required|required|max:3000',
        ]);
        $Attribute = Attribute::find($attribute);
        $Attribute->type =  $request->type;
        $Attribute->save();
        $attributeLangId = $Attribute->attributeLang->first()->id;

        $attributeLang = AttributeLang::find($attributeLangId);
        $attributeLang->reference = $request->reference;
        $attributeLang->description = $request->description;
        $attributeLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $attributeLang->save();
        $Attribute->categories()->detach();
        if($request->categories)
        {
            
            foreach($request->categories as $category)
            {
                $Attribute->categories()->attach($category);
            } 
        }
        return redirect('attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($Attribute)
    {
        $attribute = Attribute::findOrFail($Attribute);
        if(isset($attribute->categories[0]))
        {
            return redirect('attributes')
                                ->with(
                                    'error',
                                    'attribute can\'t be deleted it is in an association with categories !!'
                                    );
        }
        $attribute->delete();
        return redirect('/attributes')
                            ->with(
                                'success',
                                'attribute deleted successfuly !!'
                                );
    }

    public function multiDestroy(Request $request)
    {
        $request->validate([
            'attribute' => 'required',
        ]);
        $error = false;
        foreach($request->attribute as $attr)
        {
            $attribute = Attribute::findOrFail($attr);
            $cantDelete = false;

            
            if(isset($attribute->categories[0])) {$cantDelete = true;$error = true;}
    
            if(!$cantDelete) 
                $attribute->delete();

        }
        if(!$error) 
        {
            return redirect('attributes')->with(
                            'success',
                            'Attribute has been deleted successfuly !!'
                );

        }
        else 
        {
            return redirect('attributes')->with(
                'error',
                'Attribute can\'t be deleted it has a relation with categories '
            );
        }
                        
    }

}
