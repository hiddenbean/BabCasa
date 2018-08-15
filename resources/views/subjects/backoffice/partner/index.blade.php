@extends('layouts.backoffice.partner.app')

@section('css') 
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}"/>

@endsection

@section('content')

    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Tableau de borad</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/support">Support</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Tickets titre
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- content start -->
    <!-- show menu -->
    <div class="container-fluid container-fixed-lg">
        <div class="card card-transparent">
            <div class="card-header ">
                <div class="card-title">Choisissez un sujet pour la création de ticket </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-2"> 
                        <div class="card">
                            <div class="card-body"> 
                                <h2>
                                    Titre 
                                </h1>
                                <strong> <a href="">Sit consectetur provident</a></strong> 
                            </div>
                        </div>
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('backoffice/assets/plugins/summernote/js/summernote.min.js') }}"></script> 
@endsection