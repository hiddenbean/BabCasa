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
                        <a href="{{ url('/details') }}">Details</a>
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
                Create a Detail
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
        <form action="{{url('details')}}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Detail name</label>
                                        <input type="text" class="form-control" name="value">
                                        <label class='error' for='value'>
                                            @if ($errors->has('value'))
                                                {{ $errors->first('value') }}
                                            @endif
                                        </label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Catrgories using this detail 
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
                                        <div class="col-md-5">
                                            <select id="lstview" class="form-control" size="13" multiple="multiple">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->categoryLang()->reference}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="lstview_undo" class="btn btn-transparent-danger btn-block"><i class="fas fa-ban"></i> <strong>undo</strong></button>
                                            <button type="button" id="lstview_rightAll" class="btn btn-transparent btn-block"><i class="fas fa-forward"></i></button>
                                            <button type="button" id="lstview_rightSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-right fa-lg"></i></button>
                                            <button type="button" id="lstview_leftSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-left fa-lg"></i></button>
                                            <button type="button" id="lstview_leftAll" class="btn btn-transparent btn-block"><i class="fas fa-backward"></i></button>
                                            <button type="button" id="lstview_redo" class="btn btn-transparent btn-block"><i class="fas fa-sync-alt"></i> redo</button>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="categories[]" id="lstview_to" class="form-control" size="13" multiple="multiple"></select>
                                        </div>
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
                                        <div class="col-md-6">
                                            <button class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type='button' class="btn btn-block"><strong>save & new</strong></button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button  type='reset' class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear all</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Category langue
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
                                    <select class="cs-select cs-skin-slide" name="language" data-init-plugin="cs-select">
                                         @foreach($languages as $language)
                                                <option value="{{$language->id}}">{{$language->name}}</option>
                                               @endforeach
                                    </select>
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
        $(document).ready(function () {
            $("#path_staff").on("change", function () {
                var _this = this;
                var image_preview = $("#image_preview_staff");
                showImage(_this, image_preview);
            });

            function showImage(_this, image_preview) {
                var files = !!_this.files ? _this.files : [];
                if (!files.length || !window.FileReader) return;
                if (/^image/.test(files[0].type)) {
                    var ReaderObj = new FileReader();
                    ReaderObj.readAsDataURL(files[0]);
                    ReaderObj.onloadend = function () {
                        image_preview.attr('src', this.result);
                    }
                } else {
                    alert("Please select an image");
                }
            } 
        });
    $(".list-categories a").click( function () {
        $(".list-categories a").removeClass('active');
        $(this).addClass('active');
        $('#category_parent').val($(this).text());
        $('#selected-parent-name').html($(this).text());
    });
    $('#summernote').summernote({height: 250});
    $('#lstview').multiselect();

    $('#list-categories-clear').click( function () {
        $('.list-categories a').removeClass('active');
        $('#selected-parent-name').html('none');
    });
    </script>
@endsection