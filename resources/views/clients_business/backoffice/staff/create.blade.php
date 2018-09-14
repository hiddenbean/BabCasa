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
                    <a href="{{ url('/clients/business') }}">Clients business</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Create new clients business</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal">
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
                                            <input type="text" class="form-control" name="company_name" placeholder="Company name">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input type="passwod" class="form-control" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>About</label>
                                            <textarea name="about" class="form-control">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Trade registry</label>
                                            <input type="text" class="form-control" name="trade_registry" placeholder="Trade registry">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Ice</label>
                                            <input type="text" class="form-control" name="ice" placeholder="Ice">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Taxe id</label>
                                            <input type="passwod" class="form-control" name="taxe_id" placeholder="Taxe id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" data-init-plugin="switchery" data-size="small" data-color="primary" checked="checked" /> 
                                        <label for="">Is register to newsletter</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" data-init-plugin="switchery" data-size="small" data-color="primary" checked="checked" /> 
                                        <label for="">Approve</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_photo"
                                                alt="" srcset="" width="100">
                                            <label for="path_photo" class="choose_photo">
                                                <span>
                                                    <i class="fa fa-image"></i> Choisir une photo</span>
                                            </label>
                                            <input type="file" id="path_photo" name="path" class="form-control hide">
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
                                            <input type="text" class="form-control error" name="first_name">
                                        </div><label class="error" for="first_name">This field is required.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Phone tow </label>
                                            <input type="text" class="form-control" name="last_name">
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
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#birthday').datepicker();

            /* Image preview */
            $("#path_photo").on("change", function () {
                var _this = this;
                var image_preview = $("#image_preview_photo");
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