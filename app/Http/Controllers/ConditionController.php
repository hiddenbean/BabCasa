<?php

namespace App\Http\Controllers;

use App;
use App\Condition;
use App\ConditionLang;
use App\Language;
use Illuminate\Http\Request;

class ConditionController extends Controller
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
            'reference' => 'required|unique:condition_langs,reference,null,id,deleted_at,null',
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
        $data['conditions'] = condition::all();
        return view('conditions.backoffice.staff.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('conditions.backoffice.staff.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $trashedconditionLang = conditionLang::onlyTrashed()->where('reference', $request->reference)->first();
        if(isset($trashedconditionLang))
        {
            return redirect('conditions/'.$trashedconditionLang->condition_id);
        }
        
        $this->validateRequest($request);
        $condition = new condition();
        $condition->save();
            // Add LANGUAGES 
            foreach(Language::all() as $lang)
            {
                $conditionLang = new conditionLang();
                $conditionLang->condition_id = $condition->id;
                $conditionLang->lang_id = $lang->id;
                $conditionLang->reference = ($lang->id == $request->language) ? $request->reference : "";
                $conditionLang->description = ($lang->id == $request->language) ? $request->description : "";
                $conditionLang->save();
            }
        
        return  $condition;
    }
    public function storeWithRedirect(Request $request) {
        $condition = self::store($request);
        return redirect('conditions/'.$condition->id);
    }

    /**
     * 
     */
    public function storeAndNew(Request $request) {
        $condition = self::store($request);
        return redirect('conditions/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function show($condition)
    {
        $data['condition'] = condition::withTrashed()->findOrFail($condition);
        $data['languages'] = Language::all();

        return view('conditions.backoffice.staff.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function edit($condition)
    {
        $data['condition'] = condition::findOrFail($condition);
        return view('conditions.backoffice.staff.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $condition)
    {
        // return $request;
        $request->validate([
            'reference' => 'required|unique:condition_langs,condition_id,'.$condition,
            'description' => 'required|max:3000',
        ]);
        $condition = condition::find($condition);
        $condition->save();

        $conditionLangId = $condition->conditionLang()->id;

        $conditionLang = conditionLang::find($conditionLangId);
        $conditionLang->reference = $request->reference; 
        $conditionLang->description = $request->description; 
        $conditionLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $conditionLang->save(); 
        
        return redirect('conditions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy($condition)
    {
        $condition = condition::findOrFail($condition);
        if(isset($condition->statuses[0]))
        {
            return redirect('conditions')
                                ->with(
                                    'error',
                                    'condition can\'t be deleted it is in an association with statuses !!'
                                    );
        }
        $condition->delete();
        return redirect('/conditions')
                            ->with(
                                'success',
                                'condition deleted successfuly !!'
                                );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conditions  $conditions
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        

        $request->validate([
            'conditions' => 'required',
        ]);
        $error = false;
        
        foreach($request->conditions as $condition)
        {
            $cantDelete = false;

            $condition = condition::findOrFail($condition);
    
            if(isset($condition->statuses[0])) {$cantDelete = true;$error = true;}
    
            if(!$cantDelete) 
                $condition->delete();

        }
        if(!$error) 
        {
            return redirect('conditions')->with(
                            'success',
                            'condition has been deleted successfuly !!'
            );

        }
        else 
        {
            return redirect('conditions')->with(
                'error',
                'condition can\'t be deleted it has a relation with products '
            );
        }
    }
    public function restore($condition)
    {
        $condition = condition::onlyTrashed()->where('id', $condition)->first();
        $condition->restore();
        $messages['success'] = 'condition has been restored successfuly !!';
        return redirect('conditions')->with('messages',$messages);
    }

    public function multiRestore(Request $request)
    {
        $request->validate([
            'conditions' => 'required',
        ]);
        $s=0;
        $messages = [];
        foreach ($request->conditions as  $condition)
        {
            $condition = condition::onlyTrashed()->where('id', $condition)->first();
            $condition->restore();
            $s++;
            $messages['success'] = $s. ($s == 1 ? ' condition' :' conditions') .' has been restored successfuly';
        }
        return redirect('conditions')->with('messages',$messages);
    }
    /**
     * 
     */
    public function trash () {
        $data['conditions'] = condition::onlyTrashed()->get();
        return view('conditions.backoffice.staff.trash',$data);
    }

    /**
     * 
     */
    public function translations ($condition) {
        $data["languages"] =  Language::all();
        $data["condition"] = condition::findOrFail($condition);
        return view('conditions.backoffice.staff.translations', $data);
    }
}
