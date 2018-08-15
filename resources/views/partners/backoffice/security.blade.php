@extends('layouts.backoffice.partner.app') 

@section('content')

    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Tableau de borad</a>
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
    <!-- security block -->
    <div class="container container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header ">
                <div class="card-title">Information sur vote appareils</div>
            </div>
            @foreach($guests as $guest)
            <div class="card-block">
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
                                                        {{ $guest->device }} 
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            {{ $guest->os }}
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
                                                    {{ $guest->browser }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Adresse IP</strong>
                                            </div>
                                            <div class="col-md-8">
                                                    {{ $guest->ipAddress }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Derniere activeite</strong> 
                                            </div>
                                            <div class="col-md-8">
                                                    {{ $guest->lastActivity }}
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
                                            <form action="{{ url($partner->name.'/security/'.$guest->id) }}" method="post">
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
                                <h3>Changer le mot de passe</h3>
                                Nous vous conseillons d&apos;utiliser un mot de passe sur que vous n&apos;utilisez nulle part alleurs.<br>
                                <a href="#"><strong>Changer le mot de passe</strong></a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Désactiver votre compte</h3>
                                En desactivant votre compte, vous desactiver votre profil  et supprimez votre nom et otre photo de la plupart des  contenus que vous avez partages sur Babcasa.
                                 <a href="#">En savoir plus</a>. 
                              
                                 <form action="{{url('partner/'.$partner->id.'/deactivate')}}" method="POST" class="m-t-5">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" value="Desactiver">
                                </form> 
                            </div>
                        </div>
                    </div>
                </div> <br>
            </div>
            @endforeach
        </div>
    </div>
    <!-- security end-->
@endsection