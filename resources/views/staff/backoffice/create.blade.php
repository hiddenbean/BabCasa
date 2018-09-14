@extends('layouts.backoffice.staff.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/staff') }}">Staff</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Create new staff</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal"  method="POST" action="{{url('staffs')}}"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white" id="tab-3">
                            <li class="nav-item">
                                <a href="#" class="active show" data-toggle="tab" data-target="#general">General
                                    information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="tab" data-target="#address" class="">Address & Phone</a>
                            </li>
                        </ul> <!-- END TABS -->
                        <div class="tab-content bg-white">
                            <!-- START FIRST TAB CONTENT GENRAL -->
                            <div class="tab-pane active show" id="general">
                                <div class="row">
                                    {{$errors}}
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" class="form-control"  value="{{ old('name') }}" name="name" placeholder="Name">
                                        </div>
                                        <label class='error' for='name'>
                                                @if ($errors->has('name'))
                                                    {{ $errors->first('name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>First name</label>
                                            <input type="text" class="form-control" value="{{ old('first_name') }}"  name="first_name">
                                        </div>
                                        <label class='error' for='first_name'>
                                                @if ($errors->has('first_name'))
                                                    {{ $errors->first('first_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default ">
                                            <label>Last name</label>
                                            <input type="text" class="form-control" value="{{ old('last_name') }}"  name="last_name">
                                        </div>
                                        <label class='error' for='last_name'>
                                                @if ($errors->has('last_name'))
                                                    {{ $errors->first('last_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ old('email') }}"  name="email" placeholder="Email">
                                        </div>
                                        <label class='error' for='email'>
                                                @if ($errors->has('email'))
                                                    {{ $errors->first('email') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <label class='error' for='password'>
                                                @if ($errors->has('password'))
                                                    {{ $errors->first('password') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default input-group">
                                            <div class="form-input-group">
                                                <label>Birthday</label>
                                                <input type="text" name="birthday" value="{{ old('birthday') }}"  class="form-control" placeholder="Birthday"
                                                    id="birthday">
                                            </div>
                                            <label class='error' for='birthday'>
                                                    @if ($errors->has('birthday'))
                                                        {{ $errors->first('birthday') }}
                                                    @endif
                                            </label> 
                                            <div class="input-group-append ">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label for="">Profile Type</label> 
                                                <select class="cs-select cs-skin-slide cs-transparent" value="{{ old('profile_id') }}"  name="profile_id" data-init-plugin="cs-select">
                                                   @foreach($profiles as $profile)
                                                <option value="{{$profile->id}}" >{{$profile->profileLang->first()->reference}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="radio radio-success">
                                            <input type="radio" value="male" name="gender" id="male">
                                            <label for="male">Male</label>
                                            <input type="radio" checked="checked" value="female" name="gender" id="female">
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_staff"
                                                alt="" srcset="" width="100">
                                            <label for="path_staff" class="choose_photo">
                                                <span>
                                                    <i class="fa fa-image"></i> Choisir une photo</span>
                                            </label>
                                            <input type="file" id="path_staff" name="path" class="form-control hide">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- END FIRST TAB CONTENT GENRAL -->
                            <!-- START FIRST TAB CONTENT ADDRESS -->
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address tow</label>
                                            <input type="text" class="form-control" name="address_tow" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>Full name</label>
                                            <input type="text" class="form-control" name="ful_name" placeholder="Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>Zip code</label>
                                            <input type="text" class="form-control" name="zip_code" placeholder="Zip code">
                                        </div>
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group form-group-default">
                                            <label>Country</label>
                                            <select class="cs-select cs-skin-slide cs-transparent" name="country_id[]" data-init-plugin="cs-select">
                                                <option Selected>County</option>
                                                <option>USA (+1)</option>
                                                <option>Uzbekistan (+7)</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City">
                                        </div>
                                    </div> 
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default required has-error">
                                            <label>Phone one </label>
                                            <input type="text" class="form-control error" name="phone">
                                        </div><label class="error" for="phone">This field is required.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Phone tow </label>
                                            <input type="text" class="form-control" name="phone_tow">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Fax </label>
                                            <input type="text" class="form-control" name="fax">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- END FIRST TAB CONTENT ADDRESS -->
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#birthday').datepicker();
        });
    </script>
@stop