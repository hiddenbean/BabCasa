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
                    Historique
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid full-height"> 
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
                                                    <p class="name no-margin bold">Mohammed Kassab</p>
                                                    <p class="datetime no-margin">Update user Faris Adnan Shamoun</p>
                                                </div> 
                                                <div class="subject m-l-10 semi-bold"> at 12:23am </div> 
                                            </div>
                                        </div>   
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-12 m-t-10 m-b-10">
                                            <div class="email-content-header "> 
                                                <div class="sender inline m-l-10">
                                                    <p class="name no-margin bold">Zaki Shahid</p>
                                                    <p class="datetime no-margin">Create new Client</p>
                                                </div> 
                                                <div class="subject m-l-10 semi-bold"> at 11:23am </div> 
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
                                                    <p class="name no-margin bold">Abbas Ghannam</p>
                                                    <p class="datetime no-margin">Update user Farhan Samaha</p>
                                                </div> 
                                                <div class="subject m-l-10 semi-bold"> 10 juin 2018 22:08 </div> 
                                            </div>
                                        </div>   
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-12 m-t-10 m-b-10">
                                            <div class="email-content-header "> 
                                                <div class="sender inline m-l-10">
                                                    <p class="name no-margin bold">Salwa Naila</p>
                                                    <p class="datetime no-margin">Delete partner</p>
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