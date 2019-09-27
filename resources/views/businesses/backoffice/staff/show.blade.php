@extends('layouts.backoffice.staff.app')
@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')

@if (isset(Session::get('messages')['success']))
    <div class="alert alert-success" role="alert">
        <button class="close" data-dismiss="alert"></button>
        <strong>Success: </strong>{{ Session::get('messages')['success'] }}
    </div>
@endif
@if (isset(Session::get('messages')['error']))
    <div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert"></button>
        <strong>Error: </strong>{{ Session::get('messages')['error'] }}
    </div>
    
@endif
<!-- breadcrumb start -->
<div class="jumbotron">
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/businesses') }}">Businesses</a>
                    </li>
                    <li class="breadcrumb-item active">
                        ID :  {{$business->id}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">
                        Business id : {{$business->id}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 b-r b-dashed b-grey p-b-15">
                            <h5>
                                Picture
                            </h5>
                            <img src="@if(isset($business->picture->path)) {{Storage::url($business->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" style="max-width:300px" alt="cat1">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Account informations
                                    </h5>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        username 
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                                {{$business->name}}
                                        </strong>
                                    </div>
                                </div>
    
                                <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        Email
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                            <a href="mailto:{{$business->email}}"> {{$business->email}}</a>
                                        </strong>
                                    </div>
                                </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <h5>
                                        Administrator informations
                                    </h5>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        First name
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                                {{$business->first_name}}
                                        </strong>
                                    </div>
                                </div>
    
                                <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        Last name
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                                {{$business->last_name}}
                                        </strong>
                                    </div>
                                </div>
    
                                <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        Email
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                            <a href="mailto: {{$business->admin_email}}"> {{$business->admin_email}}</a>
                                        </strong>
                                    </div>
                                </div>
    
                                <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        Phone
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                            <a href="tel:+ {{$business->phones()->where('tag','admin')->first()->country->phone_code.' '.$business->phones()->where('tag','admin')->first()->number}}"> {{$business->phones()->where('tag','admin')->first()->country->phone_code.' '.$business->phones()->where('tag','admin')->first()->number}}</a>
                                        </strong>
                                    </div>
                                </div>
                        
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <h5>
                                        Business informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Business name
                                </div>
                                <div class="col-md-9">
                                    <strong>{{$business->company_name}}</strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    About Business activities
                                </div>
                                <div class="col-md-9">
                                    <strong>{{$business->about}} </strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Taxe id
                                </div>
                                <div class="col-md-9">
                                    <strong>{{$business->taxe_id}} </strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Business address
                                </div>
                                <div class="col-md-9">
                                    <strong> {{$business->address->address}} <br>{{$business->address->address_two}}<br>{{$business->address->city.' ,'.$business->address->zip_code}}</strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Business phones
                                </div>
                                <div class="col-md-9">
                                    @foreach($business->phones()->where('tag','!=','admin')->get() as $phone)
                                        <div class="row">
                                        <div class="col-md-12">
                                        <a href="tel:{{$phone->country->phone_code.' '.$phone->number}}">{{$phone->country->phone_code.' '.$phone->number}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                @if($business->status->first()->is_approved==0) Subscription Request @endif 
                                @if($business->status->first()->is_approved==1) Approved @endif 
                                @if($business->status->first()->is_approved==2 ) Update Request @endif
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                        @if($business->status->first()->is_approved!=1)
                        <div class="card-body">
                            <div class="row">
                                    @if($business->status->first()->is_approved!=0)
                                    <div class="col-md-12">
                                        This is a new subscription request
                                    </div>
                                    @endif
                            </div>
                            <div class="row">
                                    @if($business->status->first()->is_approved!=2)
                                    <div class="col-md-12">
                                        This business has made some changes
                                    </div>
                                    @endif
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                    @if($business->status->where('is_approved','!=',1)->first())

                                <div class="col-md-12">
                                        <a  href="{{url('businesses/'.$business->id.'/disapprove/0')}}" class="btn btn-block"  data-method="post"  data-token="{{csrf_token()}}"><i class="fas fa-check"></i> <strong>Approve</strong></a>
                                </div>
                                @endif
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                        To disapprove decline this request for :
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div class="btn-group dropdown">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" id="selected_reason"> Chose a reason <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            @foreach($reasons as $reason)
                                            <li><a href="{{url('businesses/'.$business->id.'/disapprove/'.$reason->id)}}"  data-method="post"  data-token="{{csrf_token()}}">{{$reason->reasonLang()->reference}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Publish
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        Status : <strong>@if($business->deleted_at == NULL) Publish @else Removed @endif</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        Creation date : <strong>{{$business->created_at}}</strong>
                                    </div>
                                </div>
                                @if($business->updated_at != NULL)
                                <div class="row">
                                    <div class="col-md-12">
                                        Last update : <strong>{{$business->updated_at}}</strong>
                                    </div>
                                </div>
                                @endif
                                @if($business->deleted_at != NULL)
                                <div class="row">
                                    <div class="col-md-12">
                                        Remove date : <strong>{{$business->deleted_at}}</strong>
                                    </div>
                                </div>
                                @endif
                                <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                @if($business->deleted_at == NULL)
                                    <div class="col-md-6">
                                        <a href="{{url('businesses/'.$business->name.'/edit')}}" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                    </div>
                                @endif
                                    <div class="col-md-6">
                                    @if($business->deleted_at == NULL)
                                        <a  href="{{route('delete.business',['business'=>$business->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                    @else
                                        <form action="{{url('businesses/'.$business->id.'/restore')}}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                            </form>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @if($business->deleted_at == NULL)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Rest password
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{url('businesses/sendResetEmail/'.$business->name)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$business->email}}">
                                        <button class="btn btn-block btn-transparent"><strong>send password rest link</strong></button>
                                    </form>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <a href="javascript:;" data-toggle="modal" data-target="#modalSlideUp" class="btn btn-block text-danger"><strong>generate a new password</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    @include('logs.backoffice.components.table')
</div>
@include('businesses.backoffice.staff.components.modal_password_gen')
@endsection
