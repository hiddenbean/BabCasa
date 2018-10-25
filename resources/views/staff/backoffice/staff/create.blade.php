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
                        <a href="{{ url('/staff') }}">Staff</a>
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
        <form action="{{url('staff')}}" method="POST" id="form">
        {{ csrf_field() }}
        {{$errors}}
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
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                        <label class="error" for="name">
                                            {{ $errors->has('name') ? $errors->first('name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default input-group no-margin required">
                                        <div class="form-input-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">@babcasa.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="error p-l-15" for="email">
                                        {{ $errors->has('email') ? $errors->first('email') : "" }}
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
                                        <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                                        <label class="error" for="first_name">
                                            {{ $errors->has('first_name') ? $errors->first('first_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                                        <label class="error" for="last_name">
                                            {{ $errors->has('last_name') ? $errors->first('last_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-group-default input-group required">
                                        <div class="form-input-group">
                                            <label>Birthday</label>
                                            <input type="date" class="form-control" name="birthday" placeholder="Pick a date" id="myDatepicker" value="{{old('irthday')}}">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>gender</label>
                                        <select class="cs-select cs-skin-slide" data-init-plugin="cs-select" name="gender_id">
                                            <option value="">         </option>
                                            @foreach($genders as $gender)
                                            <option value="{{$gender->id}}" {{old('gender_id') == $gender->id ? 'selected' : ''}}>{{$gender->genderLang()->reference}}</option>
                                            @endforeach
                                        </select>
                                         <label class="error" for="gender_id">
                                            {{ $errors->has('gender_id') ? $errors->first('gender_id') : "" }}
                                        </label> 
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
                                    <select class="full-width" data-placeholder="Select Country" name="country_id" data-init-plugin="select2">
                                         @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{old('country_id') == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->alpha_2_code}})</option>
                                            @endforeach
                                    </select>
                                      <label class="error p-l-15" for="country_id">
                                        {{ $errors->has('country_id') ? $errors->first('country_id') : "" }}
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group form-group-default required">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}" />
                                </div>
                                 <label class="error p-l-15" for="address">
                                        {{ $errors->has('address') ? $errors->first('address') : "" }}
                                    </label>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-default">
                                    <label>Line 2</label>
                                    <input type="text" class="form-control" name="address_two" value="{{old('address_two')}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{old('city')}}" />
                                    </div>
                                     <label class="error p-l-15" for="city">
                                        {{ $errors->has('city') ? $errors->first('city') : "" }}
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>ZIP code</label>
                                        <input type="text" class="form-control" name="zip_code" value="{{old('zip_code')}}" />
                                    </div>
                                     <label class="error p-l-15" for="zip_code">
                                        {{ $errors->has('zip_code') ? $errors->first('zip_code') : "" }}
                                    </label>
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
                                        <select class="full-width" data-placeholder="Select Country" name="code_country" data-init-plugin="select2">
                                             @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{old('code_country') == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" name="number" value="{{old('number')}}" />
                                        <label class="error p-l-15" for="number">
                                        {{ $errors->has('number') ? $errors->first('number') : "" }}
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
                                                @foreach($profiles as $Profile)
                                                    <a href="javascript:;" data-category-id="{{$Profile->id}}" class="list-group-item list-group-item-action">{{$Profile->profileLang()->reference}}</a>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-15">
                                            <div class="col-md-8 m-t-5">
                                                Profile : <span id="selected-parent-name">none<span>
                                                <label class="error p-l-15" for="profile_id">
                                                    {{ $errors->has('profile_id') ? $errors->first('profile_id') : "" }}
                                                </label>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="button" id="list-categories-clear" class="btn btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="profile_id" id="profile_id" />
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
        $("#save").click( function () {
            $('#form').attr('action', '{{ url('staff') }}');
            $('#form').submit();
        });

        $("#save_new").click( function () {
            $('#form').attr('action', '{{ url('staff')."/create" }}');
            $('#form').submit();
        });
        $(".list-categories a").click( function () {
            $(".list-categories a").removeClass('active');
            $(this).addClass('active');
            $('#profile_id').val($(this).data('category-id'));
            $('#selected-parent-name').html($(this).text());
        });
    
        $('#list-categories-clear').click( function () {
            $('.list-categories a').removeClass('active');
            $('#profile_id').val('');
            $('#selected-parent-name').html('none');
        });
              
        </script>
@endsection