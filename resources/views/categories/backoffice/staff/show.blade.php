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
                    <a href="{{ url('/categories') }}">categories</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Category</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                        <div class="row">
                            <div class="col-md-12">
                                <h5>{{$category->categoryLang->first()->reference}}</h5> 
                                @if(isset($category->category->categoryLang)) <small>parent : <strong>{{$category->category->categoryLang->first()->reference}}</strong></small>@endif
                                 
                                <p>{{$category->categoryLang->first()->description}} </p> 
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                    <img src="{{ Storage::url($category->picture->path) }}" alt="" srcset="">
                                
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