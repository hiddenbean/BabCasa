@extends('layouts.backoffice.partner.app') 

@section('content')

    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li> 
                    <li class="breadcrumb-item active">
                        Sécurité 
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- content start -->
    <div class="container-fluid full-height padding-20"> 
            <div class="card ">
                    <div class="card-header">
                        <h4 class="m-t-0 m-b-0"> <strong>Security</strong> </h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                    <div class="col-md-7 b-r b-dashed b-grey">
                                        
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <i class="fa fa-laptop" style="font-size:50px"></i>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-8">
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                               Computer 
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                   Windows 10
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Navigateur</strong>   
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                            Chrome
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Adresse IP</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                            198.195.2.1
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Derniere activeite</strong> 
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                           5h
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Lieux</strong> 
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        Rabat, Maroc
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-4 m-t-5">
                                                                        <strong>Acces au compte</strong>  
                                                                    </div>
                                                                    <form action="" method="post">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                        <div class="col-md-8">
                                                                            <button class="btn btn-transparent text-danger"><strong>Supprimer</strong></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                          
                                    </div> 
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Update password</h3>
                                                We advise you to use a password you do not use anywhere else.<br>
                                                <a href="#"><strong>Update password</strong></a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Deactivate your account</h3>
                                                By deactivating your account, you deactivate your profile and delete your name and photo from most of the content you have shared on Babcasa.
                        
                                                    <form action="" method="POST" class="m-t-5">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit" class="btn btn-danger" value="Desactiver">
                                                    </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div> <br>
                    </div>
            </div>
        </div>
@endsection