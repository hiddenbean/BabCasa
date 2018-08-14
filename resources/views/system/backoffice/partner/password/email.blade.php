@extends('layouts.app') 
@section('css') @stop 

@section('body')

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"> {{ config('app.name', 'BAB CASA' ) }}</div> 
        <h3>Réinitialiser le mot de passe </h3> 
        <form id="form-register" class="p-t-15" role="form" action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default input-group">
                        <div class="form-input-group">
                            <label>Entrez votre Email.</label> 
                            <input id="email" type="email" class="form-control " name="email" value="">
                        </div> 
                    </div>
                    <label class='error' for='email'></label>
                </div> 
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit"> 
                Envoyer le lien de réinitialisation
            </button>
      
        </form>
    </div>
</div> 

@stop 

@section('script') @stop
