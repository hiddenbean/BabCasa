@extends('layouts.backoffice.staff.app')
@section('css_before')

@section('breadcrumb')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- END BREADCRUMB --> 
        </div>
    </div>
</div>
<!-- content start -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Selling analytics</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            @include('system.backoffice.staff.widgets.best_saller')
        </div>
        <div class="col-md-4">
            <div class="card"></div>
        </div>
        <div class="col-md-4">
            <div class="card"></div>
        </div>
    </div>
</div>
@endsection

