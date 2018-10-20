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
                        <a href="{{ url('/attributes') }}">attributes</a>
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
                Edit attribute 
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
        <form action="{{url('attributes/'.$attribute->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Attribute name</label>
                                        <input type="text" class="form-control" name="reference" value="{{$attribute->attributeLang()->reference}}">
                                        <label class='error' for='reference'>
                                            @if ($errors->has('reference'))
                                                {{ $errors->first('reference') }}
                                            @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                            <div class="form-group form-group-default required">
                                <label>attributes type</label>
                                <select class="cs-select cs-skin-slide cs-transparent" name="type" data-init-plugin="cs-select">
                                <option value="numeric" @if($attribute->type == 'numeric') selected @endif>Numeric Values</option> 
                                <option value="text" @if($attribute->type == 'text') selected @endif>Text Values</option> 
                                <option value="date"  @if($attribute->type == 'date') selected @endif>Date Values</option> 
                                </select> 
                            </div>
                        </div>
                            </div>
                        </div>
                        
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">description</label>
                            <div class="summernote-wrapper bg-white">
                                <div id="summernote">{!!$attribute->attributeLang()->description!!}</div>
                                 <input type="hidden" name="description" id="description">
                            </div>
                        </div>
                    </div>
                    
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
                                        <div class="col-md-5">
                                            <select id="lstview" class="form-control" size="13" multiple="multiple">
                                               @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->categoryLang()->reference}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="lstview_undo" class="btn btn-transparent-danger btn-block"><i class="fas fa-ban"></i> <strong>undo</strong></button>
                                            <button type="button" id="lstview_rightAll" class="btn btn-transparent btn-block"><i class="fas fa-forward"></i></button>
                                            <button type="button" id="lstview_rightSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-right fa-lg"></i></button>
                                            <button type="button" id="lstview_leftSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-left fa-lg"></i></button>
                                            <button type="button" id="lstview_leftAll" class="btn btn-transparent btn-block"><i class="fas fa-backward"></i></button>
                                            <button type="button" id="lstview_redo" class="btn btn-transparent btn-block"><i class="fas fa-sync-alt"></i> redo</button>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="categories[]" id="lstview_to" class="form-control" size="13" multiple="multiple">
                                             @foreach($attribute->categories as $category)
                                                 <option value="{{$category->id}}">{{$category->categoryLang()->reference}}</option>
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
                            <div class="row">
                                <div class="col-md-12">
                                    Status : <strong>@if($attribute->deleted_at == NULL) Publish @else Removed @endif</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : <strong>{{$attribute->created_at}}</strong>
                                </div>
                            </div>
                            @if($attribute->updated_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>{{$attribute->updated_at}}</strong>
                                </div>
                            </div>
                            @endif
                            @if($attribute->deleted_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>{{$attribute->deleted_at}}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-6">
                                   <button id="onClick" class="btn btn-block"><i class="fas fa-pen"></i> <strong>Edit</strong></button   >                                    
                                </div>

                                <div class="col-md-6">
                                    <a  href="{{route('delete.attribute',['attribute'=>$attribute->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                
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
                                             @foreach($attribute->attributeLangs as $attributeLang)
                                        @if($attributeLang->reference != "")
                                            <strong><a href="#">{{$attributeLang->lang->name}}</a></strong> ,
                                        @endif
                                    @endforeach
                                        </div>
                                    </div>
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-12">
                                            <a href="{{url('attributes/'.$attribute->id.'/translations')}}" class="btn btn-transparent"><i class="fas fa-plus"></i> <strong>Add an other translation</strong></a>                                    
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
    $(".list-categories a").click( function () {
        $(".list-categories a").removeClass('active');
        $(this).addClass('active');
        $('#category_parent').val($(this).text());
        $('#selected-parent-name').html($(this).text());
    });
    $('#summernote').summernote({height: 250});
    $('#lstview').multiselect();
    $('#onClick').on('click', function(){ 
        $('#description').val($('#summernote').summernote().code());
     });

    $('#list-categories-clear').click( function () {
        $('.list-categories a').removeClass('active');
        $('#selected-parent-name').html('none');
    });
    </script>
@endsection