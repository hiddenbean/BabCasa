@extends('layouts.backoffice.partner.app')

@section('content')

    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">{{__('backoffice.partner.system.dashboard.table')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/commandes') }}">{{__('backoffice.partner.layouts.menu.orders')}}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{$order->id}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- content start -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header ">
                <div class="card-title">{{__('backoffice.partner.orders.show.info_order')}}</div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-8 b-r b-dashed b-grey">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{__('backoffice.partner.orders.show.order')}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($order->goods as $good)
                                            <h2>
                                                <strong>
                                                    (x{{ $good->pivot->quantity }}) {{ $good->name }}
                                                </strong>
                                            </h2>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{__('backoffice.partner.orders.show.id_order')}}
                                    </div>
                                    <div class="col-md-10">
                                        <strong>
                                            {{ $order->id }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{__('backoffice.partner.orders.show.client')}}
                                    </div>
                                    <div class="col-md-10">
                                        <strong>
                                            <a href="{{ url('clients/'.$order->finaleClient->id) }}">{{ $order->finaleClient->first_name }} {{ $order->finaleClient->last_name }}</a>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{__('backoffice.partner.orders.all.date')}}
                                    </div>
                                    <div class="col-md-10">
                                        <strong>
                                            {{  $order->created_at }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                {{__('backoffice.partner.menus.show.state')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @switch($order->status)
                                    @case('on_hold')
                                        <h3>        
                                            <strong>
                                                {{__('backoffice.partner.layouts.menu.waiting')}}
                                            </strong>
                                        </h3>
                                        @break;
                                    @case('in_progress')
                                        <h3>        
                                            <strong>
                                                {{__('backoffice.partner.layouts.menu.progress')}}
                                            </strong>
                                        </h3>
                                        @break;
                                    @case('delivered')
                                        <h3>        
                                            <strong>
                                                {{__('backoffice.partner.layouts.menu.completed')}}
                                            </strong>
                                        </h3>
                                        @break;
                                    @case('canceled')
                                        <h3>        
                                            <strong>
                                                {{__('backoffice.partner.layouts.menu.Canceled')}}
                                            </strong>
                                        </h3>
                                        @break;
                                @endswitch
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            @switch($order->status)
                                @case('on_hold')
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default"><a href="{{ url('/commandes/'.$order->id.'/accepter') }}">{{__('backoffice.partner.orders.hold.accept')}}</a></button>
                                        <button type="button" class="btn btn-default"><a href="{{ url('/commandes/'.$order->id.'/rejeter') }}">{{__('backoffice.partner.orders.hold.reject')}}</button></a></button>
                                    </div>
                                    @break;
                                @case('in_progress')
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default"><a href="{{ url('/commandes/'.$order->id.'/terminer') }}">{{__('backoffice.partner.orders.progress.finish')}}</a></button>
                                        <button type="button" class="btn btn-default"><a href="{{ url('/commandes/'.$order->id.'/annuler') }}">{{__('backoffice.partner.orders.progress.cancel')}}</button></a></button>
                                    </div>
                                    @break;
                            @endswitch
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection