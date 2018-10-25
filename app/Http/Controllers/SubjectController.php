<?php

namespace App\Http\Controllers;
use App;
use App\Subject;
use App\SubjectLang;
use App\Language;
use Illuminate\Http\Request;
use Auth;
class SubjectController extends Controller
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
            'reference' => 'required|unique:subject_langs,reference,null,id,deleted_at,null',
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
        
        $data['subjects'] =Subject::all();

        return view('subjects.backoffice.staff.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // pour afficher un formulair
        return view('subjects.backoffice.staff.create');
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

        $subjectLangTrashed = SubjectLang::withTrashed()->where('reference', $request->reference)->first();

        if($subjectLangTrashed)
        {
            $subject = $subjectLangTrashed->subject;
            $subject->restore();
            $subjectLang = $subjectLangTrashed;
        }
        else
        {
            $subject = new Subject();
        }
        
        $subject->save();
        if(!isset($subjectLang))
        {
            $subjectLang = new SubjectLang();
        }

        $subjectLang->reference = $request->reference;
        $subjectLang->description = $request->description;
        $subjectLang->subject_id = $subject->id;
        $subjectLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $subjectLang->save();
        
        return redirect('subjects');
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
        $data['subject'] = Subject::findOrFail($subject);
        return view('subjects.backoffice.staff.show',$data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($subject)
    {
        $data['subject'] = Subject::findOrFail($subject);
        return view('subjects.backoffice.staff.edit',$data);
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
        $this->validateRequest($request);
        // Récupérer un sujet
        $subject = Subject::findOrFail($subject);

        $subjectLangId = $subject->subjectLang->first()->id;

        $subjectLang = SubjectLang::find($subjectLangId);
        $subjectLang->reference = $request->reference; 
        $subjectLang->description = $request->description; 
        $subjectLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $subjectLang->save(); 
        return redirect('subjects');
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
        $subject =Subject::findOrFail($subject);
        if(isset($subject->claims[0]))
        {
            return  redirect()
            ->back()
            ->with(
                'error',
                'subject can\'t be deleted it has claim(s) !!' 
            );
        }
        $subject->delete();
        return redirect('subjects');

    }
}
