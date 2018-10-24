@extends('layouts.backoffice.staff.app')

@section('before_css')
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}">
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
                        <a href="{{ url('/tags') }}">Staff</a>
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
                Create a new staff member
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
        <form action="{{url('tags')}}" method="POST" id="form">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Account informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="tag">
                                        <label class="error" for="tag">
                                            {{ $errors->has('tag') ? $errors->first('tag') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default input-group no-margin required">
                                        <div class="form-input-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">@babcasa.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="error p-l-15" for="tag">
                                        {{ $errors->has('tag') ? $errors->first('tag') : "" }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Create new password</label>
                                        <input type="password" class="form-control" name="tag">
                                        <label class="error" for="tag">
                                            {{ $errors->has('tag') ? $errors->first('tag') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" name="tag">
                                        <label class="error" for="tag">
                                            {{ $errors->has('tag') ? $errors->first('tag') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        General informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="tag">
                                        <label class="error" for="tag">
                                            {{ $errors->has('tag') ? $errors->first('tag') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="tag">
                                        <label class="error" for="tag">
                                            {{ $errors->has('tag') ? $errors->first('tag') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-group-default input-group required">
                                        <div class="form-input-group">
                                            <label>Birthday</label>
                                            <input type="email" class="form-control" placeholder="Pick a date" id="myDatepicker">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>gender</label>
                                        <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                            <option value="">         </option>
                                            <option value="1">male</option>
                                        </select>
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
                                            Staff Profile 
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
                                            <div class="col-md-12 scroll b-t b-b b-dashed b-grey p-b-5">
                                                <div class="list-group list-group-root well list-categories">
                                                    <a href="#" data-category-id="" class="list-group-item list-group-item-action">test</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-15">
                                            <div class="col-md-8 m-t-5">
                                                Parent : <span id="selected-parent-name">none<span>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" id="list-categories-clear" class="btn btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="category_parent" id="category_parent" />
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_staff"
                                    alt="" srcset="" width="200" style="margin-left: calc(50% - 105px);">
                                <label for="path_staff" class="choose_photo">
                                    <span>
                                        <i class="fa fa-image"></i> Click here to uploade picture</span>
                                </label>
                                <input type="file" id="path_staff" name="path" class="form-control hide">
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
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/multiselect.min.js') }}"></script>
    <script>
    $("#save").click( function () {
        $('#form').attr('action', '{{ url('tags') }}');
        $('#form').submit();
    });

    $("#save_new").click( function () {
        $('#form').attr('action', '{{ url('tags')."/create" }}');
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

    $('#myDatepicker').datepicker();
    </script>
@endsection