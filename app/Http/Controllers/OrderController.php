<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['orders'] = Auth::guard('partner')->user()->orders;
                 $view = 'orders.backoffice.partner.all';
                 break;

             case 'staff':
                $data['orders'] = Order::all();
                $view = 'orders.backoffice.staff.index';
                 break;
         }
         return view($view,$data);
        
    }
    public function waiting()
    {
        
        
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['orders'] = Auth::guard('partner')->user()->orders->where('status','waiting');
                 $view = 'orders.backoffice.partner.all';
                 break;

             case 'staff':
                $data['orders'] = Order::where('status','waiting');
                $view = 'orders.backoffice.staff.index';
                 break;
         }
         return $data;
         return view($view,$data);
        
    }
    public function inProgress()
    {
        
        
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['orders'] = Auth::guard('partner')->user()->orders->where('status','in progress');
                 $view = 'orders.backoffice.partner.all';
                 break;

             case 'staff':
                $data['orders'] = Order::where('status','in progress');
                $view = 'orders.backoffice.staff.index';
                 break;
         }
         return view($view,$data);
        
    }
    public function complated()
    {
        
        
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['orders'] = Auth::guard('partner')->user()->orders->where('status','complated');
                 $view = 'orders.backoffice.partner.all';
                 break;

             case 'staff':
                $data['orders'] = Order::where('status','complated');
                $view = 'orders.backoffice.staff.index';
                 break;
         }
         return view($view,$data);
        
    }
    public function canceled()
    {
        
        
        $type = $this->userType();
         switch ($type) {
             case 'partner':
                 $data['orders'] = Auth::guard('partner')->user()->orders->where('status','canceled');
                 $view = 'orders.backoffice.partner.all';
                 break;

             case 'staff':
                $data['orders'] = Order::where('status','canceled');
                $view = 'orders.backoffice.staff.index';
                 break;
         }
         return view($view,$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }
    public function userType()
    {
        
        $subDomainArr = explode('.',url()->current(),2); 
        if (strpos($subDomainArr[0], 'partner') !== false)return 'partner';
        if (strpos($subDomainArr[0], 'staff') !== false)return 'staff'; 
        
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
