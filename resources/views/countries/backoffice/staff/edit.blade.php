@extends('layouts.backoffice.staff.app')

@section('before_css')
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}">
@endsection

@section('content')
<!-- breadcrumb start -->
<div class="jumbotron no-margin">
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
                    <li class="breadcrumb-item">
                        <a href="{{ url('/countries/'.$country->id) }}">ID :{{ $country->id}}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Add 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card card-transparent">
        <div class="card-header">
            <div class="card-title">
                Create a new Country
                <a 
                    href="javascript:;" 
                    data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-html="true" 
                    trigger="click" 
                    title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                    <i class="fas fa-question-circle"></i>
                </a>
            </div>
        </div>
        <form action="{{url('countries/'.$country->id)}}" method="POST" id="form">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Country name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $country->name}}">
                                        <label class="error" for="name">
                                            {{ $errors->has('name') ? $errors->first('name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Alpha 2 code</label>
                                        <input type="text" class="form-control" name="alpha_2_code" value="{{ $country->alpha_2_code}}">
                                        <label class="error" for="alpha_2_code">
                                            {{ $errors->has('alpha_2_code') ? $errors->first('alpha_2_code') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>phone code</label>
                                        <input type="text" class="form-control" name="phone_code" value="{{ $country->phone_code}}">
                                        <label class="error" for="phone_code">
                                            {{ $errors->has('phone_code') ? $errors->first('phone_code') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Currency</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="currency" value="{{ $country->currency}}">
                                        <label class="error" for="currency">
                                            {{ $errors->has('currency') ? $errors->first('currency') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>Symbole</label>
                                        <input type="text" class="form-control" name="currency_symbole" value="{{ $country->currency_symbole}}">
                                        <label class="error" for="currency_symbole">
                                            {{ $errors->has('currency_symbole') ? $errors->first('currency_symbole') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Publish
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                 <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Status : <strong>@if($country->deleted_at == NULL) Publish @else Removed @endif</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong>{{$country->created_at}}</strong>
                                        </div>
                                    </div>
                                    @if($country->updated_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong>{{$country->updated_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    @if($country->deleted_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong>{{$country->deleted_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    <<div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                        <button id="onClick" class="btn btn-block"><i class="fas fa-pen"></i> <strong>Edit</strong></button   >                                    
                                        </div>

                                        <div class="col-md-6">
                                            <a  href="{{route('delete.country',['country'=>$country->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                        
                                        </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/multiselect.min.js') }}"></script>
    <script>
    $("#save").click( function () {
        $('#form').attr('action', '{{ url('countries') }}');
        $('#form').submit();
    });

    $("#save_new").click( function () {
        $('#form').attr('action', '{{ url('countries')."/create" }}');
        $('#form').submit();
    });

    $(".list-categories a").click( function () {
        $(".list-categories a").removeClass('active');
        $(this).addClass('active');
        $('#category_parent').val($(this).text());
        $('#selected-parent-name').html($(this).text());
    });

    $('#list-categories-clear').click( function () {
        $('.list-categories a').removeClass('active');
        $('#selected-parent-name').html('none');
    });
    </script>
@endsection