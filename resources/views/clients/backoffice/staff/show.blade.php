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
                        <a href="{{ url('/clients') }}">Clients</a>
                    </li>
                    <li class="breadcrumb-item active">
                        ID : 
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
                        Client id : 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Login informations
                                    </h5>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Username 
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Email
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        <a href="mailto:"></a>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Social media 
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="http://fb.com">Facebook</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Client informations
                                    </h5>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Full name 
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Phone
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        <a href="tel:"></a>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    address
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        <a href="tel:"></a>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Birthday 
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Gender 
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                    </strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Services
                                    </h5>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Newsletter 
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                    </strong>
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
                                    Status : <strong></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : <strong></strong>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong></strong>
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
                                    <form action="{{url('businesses/passwords/email')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="">
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

    @include('logs.backoffice.componments.table')
</div>
@include('businesses.backoffice.staff.components.modal_password_gen')
@endsection