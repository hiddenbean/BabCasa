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
                    <a href="{{ url('/categories') }}">categories</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Create new category</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal"  method="POST" action="{{url('categories')}}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Category reference</label>
                                    <input type="text" class="form-control" name="reference" placeholder="Category reference">
                                        <label class='error' for='reference'>
                                                @if ($errors->has('reference'))
                                                    {{ $errors->first('reference') }}
                                                @endif
                                            </label> 
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Categories parent</label>
                                    <select class="cs-select cs-skin-slide cs-transparent" name="category_id" data-init-plugin="cs-select">
                                        <option value="0">No category parent</option> 
                                        @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->categoryLang->first()->reference}}</option> 
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    <label class='error' for='description'>
                                            @if ($errors->has('description'))
                                                {{ $errors->first('description') }}
                                            @endif
                                        </label> 
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
                        <button class="btn btn-primary" type="submit">Save</button>
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
                    alert("Upload an image");
                }
            } 
        });
    </script>
@stop