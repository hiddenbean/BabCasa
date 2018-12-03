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
                        <a href="{{ url('/staff') }}">Staff</a>
                    </li>
                    <li class="breadcrumb-item active">
                        ID : {{$staff->id}}
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
                        Member  id :  {{$staff->id}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 b-r b-dashed b-grey p-b-15">
                            <h5>
                                Picture
                            </h5>
                            <img src="@if(isset($staff->picture->path)) {{Storage::url($staff->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" alt="cat1">
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
                                        {{$staff->name}}
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Email
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        <a href="mailto:{{$staff->email}}@babcasa.com">{{$staff->email}}</a>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <h5>
                                        Generale informations
                                    </h5>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    First name
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        {{$staff->first_name}}
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Last name
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        {{$staff->last_name}}
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Birthday
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        {{$staff->birthday}} 
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Gender
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        {{$staff->gender->genderLang()->reference}}
                                    </strong>
                                </div>
                            </div>
                            
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Address
                                </div>
                                <div class="col-md-9">
                                    <address>
                                        {{$staff->address->address}}
                                    </address>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Phone number
                                </div>
                                <div class="col-md-9">
                                    <strong><a href="tel:+{{$staff->phones[0]->country->phone_code.$staff->phones[0]->number}}">({{$staff->phones[0]->country->phone_code}}) {{$staff->phones[0]->number}}</a></strong>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <h5>
                                        Permissions set
                                    </h5>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Profile
                                </div>
                                <div class="col-md-9">
                                    <strong>{{$staff->profile->profileLang()->reference}}</strong>
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
                                    Status : <strong>@if($staff->deleted_at == NULL) Publish @else Removed @endif</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : <strong>{{$staff->created_at}}</strong>
                                </div>
                            </div>
                            @if($staff->updated_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>{{$staff->updated_at}}</strong>
                                </div>
                            </div>
                            @endif
                            @if($staff->deleted_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>{{$staff->deleted_at}}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                            @if($staff->deleted_at == NULL)
                                <div class="col-md-6">
                                    <a href="{{url('staff/'.$staff->id.'/edit')}}" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>
                            @endif
                                <div class="col-md-6">
                                @if($staff->deleted_at == NULL)
                                    <a  href="{{route('delete.staff',['staff'=>$staff->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                @else
                                    <form action="{{url('staff/'.$staff->id.'/restore')}}" method="POST">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Reset password
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
                                    <form action="{{ url('passwords/email') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $staff->email }}">
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
        </div>
    </div>

    @include('logs.backoffice.components.table')


@include('staff.backoffice.staff.components.modal_password_gen')
@endsection