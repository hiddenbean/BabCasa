@extends('layouts.backoffice.app') 

@section('css') 

@stop 

@section('body')

<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="{{ asset('img/demo/bg_login_partner.jpg') }}" data-src="{{ asset('img/demo/bg_login_partner.jpg') }}" data-src-retina="{{ asset('img/demo/bg_login_partner.jpg') }}"
            alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">
                BABCasa make it easy to enjoy what matters the most in the life
            </h2>
            <p class="small">
                Images Displayed is a representation of what matter us, copyright © 2018-2019.
            </p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div>
            <p>
                Connect to your <strong><a href="#" class="uppercase">Affiliate</a></strong> space
            </p>
            <!-- START Login Form -->
            <form class="p-t-15" role="form" action="{{ url('/sign-in') }}" method="POST">
                <!--  Generate hidden input for token -->
                {{ csrf_field() }}
                
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label> E-mail </label>
                    <div class="controls">
                        <input type="text" name="email" placeholder="Saisissez votre e-mail" class="form-control" value="{{old('email')}}">
                    </div>
                    <label class='error' for='email'>
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </label> 
                </div>
                
                <!-- END Form Control-->

                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label> Password </label>
                    <div class="controls">
                        <input type="password" class="form-control" name="password" placeholder="Saisissez votre mot de passe">
                    </div>
                    <label class='error' for='password'>
                        @if ($errors->has('password'))
                            {{ $errors->first('password') }}
                        @endif
                    </label> 
                </div> 

                @if ($errors->has('faild'))
                    <label class='error'>{{ $errors->first('faild') }}</label>
                @endif

                <!-- START Form Control-->
                <div class="row">
                    <div class="col-md-6 no-padding sm-p-l-10">
                        <div class="checkbox ">
                            <input type="checkbox" value="1" id="checkbox1" name="remember">
                            <label for="checkbox1">Keep me connected</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ url('/password/email') }}" class="small float-right">Forgot your password ?</a>
                        <br>
                        <a href="#" class="small">Contact support</a>
                    </div>
                </div>
                <!-- END Form Control-->
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Login</button>
            </form>
            <!--END Login Form-->
            
            <div class="separator row m-t-30">
                <div class="col-md-5">
                    <hr>
                </div>
                <div class="col-md-2">
                    Or
                </div>
                <div class="col-md-5">
                    <hr>
                </div>
            </div>

            <div class="m-t-20">
                <strong class="uppercase">Join us and become an Affiliate</strong><p>it's easy and it's free</p>
            </div>
            <div>
                <a class="btn btn-primary btn-cons m-t-10" href="register">Register</a>
            </div>

            <!--END Login Form-->
            <div class="pull-bottom sm-pull-bottom">
                <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix"> 
                        <p>
                            <small class="">
                                <a href="#">Confidentiality.</a>
                            </small>
                            <small class="">
                                <a href="#">Terms and conditions.</a>
                            </small>
                            <small class="">
                                <a href="#">Help me?</a>
                            </small> 
                        </p> 
                </div>
            </div> 
        </div>
    </div>
    <!-- END Login Right Container-->
</div>

@stop 

@section('script') 

@stop
