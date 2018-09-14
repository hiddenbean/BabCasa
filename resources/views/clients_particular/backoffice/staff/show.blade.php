@extends('layouts.backoffice.staff.app')
@section('css_before')
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/clients/particular') }}">Clients particular</a>
                </li>
                <li class="breadcrumb-item active">
                    Show
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Clients particular Information</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Name</h5>
                                <p>Lorem ipsum </p>

                                <h5 class="p-t-15">First name</h5>
                                <p>Clients particular</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Email</h5>
                                <p>clientsparticular@admin.com</p>

                                <h5 class="p-t-15"> last Name</h5>
                                <p>Lorem ipsum</p> 
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('img/profiles/6x.jpg') }}" alt="" srcset="">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Adresse:</h5>
                                <p>77 Rue de Verdun</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Country:</h5>
                                <p>France</p>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-4">
                                <h5>City:</h5>
                                <p>MONTÉLIMAR</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Full name:</h5>
                                <p>Ila A Courcelle</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Zip code:</h5>
                                <p>26200</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Phone N1:</h5>
                                <p>(+212) 03.33.00.97070 /p>
                            </div>
                            <div class="col-md-4">
                                <h5>phone N2:</h5>
                                <p>(+212) 03.33.00.97070</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Fax:</h5>
                                <p>04.33.00.97070</p>
                            </div>
                        </div> 
                </div>
                <div class="col-md-3">
                    <div class="row"> 
                        <div class="col-md-12">
                            <h3>Update password</h3>
                            We advise you to use a password you do not use anywhere else.<br>
                            <a href="#"><strong>Update password</strong></a>
                        </div> 
                        <div class="col-md-12">
                            <h3> Deactivate this account</h3>
                            Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Babcasa. Some information may still be visible to others.
                            <form action="" method="post" class="mt-2">
                                <button type="submit" class="btn btn-danger" >Deactivate</button>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
@stop