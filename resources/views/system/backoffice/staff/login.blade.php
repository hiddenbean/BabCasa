@extends('layouts.backoffice.app') 

@section('css') 

@stop 

@section('body')
<div class="register-container sm-p-t-30 register-staff-width" >
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text">  
            <div class="logo_text">
                <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60"/>
            </div>
        </div>
        <h3>Login with your BABCasa staff account</h3>
        <div class="row">
            <div class="col-md-12">
                <form class="p-t-15" role="form" method="POST" action="{{route('staff.login.submit')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default input-group @if($errors->has('username')) has-error @endif">
                                <div class="form-input-group">
                                    <label>Saisissez votre nom d&apos;utilisateur</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default @if($errors->has('password')) has-error @endif">
                                <label>PASSWORD</label>
                                <input type="password" name="password" class="form-control" placeholder="Your staff password here">
                                @if ($errors->has('password'))
                                <label class='error' for='password'>{{ $errors->first('password') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10 m-b-10"> 
                        <div class="col-md-6 sm-p-l-10">
                            <div class="checkbox no-margin">
                                <input type="checkbox" name="remembre" id="remembre">
                                <label for="remembre">Keep Me Signed in</label>
                            </div>
                        </div> 
                        <div class="col-md-6 text-right">
                            <a href="#" class="small">Forgot your password ?</a> 
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class=" container-fluid  container-fixed-lg footer">
    <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
            <span class="hint-text">Copyright © 2018 </span>
            <span class="font-montserrat">BABCasa</span>.
            <span class="hint-text">All rights reserved. </span>
            <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
        </p>
        <p class="small no-margin pull-right sm-pull-reset">
            <a href="javascript:;">English (United States)</a>
        <div class="clearfix"></div>
    </div>
</div>
@stop 

@section('script')
    @stop
