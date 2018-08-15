@extends('layouts.backoffice.partner.app') @section('content')

<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
                </li>
                <li class="breadcrumb-item active">
                    Historique
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- content start --> 
<div class="container container-fixed-lg">
    <div class="card">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>YESTERDAY</strong> </h4>
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
            <h4 class="m-t-0 m-b-0"> <strong>10 JUIN</strong> </h4>
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
@endsection