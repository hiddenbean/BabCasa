@extends('layouts.backoffice.staff.app')
@section('css_before')
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
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
                    <a href="{{ url('/countries') }}">Countries</a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Create new country</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal" method="POST" action="{{url('countries')}}">
                            {{ csrf_field() }}
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                        <label class='error' for='name'>
                                            @if ($errors->has('name'))
                                                {{ $errors->first('name') }}
                                            @endif
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Alpha Code</label>
                                    <input type="text" class="form-control" name="code_alpha" placeholder="Exemple MA">
                                     <label class='error' for='code_alpha'>
                                            @if ($errors->has('code_alpha'))
                                                {{ $errors->first('code_alpha') }}
                                            @endif
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="code" placeholder="Exemple +212">
                                     <label class='error' for='code'>
                                            @if ($errors->has('code'))
                                                {{ $errors->first('code') }}
                                            @endif
                                        </label>
                                </div>
                            </div>
                        </div> 
                      
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script> 
@stop