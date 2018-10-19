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
        $data['languages'] = Language::all();
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
        $attributeLangTrashed = AttributeLang::onlyTrashed()->where('reference', $request->reference)->first();
        if(isset($attributeLangTrashed))
        {
            return redirect('attributes/'.$attributeLangTrashed->attribute_id);
        }
        $this->validateRequest($request);
        // return  $request;
        $attribute = new Attribute();
        $attribute->type = $request->type; 
       
        $attribute->save();

        foreach(Language::all() as $lang)
        {
            $attributeLang = new AttributeLang();
            $attributeLang->attribute_id = $attribute->id;
            $attributeLang->lang_id = $lang->id;
            if($lang->id == $request->language)
            {
                $attributeLang->reference = $request->reference;
                $attributeLang->description = $request->description;
            }
            else
            {
                $attributeLang->reference = ' ';
                 $attributeLang->description = '';
               
            }
            $attributeLang->save();
       
        } 
        if($request->categories)
        {
            foreach($request->categories as $category)
            {
                $attribute->categories()->attach($category);
            } 
        }
        
        return redirect('attributes');
    }


    public function restore($attribute)
    {
         $attribute = Attribute::onlyTrashed()->where('id', $attribute)->first();
        $attribute->restore();
         return redirect('attributes');
       
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'attribute' => 'required',
        ]);

        foreach ($request->attribute as  $attr)
         {
            $attribute = attribute::onlyTrashed()->where('id', $attr)->first();
           $attribute->restore();
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
        $data['attribute'] = Attribute::withTrashed()->find($attribute);
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
        if(isset($attribute->attributeValue[0]))
        {
            return redirect('attributes')
                                ->with(
                                    'error',
                                    'attribute can\'t be deleted it is related with values !!'
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
            
            if(isset($attribute->attributeValue[0])) {$cantDelete = true;$error = true;}
    
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
                'Attribute can\'t be deleted it is related with values '
            );
        }
    }

    public function trash()
    {
        $data['attributes'] = Attribute::onlyTrashed()->get();
        //return $data;
        return view('attributes.backoffice.staff.trash', $data);
    }

    /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function translations($attribute)
    {
        $data['attribute'] = Attribute::findOrFail($attribute);
        $data['languages'] = Language::all();

        return view('attributes.backoffice.staff.translations', $data);
    }

}
