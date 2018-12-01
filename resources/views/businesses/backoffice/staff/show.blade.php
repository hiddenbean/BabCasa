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
                        Business id : 
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 b-r b-dashed b-grey p-b-15">
                            <h5>
                                Picture
                            </h5>
                            <img src="" style="max-width:300px" alt="cat1">
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
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Last name
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
                                        <a href="mailto: "> </a>
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Phone
                                </div>
                                <div class="col-md-9">
                                    <strong>
                                        <a href="tel:+ "></a>
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
                                    <strong> </strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    About Business activities
                                </div>
                                <div class="col-md-9">
                                    <strong> </strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Taxe id
                                </div>
                                <div class="col-md-9">
                                    <strong> </strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Business address
                                </div>
                                <div class="col-md-9">
                                    <strong> </strong>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-3 uppercase">
                                    Business phones
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="tel:">+212</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="tel:">+212</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="tel:">+212</a>
                                        </div>
                                    </div>
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
                                Update/Subscription Request
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
                                    This is a new subscription request
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    This business has made some changes
                                </div>
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="">
                                        <button class="btn btn-block"><i class="fas fa-check"></i> <strong>Approve</strong></button>
                                    </form>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    Or decline this request for :
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div class="btn-group dropdown">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" id="selected_reason"> Chose a reason <span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Not following terms and conditions</a>
                                            </li>
                                            <li><a href="#">use of offensive, discrimination or sexual references</a>
                                            </li>
                                            <li><a href="#">use of unvalid informations</a>
                                            </li>
                                        </ul>
                                    </div>
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
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>
                                <div class="col-md-6">
                                    <a  href="" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                    <form action="" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                    </form>
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
