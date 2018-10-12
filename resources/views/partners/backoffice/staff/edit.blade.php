@extends('layouts.backoffice.staff.app')
@section('css_before')
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/partners') }}">Partner</a>
                </li>
                <li class="breadcrumb-item active">
                    Update
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Create new Partner</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal"  method="POST" action="{{url('partners/'.$partner->name)}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <!-- START TABS -->
                        <ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white" id="tab-3">
                            <li class="nav-item">
                                <a href="#" class="active show" data-toggle="tab" data-target="#general">General information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="tab" data-target="#address" class="">Address & Phone</a>
                            </li>
                        </ul> <!-- END TABS -->
                        <div class="tab-content bg-white">
                            <!-- START FIRST TAB CONTENT GENRAL -->
                            <div class="tab-pane active show" id="general">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Company name</label>
                                            <input type="text" class="form-control" name="company_name" placeholder="Company name" value="{{$partner->company_name}}">
                                        </div>
                                        <label class='error' for='company_name'>
                                                @if ($errors->has('company_name'))
                                                    {{ $errors->first('company_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$partner->name }}" disabled>
                                        </div>
                                        <label class='error' for='name'>
                                                @if ($errors->has('name'))
                                                    {{ $errors->first('name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$partner->email}}">
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
                                            <label>About</label>
                                            <textarea name="about" class="form-control">{{$partner->about}}
                                            </textarea>
                                            <label class='error' for='about'>
                                                @if ($errors->has('about'))
                                                    {{ $errors->first('about') }}
                                                @endif
                                        </label> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Trade registry</label>
                                            <input type="text" class="form-control" name="trade_registry" placeholder="Trade registry" value="{{$partner->trade_registry}}">
                                        </div>
                                        <label class='error' for='trade_registry'>
                                                @if ($errors->has('trade_registry'))
                                                    {{ $errors->first('trade_registry') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Ice</label>
                                            <input type="text" class="form-control" name="ice" placeholder="Ice" value="{{$partner->ice}}">
                                        </div>
                                        <label class='error' for='ice'>
                                                @if ($errors->has('ice'))
                                                    {{ $errors->first('ice') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Taxe id</label>
                                            <input type="passwod" class="form-control" name="taxe_id" placeholder="Taxe id" value="{{$partner->taxe_id}}">
                                        </div>
                                        <label class='error' for='taxe_id'>
                                                @if ($errors->has('taxe_id'))
                                                    {{ $errors->first('taxe_id') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" data-init-plugin="switchery" name="is_register_to_newsletter" data-size="small" data-color="primary" @if($partner->is_register_to_newsletter) checked="checked" @endif /> 
                                        <label for="">Is register to newsletter</label>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <img src="{{{ Storage::url($partner->picture->path)}}}" id="image_preview_partner"
                                                alt="" srcset="" width="100">
                                            <label for="path_partner" class="choose_photo">
                                                <span>
                                                    <i class="fa fa-image"></i> Choisir une photo</span>
                                            </label>
                                            <input type="file" id="path_partner" name="path" class="form-control hide">
                                        </div>
                                        <label class='error' for='path'>
                                            @if ($errors->has('path'))
                                                {{ $errors->first('path') }}
                                            @endif
                                    </label> 
                                    </div>
                                </div>
                            </div> <!-- END FIRST TAB CONTENT GENRAL -->
                            <!-- START FIRST TAB CONTENT ADDRESS -->
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Name" value="{{$partner->address->address}}">
                                        </div>
                                        <label class='error' for='address'>
                                                @if ($errors->has('address'))
                                                    {{ $errors->first('address') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address tow</label>
                                            <input type="text" class="form-control" name="address_two" placeholder="Name" value="{{$partner->address->address_two}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>Full name</label>
                                            <input type="text" class="form-control" name="full_name" placeholder="Full name" value="{{ $partner->address->full_name}}">
                                        </div>
                                        <label class='error' for='full_name'>
                                                @if ($errors->has('full_name'))
                                                    {{ $errors->first('full_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>Zip code</label>
                                            <input type="text" class="form-control" name="zip_code" placeholder="Zip code" value="{{$partner->address->zip_code}}" maxlength="6" >
                                        </div>
                                        <label class='error' for='zip_code'>
                                                @if ($errors->has('zip_code'))
                                                    {{ $errors->first('zip_code') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group form-group-default">
                                            <label>Country</label>
                                            <select class="cs-select cs-skin-slide cs-transparent" name="country_id" data-init-plugin="cs-select">
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" >{{$country->name}}</option>
                                                    @endforeach 
                                        </select> 
                                        <label class='error' for='country'>
                                                @if ($errors->has('country'))
                                                    {{ $errors->first('country') }}
                                                @endif
                                        </label> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City" value="{{$partner->address->city}}">
                                        </div>
                                        <label class='error' for='city'>
                                                @if ($errors->has('city'))
                                                    {{ $errors->first('city') }}
                                                @endif
                                        </label> 
                                    </div> 
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default input-group">
                                            @if(count($partner->phones) > 0 && isset($partner->phones()->whereIn('type', ['fix', 'phone'])->get()[0]->number))
                                                <!--{{ $number0 = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[0]->number }}-->
                                                <!--{{ $number0_id = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[0]->id }}-->
                                                <!--{{ $country0_id = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[0]->country->country_id }}-->
                                                <!--{{ $country0_code = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[0]->country->code }}-->
                                            @else
                                                <!--{{ $number0 = null }}-->
                                                <!--{{ $number0_id = null }}-->
                                                <!--{{ $country0_id = null }}-->
                                                <!--{{ $country0_code = null }}-->
                                            @endif
                                            <div class="cs-input-group-addon input-group-addon d-flex">
                                                <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]"  data-init-plugin="cs-select">
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}"  @if($country0_id == $country->id) selected @endif >{{$country0_code}}</option>
                                                            @endforeach 
                                                </select>
                                            </div>
                                            <input type="hidden" name="phone_id[]" value="{{$number0_id}}">
                                            <div class="form-input-group flex-1">
                                                <label>Phone one</label>
                                                <input type="text" id="phone" name="numbers[]" value="{{$number0}}" class="form-control">
                                                @if ($errors->has('numbers.0'))
                                                <label class='error' for='phone'>{{ $errors->first('numbers.0') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default input-group">
                                            @if(count($partner->phones) > 1 && isset($partner->phones()->whereIn('type', ['fix', 'phone'])->get()[1]->number))
                                                <!--{{ $number1 = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[1]->number }}-->
                                                <!--{{ $number1_id = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[1]->id }}-->
                                                <!--{{ $country1_id = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[1]->country->country_id }}-->
                                                <!--{{ $country1_code = $partner->phones()->whereIn('type', ['phone', 'fix'])->get()[1]->country->code }}-->
                                            @else
                                                <!--{{ $number1 = null }}-->
                                                <!--{{ $number1_id = null }}-->
                                                <!--{{ $country1_id = null }}-->
                                                <!--{{ $country1_code = null }}-->
                                            @endif
                                            <div class="cs-input-group-addon input-group-addon d-flex">
                                                <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}"  @if($country1_id == $country->id) selected @endif >{{$country->code}}</option>
                                                            @endforeach 
                                                </select>
                                            </div>
                                            <input type="hidden" name="phone_id[]" value="{{$number1_id}}">
                                            <div class="form-input-group flex-1">
                                                <label>Phone two</label>
                                                <input type="text" id="phone" name="numbers[]" value="{{$number1}}" class="form-control">
                                                @if ($errors->has('numbers.1'))
                                                <label class='error' for='phone'>{{ $errors->first('numbers .1') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default input-group">
                                            @if(isset($partner->phones->where('type', 'fax')->first()->number))
                                                <!--{{ $fax = $partner->phones->where('type', 'fax')->first()->number }}-->
                                                <!--{{ $fax_id = $partner->phones->where('type', 'fax')->first()->id }}-->
                                                <!--{{ $country3_id = $partner->phones->where('type', 'fax')->first()->country->country_id }}-->
                                                <!--{{ $country3_code = $partner->phones->where('type', 'fax')->first()->country->code }}-->
                                            @else
                                                <!--{{ $fax = null }}-->
                                                <!--{{ $fax_id = null }}-->
                                                <!--{{ $country3_id = null }}-->
                                                <!--{{ $country3_code = null }}-->
                                            @endif
                                            <div class="cs-input-group-addon input-group-addon d-flex">
                                                <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}"  @if($country3_id == $country->id) selected @endif >{{$country->code}}</option>
                                                            @endforeach 
                                                </select>
                                            </div>
                                            <input type="hidden" name="fax_id" value="{{$fax_id}}">
                                            <div class="form-input-group flex-1">
                                                <label>Fax</label>
                                                <input type="text" id="phone" name="fax_number" value="{{$fax}}" class="form-control">
                                                @if ($errors->has('fax_number'))
                                                <label class='error' for='phone'>{{ $errors->first('fax_number') }}</label>
                                                @endif
                                            </div>
                                        </div> 
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
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#birthday').datepicker();
             /* Image preview */
             $("#path_partner").on("change", function () {
                var _this = this;
                var image_preview = $("#image_preview_partner");
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
                    alert("Upload an image");
                }
            } 
        });
    </script>
@stop