<?php

namespace App\Http\Controllers;

use App\Status;
use App\Partner;
use App\Business;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
           
            'reasons' => 'required',
            'user_name' => 'required',
            'user_type' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $partner)
    {
        $type = 'App\\'.ucfirst($type);
        $data['user'] = $type::where('name',$partner)->first();
   
        $data['statuses'] = $data['user']->statuses()->orderBy('id', 'desc')->get();
        // return $data['statuses'];
        return view('statuses.backoffice.staff.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscriptions()
    {
        $data['partners'] = Partner::all();
        $data['businesses'] = Business::all();
        return view('requests.backoffice.staff.subscriptions',$data);
    }
    public function updates()
    {
        $data['partners'] = Partner::all();
        $data['businesses'] = Business::all();
        return view('requests.backoffice.staff.updates',$data); 
    }
    public function create()
    {
        //
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
        $type = 'App\\'.ucfirst($request->user_type);
        $user = $type::where('name', $request->user_name)->first();
        $is_approved = ($request->is_approved =='on') ? 1 : 0;
        $status = new Status();
        $status->is_approved = $is_approved;
        $status->user_id = $user->id;
        $status->user_type = $request->user_type;
        $status->staff_id = 1;//auth()->guard('staff')->user()->id;
        $status->save();
        foreach($request->reasons as $reason)
        {
            $status->reasons()->attach($reason);
        } 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
