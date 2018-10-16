@extends('layouts.backoffice.partner.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/claims') }}">Claims</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Claim Information</strong> </h4>
        </div>
        <div class="card-body">
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">Information</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 b-r b-dashed b-grey">
                            <div class="row">
                                <div class="col-md-12">
                                    Title
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>
                                        <strong> Order delay </strong>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    Sujet
                                </div>
                                <div class="col-md-8">
                                    <strong> Order </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    Creation date
                                </div>
                                <div class="col-md-8">
                                    <strong> 01/02/2018 </strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    Status
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        <strong>Open</strong>
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Partner message start -->
            <div class="row p-t-20 p-b-20bg-white">
                <div class="col-md-2 b-r b-dashed b-grey">
                    <span class="thumbnail-wrapper d32 circular inline">
                        <img src="{{ asset('img/profiles/5x.jpg') }}" alt="" width="32" height="32">
                    </span>
                    <div class="m-l-40 p-t-5">
                        {{date('y-m-d H:i:s', strtotime('01-09-2018')) }}
                    </div>
                </div>
                <div class="col-md-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ab officiis! Odio nihil animi
                    corrupti temporibus nostrum quod ut eaque.
                </div>
            </div>

            <br>
            <!-- Partner message end -->

            <!-- Staff message start -->

            <div class="row p-t-20 p-b-20" style="background-color:#daeffd">
                <div class="col-md-10 b-r b-dashed b-grey">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis laboriosam eaque delectus,
                    quam quibusdam, ea repellendus rem aliquam laborum, vitae incidunt impedit sit enim veritatis quis
                    repellat commodi nulla dolore!
                </div>
                <div class="col-md-2">
                    <span class="thumbnail-wrapper d32 circular inline">
                        <img src="{{ asset('img/profiles/2x.jpg') }}" alt="" width="32" height="32">
                    </span>
                    <div class="m-l-40 p-t-5">
                        {{date('y-m-d H:i:s', strtotime('01-09-2017')) }}
                    </div>
                </div>
            </div>

            <br>
            <!-- Staff message end -->

        </div>
    </div>
</div>
@endsection

@section('script')

@stop