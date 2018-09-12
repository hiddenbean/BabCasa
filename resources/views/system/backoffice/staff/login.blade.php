@extends('layouts.backoffice.app') 

@section('css') 

@stop 

@section('body')

<div class="register-container full-height sm-p-t-30 register-staff-width" >
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text">  <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div></div>
        <h3>Connectez-vous à votre espace</h3>
        <div class="row">
            <div class="col-md-12">
                <form id="form-register" class="p-t-15" role="form" action="index.html" novalidate="novalidate">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default input-group">
                                <div class="form-input-group">
                                    <label>Saisissez votre nom d&apos;utilisateur</label>
                                    <input type="login" class="form-control">
                                </div>
                            </div>
                            <label for="login" class="error"></label>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Mot de passe</label>
                                <input type="password" name="password" class="form-control">
                                <label for="password" class="error"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 no-padding sm-p-l-10">
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="checkbox1" name="remember">
                                <label for="checkbox1">Me tenir connecté</label>
                            </div>
                        </div> 
                        <div class="col-md-6 text-right">
                            <a href="#" class="small">Mot de passe oublié</a> 
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop 

@section('script') 

@stop
