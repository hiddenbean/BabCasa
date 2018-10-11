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
                        <a href="{{ url('/partners') }}">Partners</a>
                    </li>
                    <li class="breadcrumb-item">
                            <a href="{{ url('/partners/'.$user->name) }}">{{$user->name}}</a>
                        </li>
                    <li class="breadcrumb-item active">
                        Pin verification
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div> 
        <h3>Réinitialiser le mot de passe </h3> 
        @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
        <form id="form-register" class="p-t-15" role="form" action="{{ url(str_before(url()->current(), $user->name).''.$user->name.'/pin/verification') }}" method="post">
            @csrf
            
            <div class="form-group-attached"> 
                <div class="row clearfix">
                    <div class="col-sm-8">
                        <div class="form-group form-group-default required">
                            <label for="pin_code">Pin code</label>
                            <input type="pin_code" id="pin_code" name="pin_code" class="form-control">
                            <label class='error' for='pin_code'>
                                @if($errors->has('pin_code'))
                                    {{ $errors->first('pin_code') }}
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit"> 
                Réinitialiser le mot de passe
            </button>
      
        </form>
        <form action="{{url(str_before(url()->current(), $user->name).''.$user->name.'/reset/password')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary p-l-120">Resend code</button>
        </form>
    </div>
</div>
 

@stop 

@section('script') @stop
