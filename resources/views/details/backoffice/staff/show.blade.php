@extends('layouts.backoffice.staff.app')
@section('css_before')
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
                    <a href="{{ url('/details') }}">details</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Details</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5>Detail Name</h5>
                    <p>Lorem ipsum </p> 
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Detail value</h5>
                    <p>Lorem ipsum </p> 
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
@stop