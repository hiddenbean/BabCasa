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
                        <a href="{{ url('/profiles') }}">Staff Profiles</a>
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
                Create a new staff Profile
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
        <form action="{{url('profiles')}}" method="POST" id="form">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Profile name</label>
                                        <input type="text" class="form-control" name="reference">
                                        <label class="error" for="reference">
                                            {{ $errors->has('reference') ? $errors->first('reference') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">description</label>
                                    <div class="summernote-wrapper bg-white">
                                        <div id="summernote"></div>
                                        <input type="hidden" name="description" id="description">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-15">
                                <div class="col-md-12">
                                    <h5>Permissions</h5>
                                </div>
                            </div>
                            <div class="row">
                             @foreach($permissions as $permission)
                                <div class="col-md-4 m-t-10">
                                    <div class="row">
                                        <div class="col-md-6 p-t-5">
                                        <input type="hidden" name="permissions[]" value="{{$permission->id}}">
                                            <span class="uppercase"> {{$permission->permissionLang()->reference}}</span> 
                                            <a 
                                                href="javascript:;" 
                                                data-toggle="tooltip" 
                                                data-placement="bottom" 
                                                data-html="true" 
                                                trigger="click" 
                                                title= "<p class='tooltip-text'>{{$permission->permissionLang()->description}}.<br>
                                                        If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                                <i class="fas fa-question-circle"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="cs-select cs-skin-slide"  name="can[]" data-init-plugin="cs-select">
                                                <option value="0">none</option>
                                                <option value="1">read</option>
                                                <option value="2">read/wright</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                            <a href="javascript:;" id="save" class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="javascript:;" id="save_new" class="btn btn-block"><strong>save & new</strong></a>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <a href="{{ url()->current() }}" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear all</strong></a>
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
                                        Profile langugue
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
    $("#save").click( function () {
         $('#description').val($('#summernote').summernote().code());
        $('#form').attr('action', '{{ url('profiles') }}');
        $('#form').submit();
    });

    $("#save_new").click( function () {
         $('#description').val($('#summernote').summernote().code());
        $('#form').attr('action', '{{ url('profiles')."/create" }}');
        $('#form').submit();
    });

    $('#summernote').summernote({height: 250});

    </script>
@endsection