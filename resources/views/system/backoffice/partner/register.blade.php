@extends('layouts.backoffice.app')

@section('before_css')
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}">
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}">
@endsection

@section('body')
<div class="register-container p-t-30 register-staff-width" style="height:auto">
    <div class="d-flex justify-content-center flex-column">
        <div class="logo_text">  
            <div class="logo_text">
                <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60"/>
            </div>
        </div>
    <h3>Become an affiliate</h3>
        <p>
            To join the affiliate programe of BABCasa you have to fill the forms below.<br>
        </p>
        <p class="small uppercase b-b b-dashed b-grey p-b-15">
            note : Fields marked with <span class="text-danger">*</span> are required
        </p>
            <form action="{{url('register')}}" method="POST" id="form" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default required">
                                                <label>Username</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                                <label class="error" for="name">
                                                    {{ $errors->has('name') ? $errors->first('name') : "" }}
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default required">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                                                <label class="error p-l-15" for="email">
                                                    {{ $errors->has('email') ? $errors->first('email') : "" }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default required">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default required">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-group-default">
                                        <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_staff"
                                            alt="" srcset="" width="200" style="margin-left: calc(50% - 105px);" class="m-t-15 m-b-20">
                                        <label for="path_staff" class="choose_photo">
                                            <span>
                                                <i class="fa fa-image"></i> Click here to uploade picture</span>
                                        </label>
                                        <input type="file" id="path_staff" name="path" class="form-control hide">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Administrator informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">
                                        <label class="error" for="first_name">
                                            {{ $errors->has('first_name') ? $errors->first('first_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
                                        <label class="error" for="last_name">
                                            {{ $errors->has('last_name') ? $errors->first('last_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="admin_email" value="{{old('admin_email')}}">
                                        <label class="error" for="admin_email">
                                            {{ $errors->has('admin_email') ? $errors->first('admin_email') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2 required">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{old('code_country.0') == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="country_code">
                                            {{ $errors->has('country_code.0') ? $errors->first('country_code.0') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Phone number</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{old('numbers.0')}}" />
                                            <label class="error p-l-15" for="numbers.0">
                                            {{ $errors->has('numbers.0') ? $errors->first('numbers.0') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Company informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Company name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{old('company_name')}}">
                                        <label class="error" for="company_name">
                                            {{ $errors->has('company_name') ? $errors->first('company_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-12">
                                    <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">About company activities</label>
                                    <div class="summernote-wrapper bg-white">
                                        <div id="summernote">{!!old('about')!!} </div>
                                        <label class="error" for="about">
                                                {{ $errors->has('about') ? $errors->first('about') : "" }}
                                            </label> 
                                        <input type="hidden" name="about" id="description"  value="{{old('about')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Taxe ID</label>
                                    <input type="text" class="form-control" name="taxe_id" value="{{old('taxe_id')}}">
                                    <label class="error" for="taxe_id">
                                        {{ $errors->has('taxe_id') ? $errors->first('taxe_id') : "" }}
                                    </label> 
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Company Address
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
                                    <label class="error p-l-15" for="address_two">
                                        {{ $errors->has('address_two') ? $errors->first('address_two') : "" }}
                                    </label>
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
                                        Company phones
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2 required">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{old('code_country.1') == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.1') ? $errors->first('code_country.1') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Phone number</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{old('numbers.1')}}" />
                                            <label class="error p-l-15" for="numbers.1">
                                            {{ $errors->has('numbers.1') ? $errors->first('numbers.1') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{old('code_country.2') == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.2') ? $errors->first('code_country.2') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Phone number 2</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{old('numbers.2')}}" />
                                            <label class="error p-l-15" for="numbers.2">
                                            {{ $errors->has('numbers.2') ? $errors->first('numbers.2') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{old('code_country.3') == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.3') ? $errors->first('code_country.3') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Fax number</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{old('numbers.3')}}" />
                                            <label class="error p-l-15" for="numbers.3">
                                            {{ $errors->has('numbers.3') ? $errors->first('numbers.3') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="row col-md-12">
                                <div class="checkbox check-success"> 
                                    <input type="checkbox" name="approval" id="approval" @if(old('approval')) checked @endif>
                                    <label for="approval">I have read and approve approve <a hre="#">the terms and conditions of babcasa.com</a></label>
                                </div>
                                        <label class="error" for="approval">
                                                {{ $errors->has('approval') ? $errors->first('approval') : "" }}
                                            </label> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md-12">
                                <div class="checkbox check-success">
                                    <input type="checkbox" name="is_register_to_newsletter"id="newsletter" @if(old('is_register_to_newsletter')) checked @endif>
                                    <label for="newsletter">I want to recieve the lastest offers and updates</label>
                                </div>
                            </div>
                        </div>
                        <div class="row m-b-10 p-t-10 b-t b-dashed b-grey">
                            <div class="col-lg-6">
                                <a href="#" class="small">Help? Contact Support</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="{{ url('http://partner.babcasa.com') }}" class="small">Cancel</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-cons m-t-10" type="submit" id="click"> 
                                    Sign-up 
                                </button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class=" container-fluid  container-fixed-lg footer">
    <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
            <span class="hint-text">Copyright © 2018 </span>
            <span class="font-montserrat">BABCasa</span>.
            <span class="hint-text">All rights reserved. </span>
            <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
        </p>
        
        <p class="small no-margin pull-right sm-pull-reset">
            <a id="langs" href="javascript:;">{{ LaravelLocalization::getCurrentLocaleName() }} ({{ LaravelLocalization::getCurrentLocaleRegional() }})</a>
            <div class="dropup-content">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="small" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }} ({{ $properties['regional'] }})
                    </a>
                @endforeach
            </div>
        </p>
        <div class="clearfix"></div>
    </div>
</div>
@stop

@section('before_script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>    
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
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
        $("#click").click( function () {
            $('#description').val($('#summernote').summernote().code());
            $('#form').submit();
        });

        $('#summernote').summernote({height: 250});

        </script>
@endsection


@section('after_script')
    <script>
    $('#langs').click(function() {
        $('.dropup-content').show();
    });

    $('.dropup-content a').click(function() {
        $('.dropup-content').hide();
    });

    $(document).mouseup(function(e) 
    {
        var container = $(".dropup-content");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.hide();
        }
    });
    </script>
@stop