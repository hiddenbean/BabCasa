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
                    <a href="{{ url('/reasons') }}">reasons</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Reason</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Reference</h5>
                            <p>{{$reason->reference}} </p> 
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Short description</h5>
                            <p>{{$reason->reasonLang->first()->short_description}} </p> 
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <h5>description</h5>
                            <p>{{$reason->reasonLang->first()->description}} </p> 
                        </div> 
                    </div>   
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
@stop