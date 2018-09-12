<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
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
            'reference' => 'required|unique:categorie_langs,reference',
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
        $data['categories'] = Categorie::all();

        return view('categories.backoffice.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.backoffice.create');
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

        $Categorie = new Categorie();
        $Categorie->save(); 

        $CategorieLang = new CategorieLang();
        $CategorieLang->reference = $request->reference; 
        $CategorieLang->description = $request->description; 
        $CategorieLang->Categorie_id = $Categorie->id; 
        $CategorieLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $CategorieLang->save();
        
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $Categorie
     * @return \Illuminate\Http\Response
     */
    public function show($Categorie)
    {
        
        $data['Categorie'] = Categorie::find($Categorie);
        return 1;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $Categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($Categorie)
    {

        $data['Categorie'] = Categorie::find($Categorie);
        return view('categories.backoffice.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $Categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Categorie)
    {
        $this->validateRequest($request);
        
        $Categorie = Categorie::find($Categorie);
        $CategorieLangId = $Categorie->CategorieLang->first()->id;

        $CategorieLang = CategorieLang::find($CategorieLangId);
        $CategorieLang->reference = $request->reference; 
        $CategorieLang->description = $request->description; 
        $CategorieLang->Categorie_id = $Categorie->id;
        $CategorieLang->lang_id = Language::where('symbol',App::getLocale())->first()->id;
        $CategorieLang->save(); 
        
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $Categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($Categorie)
    {
        // récupérer photo
        $Categorie = Categorie::findOrFail($Categorie);
       $Categorie->delete();
       return redirect('categories');

    }
}
