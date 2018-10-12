@extends('layouts.backoffice.app') 
@section('css') @stop 

@section('body')

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div> 
        <h3>Réinitialiser le mot de passe </h3> 
        <form id="form-register" class="p-t-15" role="form" action="{{ url('staff/password') }}" method="post">
            @csrf 
            {{ method_field('put') }}
            <div class="form-group-attached"> 
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default required">
                            <label for="old_password">Old password</label>
                            <input type="password" id="old_password" name="old_password"  class="form-control">
                            <label class='error' for='old_password'></label>
                        </div>
                    </div>  
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default required">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <label class='error' for='password'>
                                @if($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default required">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"> 
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit"> 
                Réinitialiser le mot de passe
            </button> 
        </form>
    </div>
</div>
 

@stop 

@section('script') @stop
