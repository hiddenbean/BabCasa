<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Partner;
use Illuminate\Http\Request;
use Auth;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $data['partner'] = Partner::where('name', $partner)->firstOrFail();
        $data['subjects'] =Subject::all();

        return view('subjects.backoffice.partner.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // pour afficher un formulair
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|unique:subjects,title',
        ]);
        // ajouter un sujet
        $subject = new Subject();
        $subject->title = $request->input('titre');
        $subject->description = $request->input('description');
        $subject->save();
        return redirect('sujets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {
        // Récupérer un sujet
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        $subject = Subject::where('title',$subject)->firstOrFail();
        return view('subjects.show', [
            'title' => $subject->title,
            'description' => $subject->description , 'partner' => $partner
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($subject)
    {
        // Récupérer un sujet
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $partner = Partner::where('name', $partner)->firstOrFail();
        $subject = Subject::where('title',$subject)->firstOrFail();
        return view('subjects.edit',['subject' => $subject ,'partner'=>$partner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$subject)
    {
        // Récupérer un sujet
        $subject = Subject::where('title',$subject)->firstOrFail();
        // condition pour valider le champs de modification
        if($request->input('titre') != $subject->title){
            $request->validate([
                'titre' => 'required|unique:subjects,title',
            ]);
        // modification de titre
        $subject->title = $request->input('titre');
        }
        // modification de description
        $subject->description = $request->input('description');
        $subject->save();
        return redirect('sujets/'.$subject->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject)
    {
        // Récupérer un sujet
        $subject =Subject::where('title',$subject)->firstOrFail();
        // La suprission des sujets
        $subject->delete();
        return redirect('sujets');

    }
}
