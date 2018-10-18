@extends('layouts.backoffice.staff.app')
@section('css_before')
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
              <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />

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
                    <a href="{{ url('/attributes') }}">attributes</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Update attribute</strong> </h4>
             <label class='error' >
             @if($errors->count()>0)
                You have {{$errors->count()}} ERROR(S) !!
            @endif
             </label>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal"  method="POST" action="{{url('attributes/'.$attribute->id)}}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>attribute reference</label>
                                <input type="text" class="form-control" name="reference" value="{{$attribute->attributeLang->first()->reference}}" placeholder="attribute reference">
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
                                    <label>attributes type</label>
                                    <select class="cs-select cs-skin-slide cs-transparent" name="type" data-init-plugin="cs-select">
                                    <option value="numeric" @if($attribute->type == 'numeric') selected @endif>numeric</option> 
                                    <option value="text" @if($attribute->type == 'text') selected @endif>text</option> 
                                    <option value="date" @if($attribute->type == 'date') selected @endif>date</option> 
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{$attribute->attributeLang->first()->description}}</textarea>
                                    <label class='error' for='description'>
                                            @if ($errors->has('description'))
                                                {{ $errors->first('description') }}
                                            @endif
                                        </label> 
                                </div>
                            </div>
                        </div>   
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>categories</label>
                                    <select class="full-width select2-hidden-accessible" name="categories[]" data-init-plugin="select2" multiple="" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" 
                                            @if($attribute->categories()->wherePivot('category_id',$category->id)->first()) selected @endif>{{$category->categoryLang->first()->reference}}</option>
                                        @endforeach
                                    
                                    </select>
                                       
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

        <script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
            <script src="{{ asset('plugins/select2/js/select2.js') }}" type="text/javascript"></script>
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