@extends('layouts.backoffice.staff.app')

@section('before_css')
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}">
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
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
                        <a href="{{ url('/businesses') }}">businesses</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('businesses/'.$business->name) }}">id : {{$business->id}}</a>
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
                Edit affiliate id : {{$business->id}}
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
        <form action="{{url('businesses/'.$business->name)}}" method="POST" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
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
                                        <input type="text" class="form-control" id="name" name="name" value="{{$business->name}}">
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
                                        <input type="email" class="form-control" id="email" name="email" value="{{$business->email}}">
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
                                        Administrator informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$business->first_name}}">
                                        <label class="error" for="first_name">
                                            {{ $errors->has('first_name') ? $errors->first('first_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$business->last_name}}">
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
                                        <input type="email" class="form-control" name="admin_email" value="{{$business->admin_email}}">
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
                                            <option value="{{$country->id}}" {{$business->phones()->where('tag','admin')->first()->country->id == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
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
                                            <input type="text" class="form-control" name="numbers[]" value="{{$business->phones()->where('tag','admin')->first()->number}}" />
                                            <input type="hidden" name="phone_id[]" value="{{$business->phones()->where('tag','admin')->first()->id}}">
                                            <label class="error p-l-15" for="numbers.0">
                                            {{ $errors->has('numbers.0') ? $errors->first('numbers.0') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Business informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Business name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{$business->company_name}}">
                                        <label class="error" for="company_name">
                                            {{ $errors->has('company_name') ? $errors->first('company_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-12">
                                    <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">About Business activities</label>
                                    <div class="summernote-wrapper bg-white">
                                        <div id="summernote">{!!$business->about!!} </div>
                                        <input type="hidden" name="about" id="description"  value="{{$business->about}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Taxe ID</label>
                                    <input type="text" class="form-control" name="taxe_id" value="{{$business->taxe_id}}">
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
                                            <option value="{{$country->id}}" {{$business->address->country->id == $country->id ? 'selected' : ''}}>{{$country->name}} ({{$country->alpha_2_code}})</option>
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
                                    <input type="text" class="form-control" name="address" value="{{$business->address->address}}" />
                                </div>
                                <label class="error p-l-15" for="address">
                                    {{ $errors->has('address') ? $errors->first('address') : "" }}
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-default">
                                    <label>Line 2</label>
                                    <input type="text" class="form-control" name="address_two" value="{{$business->address->address_two}}" />
                                    <label class="error p-l-15" for="address_two">
                                        {{ $errors->has('address_two') ? $errors->first('address_two') : "" }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{$business->address->city}}" />
                                    </div>
                                    <label class="error p-l-15" for="city">
                                        {{ $errors->has('city') ? $errors->first('city') : "" }}
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>ZIP code</label>
                                        <input type="text" class="form-control" name="zip_code" value="{{$business->address->zip_code}}" />
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
                                            <option value="{{$country->id}}" {{isset($company_phones[0]) ? $company_phones[0]->country->id == $country->id ? 'selected' : '' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
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
                                            <input type="text" class="form-control" name="numbers[]" value="{{isset($company_phones[0]) ? $company_phones[0]->number : ''}}" />
                                            <input type="hidden" name="phone_id[]" value="{{isset($company_phones[0]) ? $company_phones[0]->id :''}}">

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
                                            <option value="{{$country->id}}" {{isset($company_phones[1]) ? $company_phones[1]->country->id == $country->id ? 'selected' : '' : ''}}>{{$country->name}} ({{$country->phone_code}})</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.2') ? $errors->first('code_country') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Phone number 2</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{isset($company_phones[1]) ? $company_phones[1]->number : ''}}" />
                                            <input type="hidden" name="phone_id[]" value="{{isset($company_phones[1]) ? $company_phones[1]->id : ''}}">

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
                                            <option value="{{$country->id}}" {{isset($company_fax) ? $company_fax->country->id == $country->id ? 'selected' : '' :''}}>{{$country->name}} ({{$country->phone_code}})</option>
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
                                            <input type="text" class="form-control" name="numbers[]" value="{{isset($company_fax) ?$company_fax->number : ''}}" />
                                            <input type="hidden" name="phone_id[]" value="{{isset($company_fax) ? $company_fax->id:''}}">

                                            <label class="error p-l-15" for="numbers.3">
                                            {{ $errors->has('numbers.3') ? $errors->first('numbers.3') : "" }}
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
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" data-html="true" trigger="click" title="" data-original-title="<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                 <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Status : <strong> Publish </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong>{{$business->created_at}}</strong>
                                        </div>
                                    </div>
                                    @if($business->updated_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong>{{$business->updated_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button id="onClick" class="btn btn-block"><i class="fas fa-pen"></i> <strong>Edit</strong></button   >                                    
                                         </div>
                                        <div class="col-md-6">
                                            <a  href="{{route('delete.business',['business'=>$business->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?"  class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <img src="@if(isset($business->picture->path)) {{Storage::url($business->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" id="image_preview_staff"
                                    alt="" srcset="" width="200" style="margin-left: calc(50% - 105px);">
                                <label for="path_staff" class="choose_photo">
                                    <span>
                                        <i class="fa fa-image"></i> Click here to uploade picture</span>
                                </label>
                                <input type="file" id="path_staff" name="path" class="form-control hide">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Newsletter
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
                                <div class="checkbox check-success">
                                    <input type="checkbox" name="is_register_to_newsletter"id="checkbox" @if($business->is_register_to_newsletter) checked @endif>
                                    <label for="checkbox">Enable newsletter subscription for this affiliate</label>
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
        $("#onClick").click( function () {
            $('#description').val($('#summernote').summernote().code());
            $('#form').submit();
        });

      

        $('#summernote').summernote({height: 250});

        </script>
@endsection