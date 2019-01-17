<?php

namespace App\Http\Controllers;

use App\AttributeValue;
use Illuminate\Http\Request;
use Ajax;

class AttributeValueController extends Controller
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
            // 'name' => 'required|unique:partners,name',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $attribute = null;
        $name_container = 'values_container';
        if(isset($request->attribute)) $attribute = $request->attribute;
        if(isset($request->name_container)) $name_container = $request->name_container;
        
        Ajax::appendView($name_container);
        return Ajax::view('attributes.backoffice.partners.components.value', [
                'attribute' => $attribute,
				'name_container' => str_random(40),
				'attributes' => Attribute::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attribute_value  $attribute_value
     * @return \Illuminate\Http\Response
     */
    public function show(attribute_value $attribute_value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attribute_value  $attribute_value
     * @return \Illuminate\Http\Response
     */
    public function edit(attribute_value $attribute_value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attribute_value  $attribute_value
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attribute_value $attribute_value)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attribute_value  $attribute_value
     * @return \Illuminate\Http\Response
     */
    public function destroy(attribute_value $attribute_value)
    {
        //
    }
}
