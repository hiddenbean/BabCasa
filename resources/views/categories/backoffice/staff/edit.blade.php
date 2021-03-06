@extends('layouts.backoffice.staff.app')

@section('before_css')
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
                        <a href="{{ url('/categories') }}">categories</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/categories/1') }}">ID : {{ $category->id }}</a>
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
                Add a categorie
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
         <form id="form-personal"  method="POST" action="{{url('categories/'.$category->id)}}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Category name</label>
                                        <input type="text" class="form-control" name="reference" value="{{$category->categoryLang()->reference}}">
                                        <label class='error' for='reference'>
                                            @if ($errors->has('reference'))
                                                {{ $errors->first('reference') }}
                                            @endif
                                        </label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">description</label>
                            <div class="summernote-wrapper bg-white">
                                <div id="summernote">{!!$category->categoryLang()->description!!}</div>
                                    <input type="hidden" name="description" id='description'>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Catrgory details 
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
                                        <div class="col-md-5">
                                             <select id="lstview1" class="form-control" size="13" multiple="multiple">
                                                 @foreach($details as $detail)
                                                <option value="{{$detail->id}}">{{$detail->detailLang()->value}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="lstview1_undo" class="btn btn-transparent-danger btn-block"><i class="fas fa-ban"></i> <strong>undo</strong></button>
                                            <button type="button" id="lstview1_rightAll" class="btn btn-transparent btn-block"><i class="fas fa-forward"></i></button>
                                            <button type="button" id="lstview1_rightSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-right fa-lg"></i></button>
                                            <button type="button" id="lstview1_leftSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-left fa-lg"></i></button>
                                            <button type="button" id="lstview1_leftAll" class="btn btn-transparent btn-block"><i class="fas fa-backward"></i></button>
                                            <button type="button" id="lstview1_redo" class="btn btn-transparent btn-block"><i class="fas fa-sync-alt"></i> redo</button>
                                        </div>
                                         <div class="col-md-5">
                                            <select name="details[]" id="lstview1_to" class="form-control" size="13" multiple="multiple">
                                              @foreach($category->details as $detail)
                                                <option value="{{$detail->id}}">{{$detail->detailLang()->value}}</option>
                                               @endforeach
                                               </select>
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
                                        Catrgory attributes 
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
                                        <div class="col-md-5">
                                           <select id="lstview2" class="form-control" size="13" multiple="multiple">
                                                @foreach($attributes as $attribute)
                                                    <option value="{{$attribute->id}}">{{$attribute->attributeLang()->reference}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="lstview2_undo" class="btn btn-transparent-danger btn-block"><i class="fas fa-ban"></i> <strong>undo</strong></button>
                                            <button type="button" id="lstview2_rightAll" class="btn btn-transparent btn-block"><i class="fas fa-forward"></i></button>
                                            <button type="button" id="lstview2_rightSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-right fa-lg"></i></button>
                                            <button type="button" id="lstview2_leftSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-left fa-lg"></i></button>
                                            <button type="button" id="lstview2_leftAll" class="btn btn-transparent btn-block"><i class="fas fa-backward"></i></button>
                                            <button type="button" id="lstview2_redo" class="btn btn-transparent btn-block"><i class="fas fa-sync-alt"></i> redo</button>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="attribute[]" id="lstview2_to" class="form-control" size="13" multiple="multiple">
                                                @foreach($category->attributes as $attribute)
                                                    <option value="{{$attribute->id}}">{{$attribute->attributeLang()->reference}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button type="submit" id="onClick" class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear all</strong></button>
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
                                        Category parent 
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
                                        <div class="col-md-12 scroll b-t b-b b-dashed b-grey p-t-5 p-b-5">
                                            <div class="list-group list-group-root well list-categories">
                                                <div class="list-group">
                                                    @foreach($categories as $cat)
                                                        <a href="#" data-category-id="{{ $cat->id }}" class="list-group-item list-group-item-action">{{ $cat->level }}{{ $cat->categoryLang()->reference }}</a>
                                                    @endforeach
                                                </div>
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
                                <input type="hidden" name="category_parent" id="category_parent"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <img src="@if(isset($category->picture->path)) {{Storage::url($category->picture->path)}} @else{{ asset('img/img_placeholder.png') }}@endif" id="image_preview_staff"
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Category translations
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
                                        <div class="col-md-12">
                                            Available in : 
                                             @foreach($category->categoryLangs as $categoryLang)
                                                @if($categoryLang->reference != "")
                                                    <strong><a href="#">{{$categoryLang->lang->name}}</a></strong>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-12">
                                            <a href="{{url('categories/'.$category->id.'/translations')}}" class="btn btn-transparent"><strong><i class="fas fa-language p-r-10 fa-lg"></i>Add or Edit translations</strong></a>                                    
                                        </div>
                                    </div>
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

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/multiselect.min.js') }}"></script>
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
    $('#summernote').summernote({height: 250});
    $('#lstview1, #lstview2').multiselect();

    $('#list-categories-clear').click( function () {
        $('.list-categories a').removeClass('active');
        $('#category_parent').val('');
        $('#selected-parent-name').html('none');
    });
    $('#onClick').on('click', function(){ 
              
                    $('#description').val($('#summernote').summernote().code());
                    console.log($('#summernote').summernote().code());
                    //this.form.submit();

                });
    </script>
@endsection