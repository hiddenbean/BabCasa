@extends('layouts.backoffice.staff.app')

@section('before_css')
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}">
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
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
                        <a href="{{ url('staff') }}">Staff</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('staff/') }}">ID : </a>
                    </li>
                    <li class="breadcrumb-item active">
                        edit 
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
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Address
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group form-group-default form-group-default-select2 required">
                                    <label class="">Country</label>
                                    <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
                                        <option value="NV">Morocco (MA)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group form-group-default required">
                                    <label>Address</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-default">
                                    <label>Line 2</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>ZIP code</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Phone
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2 required">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
                                            <option value="NV">Morocco (+212)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" />
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
                                            title= "<p class='tooltip-text'>You can use this form to create a new detail if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Status : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">                                    
                                        </div>
                                        <div class="col-md-6">
                                            <a  href="" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                            <form action="" method="POST">
                                                {{ csrf_field() }}
                                                <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                            </form>
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
                                        Rest password
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new detail if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="" class="btn btn-block btn-transparent"><strong>send password rest link</strong></a>                                    
                                        </div>
                                    </div>
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <a href="javascript:;" data-toggle="modal" data-target="#modalSlideUp" class="btn btn-block text-danger"><strong>generate a new password</strong></a>
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
                                                    <a href="javascript:;" data-category-id="" class="list-group-item list-group-item-action">test</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-15">
                                            <div class="col-md-8 m-t-5">
                                                Profile : <span id="selected-parent-name">none<span>
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

@include('staff.backoffice.staff.componments.modal_password_gen')
@endsection

@section('before_script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>    
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
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
            $('#category_parent').val($(this).data('category-id'));
            $('#selected-parent-name').html($(this).text());
        });
    
        $('#list-categories-clear').click( function () {
            $('.list-categories a').removeClass('active');
            $('#category_parent').val('');
            $('#selected-parent-name').html('none');
        });
              
        </script>
@endsection
