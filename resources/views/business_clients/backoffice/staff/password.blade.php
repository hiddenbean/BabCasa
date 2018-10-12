@extends('layouts.backoffice.staff.app')
@section('css') @stop 

@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/clients/business') }}">Business clients</a>
                    </li>
                    <li class="breadcrumb-item">
                            <a href="{{ url('/clients/business/'.$user->name.'/show') }}">{{$user->name}}</a>
                        </li>
                    <li class="breadcrumb-item active">
                        Password
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
<div class="register-container full-height sm-p-t-30 m-t-50">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div> 
        <h3>the new password </h3>
        
        <div class="form-group-attached"> 
            <div class="row clearfix">
                <div class="col-sm-8">
                    <div class="form-group form-group-default">
                        <h4>{{$password}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

@stop 

@section('script') @stop
