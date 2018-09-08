@extends('layouts.backoffice.staff.app') 
@section('css')
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content') 

<!-- START SECONDARY SIDEBAR -->
<nav class="secondary-sidebar"> 
    <p class="menu-title">Sttings</p>
    <ul class="main-menu">
        <li class="">
            <a href="#">
            <span class="title"><i class="fa fa-envelope"></i> Newsletter suscription</span> 
            </a>
        </li>
        <li >
            <a href="#">
            <span class="title"><i class="pg-folder"></i>Security</span>
            </a> 
        </li>
        <li class="active">
            <a href="#">
                <span class="title"><i class="pg-sent"></i>Log</span>
            </a>
        </li> 
    </ul> 
</nav>
<!-- END SECONDARY SIDEBAR  -->
<div class="inner-content full-height padding-20"> 
    <div class="card ">
            <div class="card-header">
                <h4 class="m-t-0 m-b-0"> <strong>Log</strong> </h4>
            </div>
            <div class="card-body">
                    <div class="card">
                            <div class="card-header">
                                <strong>YESTERDAY</strong> 
                            </div>
                            <div class="card-body p-l-15 p-r-15 p-b-15">
                                <div class="row border-bottom">
                                    <div class="col-md-12 m-t-10 m-b-10">
                                        <div class="email-content-header "> 
                                            <div class="sender inline m-l-10">
                                                <p class="name no-margin bold">David Nester</p>
                                                <p class="datetime no-margin">Everything here, Made Just for you :)</p>
                                            </div> 
                                            <div class="subject m-l-10 semi-bold"> Today at 11:23am </div> 
                                        </div>
                                    </div>   
                                </div>  
                                <div class="row">
                                    <div class="col-md-12 m-t-10 m-b-10">
                                        <div class="email-content-header "> 
                                            <div class="sender inline m-l-10">
                                                <p class="name no-margin bold">David Nester</p>
                                                <p class="datetime no-margin">Everything here, Made Just for you :)</p>
                                            </div> 
                                            <div class="subject m-l-10 semi-bold"> Today at 11:23am </div> 
                                        </div>
                                    </div>   
                                </div>  
                            </div>
                        </div>  
                        <div class="card">
                            <div class="card-header">
                                <strong>10 JUIN</strong> 
                            </div>
                            <div class="card-body p-l-15 p-r-15 p-b-15">
                                <div class="row border-bottom">
                                    <div class="col-md-12 m-t-10 m-b-10">
                                        <div class="email-content-header "> 
                                            <div class="sender inline m-l-10">
                                                <p class="name no-margin bold">David Nester</p>
                                                <p class="datetime no-margin">Everything here, Made Just for you :)</p>
                                            </div> 
                                            <div class="subject m-l-10 semi-bold"> 10 juin 2018 22:08 </div> 
                                        </div>
                                    </div>   
                                </div>  
                                <div class="row border-bottom">
                                    <div class="col-md-12 m-t-10 m-b-10">
                                        <div class="email-content-header "> 
                                            <div class="sender inline m-l-10">
                                                <p class="name no-margin bold">David Nester</p>
                                                <p class="datetime no-margin">Everything here, Made Just for you :)</p>
                                            </div> 
                                            <div class="subject m-l-10 semi-bold"> 10 juin 2018 21:08 </div> 
                                        </div>
                                    </div>   
                                </div>  
                                <div class="row">
                                    <div class="col-md-12 m-t-10 m-b-10">
                                        <div class="email-content-header "> 
                                            <div class="sender inline m-l-10">
                                                <p class="name no-margin bold">David Nester</p>
                                                <p class="datetime no-margin">Everything here, Made Just for you :)</p>
                                            </div> 
                                            <div class="subject m-l-10 semi-bold"> 10 juin 2018 21:08 </div> 
                                        </div>
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

