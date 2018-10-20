<?php

namespace App\Http\Controllers;

use App;
use App\Detail;
use App\Category;
use App\Language;
use App\DetailLang;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        $this->middleware('CanRead:detail'); //->except('index','create');
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
            'value' => 'required|unique:detail_langs,value',
        ]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['details'] = Detail::all();
        return view('details.backoffice.staff.index',$data);
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
        return view('details.backoffice.staff.create',$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trashedDetailLang = DetailLang::onlyTrashed()->where('value', $request->value)->first();
        if(isset($trashedDetailLang))
        {
            return redirect('details/'.$trashedDetailLang->detail_id);
        }

        $this->validateRequest($request);
        
        $detail = new Detail();
        $detail->save();

        // Add LANGUAGES 
        foreach(Language::all() as $lang)
        {
            $detailLang = new DetailLang();
            $detailLang->detail_id = $detail->id;
            $detailLang->lang_id = $lang->id;
            $detailLang->value = ($lang->id == $request->language) ? $request->value : "";
            $detailLang->save();
        }

        $categories[] = $request->categories;

        foreach($categories as $category)
        {
            $detail->categories()->attach($category);
        }
        return $detail;
    }

    /**
     * 
     */
    public function storeWithRedirect(Request $request) {
        $detail = self::store($request);
        return redirect('details/'.$detail->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $detail = self::store($request);
        return redirect('details/create');
    }
    
    public function restore($detail)
    {
        $detail = Detail::onlyTrashed()->where('id', $detail)->first();
        $detail->restore();
        return redirect('details');
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'details' => 'required',
        ]);

        foreach ($request->details as  $Detail)
        {
            $detail = Detail::onlyTrashed()->where('id', $Detail)->first();
            $detail->restore();
        }
        return redirect('details');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show($detail)
    {
        $data['detail'] = Detail::withTrashed()->find($detail);
        return view('details.backoffice.staff.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *  
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit($detail)
    {

        $data['detail'] = Detail::find($detail);
        //return $data['detail']->categories()->wherePivot('category_id',1)->first();
        $data['categories'] = Category::all();
        return view('details.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $detail)
    {
        $request->validate([
            'value' => 'required|unique:detail_langs,value,'.$detail.',detail_id',
            ]);
            $detail = Detail::find($detail);
            $detailLangId = $detail->detailLang->first()->id;

        $detailLang = DetailLang::find($detailLangId);
        $detailLang->value = $request->value; 
        $detailLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $detailLang->save(); 
        $detail->categories()->detach();
        foreach($request->categories as $category)
        {
            $detail->categories()->attach($category);
        } 
        
        return redirect('details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($detail)
    {
        // récupérer photo
        $detail = Detail::findOrFail($detail);
        if(isset($detail->detailValue))
        {
            return  redirect('details')
                        ->back()
                        ->with(
                            'error',
                            'Detail can\'t be deleted it has products !!' 
                        );
        }
        $detail->delete();
        return redirect('details')
                    ->with(
                        'success',
                        'Detail has been deleted successfuly !!'
                    );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'details' => 'required',
        ]);
        $e=$s=0;
        $messages = [];
        foreach($request->details as $Detail)
        {
            $detail = Detail::findOrFail($Detail);
            if(!isset($detail->detailValues[0])) {
                $s++;
                $detail->delete();
                $messages['success'] = $s. ($s == 1 ? ' detail' :' details') .' has been deleted successfuly';
            }
            else 
            {
                $e++;
                $messages['error'] = $e . ($e == 1 ? ' detail' : ' details') . ' can\'t be deleted it has a relation with products';
            }
        }

        return redirect('details')
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
        $data['details'] = Detail::onlyTrashed()->get();
        return view('details.backoffice.staff.trash', $data);
    }

    /**
     * Displaying the Trash page
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function translations($detail)
    {
        $data['detail'] = Detail::findOrFail($detail);
        $data['languages'] = Language::all();

        return view('details.backoffice.staff.translations', $data);
    }
}
