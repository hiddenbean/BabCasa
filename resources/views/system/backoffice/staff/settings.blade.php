@extends('layouts.backoffice.staff.app') 
@section('css')
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')
<!-- breadcrumb start 
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
                </li>
                <li class="breadcrumb-item active">
                    settings
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- START SECONDARY SIDEBAR -->
<nav class="secondary-sidebar"> 
    <p class="menu-title">Sttings</p>
    <ul class="main-menu">
        <li class="active">
            <a href="#">
            <span class="title"><i class="fa fa-envelope"></i> Newsletter suscription</span> 
            </a>
        </li>
        <li class="">
            <a href="#">
            <span class="title"><i class="pg-folder"></i>Security</span>
            </a> 
        </li>
        <li>
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
                <h4 class="m-t-0 m-b-0"> <strong>Newsletter suscription</strong> </h4>
            </div>
            <div class="card-body">
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum omnis dolorem repellendus sed, alias neque ea asperiores quis veritatis nisi ipsa, minus, illo nobis consectetur accusantium! At fugiat saepe mollitia.
                </p> 
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="admin@admin.com" disabled>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="checkbox" data-init-plugin="switchery" data-size="small" data-color="primary" checked="checked" /> 
                        <label for="">Active</label>
                    </div>
                </div>   
            </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
@stop