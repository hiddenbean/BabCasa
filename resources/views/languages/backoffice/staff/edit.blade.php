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
                        <a href="{{ url('/languages') }}">Languages</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit 
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
                Edit Language ID :
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
        <form action="{{url('languages/'.$language->id)}}" method="POST" id="form">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Language name</label>
                                    <input type="text" class="form-control" name="name" value="{{$language->name}}">
                                        <label class="error" for="name">
                                            {{ $errors->has('name') ? $errors->first('name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>Alpha 2 code</label>
                                        <input type="text" class="form-control" name="alpha_2_code" value="{{$language->alpha_2_code}}">
                                        <label class="error" for="alpha_2_code">
                                            {{ $errors->has('alpha_2_code') ? $errors->first('alpha_2_code') : "" }}
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
                                                Status : <strong>@if($language->deleted_at == NULL) Publish @else Removed @endif</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Creation date : <strong>{{$language->created_at}}</strong>
                                            </div>
                                        </div>
                                        @if($language->updated_at != NULL)
                                        <div class="row">
                                            <div class="col-md-12">
                                                Last update : <strong>{{$language->updated_at}}</strong>
                                            </div>
                                        </div>
                                        @endif
                                        @if($language->deleted_at != NULL)
                                        <div class="row">
                                            <div class="col-md-12">
                                                Remove date : <strong>{{$language->deleted_at}}</strong>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        @if($language->deleted_at == NULL)
                                            <div class="col-md-6">
                                                <button class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></button>                                    
                                            </div>
                                        @endif
                                            <div class="col-md-6">
                                            @if($language->deleted_at == NULL)
                                                <a  href="{{route('delete.language',['language'=>$language->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                            @else
                                                <form action="{{url('languages/'.$language->id.'/restore')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-block btn-transparent-danger" c><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                                    </form>
                                            @endif
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