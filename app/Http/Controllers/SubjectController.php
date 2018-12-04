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
            'reference' => 'required|unique:subject_langs,reference',
            'description' => 'max:3000',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects'] = Subject::all();
        return view('subjects.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('subjects.backoffice.staff.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $trashedsubjectLang = subjectLang::onlyTrashed()->where('reference', $request->reference)->first();
        if(isset($trashedsubjectLang))
        {
            return redirect('subjects/'.$trashedsubjectLang->subject_id);
        }
        
        $this->validateRequest($request);
        $subject = new subject();
        $subject->save();
             // Add LANGUAGES 
             foreach(Language::all() as $lang)
             {
                 $subjectLang = new subjectLang();
                 $subjectLang->subject_id = $subject->id;
                 $subjectLang->lang_id = $lang->id;
                 $subjectLang->reference = ($lang->id == $request->language) ? $request->reference : "";
                 $subjectLang->description = ($lang->id == $request->language) ? $request->description : "";
                 $subjectLang->save();
             }
     
        
        return  $subject;
    }
    public function storeWithRedirect(Request $request) {
        $subject = self::store($request);
        return redirect('subjects/'.$subject->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $subject = self::store($request);
        return redirect('subjects/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {
        $data['subject'] = Subject::withTrashed()->findOrFail($subject);
        $data['languages'] = Language::all();

        return view('subjects.backoffice.staff.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subject  $subject
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
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {
        // return $request;
        $request->validate([
            'reference' => 'required|unique:subject_langs,subject_id,'.$subject,
            'description' => 'required|max:3000',
        ]);
        $subject = Subject::find($subject);
        $subject->save();

        $subjectLangId = $subject->subjectLang()->id;

        $subjectLang = subjectLang::find($subjectLangId);
        $subjectLang->reference = $request->reference; 
        $subjectLang->description = $request->description; 
        $subjectLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $subjectLang->save(); 
        
        return redirect('subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject)
    {
        $subject = Subject::findOrFail($subject);
        if(isset($subject->statuses[0]))
        {
            return redirect('subjects')
                                ->with(
                                    'error',
                                    'subject can\'t be deleted it is in an association with statuses !!'
                                    );
        }
        $subject->delete();
        return redirect('/subjects')
                            ->with(
                                'success',
                                'subject deleted successfuly !!'
                                );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        

        $request->validate([
            'subjects' => 'required',
        ]);
        $error = false;
        
        foreach($request->subjects as $subject)
        {
            $cantDelete = false;

            $subject = Subject::findOrFail($subject);
    
            if(isset($subject->statuses[0])) {$cantDelete = true;$error = true;}
    
            if(!$cantDelete) 
                $subject->delete();

        }
        if(!$error) 
        {
            return redirect('subjects')->with(
                            'success',
                            'subject has been deleted successfuly !!'
            );

        }
        else 
        {
            return redirect('subjects')->with(
                'error',
                'subject can\'t be deleted it has a relation with products '
            );
        }
    }
    public function restore($subject)
    {
        $subject = subject::onlyTrashed()->where('id', $subject)->first();
        $subject->restore();
        $messages['success'] = 'subject has been restored successfuly !!';
        return redirect('subjects')->with('messages',$messages);
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'subjects' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->subjects as  $subject)
        {
            $subject = subject::onlyTrashed()->where('id', $subject)->first();
            $subject->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' subject' :' subjects') .' has been restored successfuly';
        }
        return redirect('subjects')->with('messages',$messages);
    }
    /**
     * 
     */
    public function trash () {
        $data['subjects'] = Subject::onlyTrashed()->get();
        return view('subjects.backoffice.staff.trash',$data);
    }

    /**
     * 
     */
    public function translations ($subject) {
        $data["languages"] =  Language::all();
        $data["subject"] = Subject::findOrFail($subject);
        return view('subjects.backoffice.staff.translations', $data);
    }
}
