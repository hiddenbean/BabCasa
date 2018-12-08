@extends('layouts.backoffice.partner.app')

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
                        <a href="{{ url('discounts/') }}">discounts</a>
                    </li>
                    <li class="breadcrumb-item">
                    <a href="{{ url('discounts/'.$discount->id) }}">ID : {{$discount->id}}</a>
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
                Edit discount id :  {{$discount->id}}
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
    <form id="form-personal"  method="POST" action="{{ url('discounts/'.$discount->id)}}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>discount</label>
                                        <input type="text" class="form-control" name="reference" value="{{$discount->discountLang()->reference}}">
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
                        <div class="col-md-6">
                            <div class="form-group form-group-default input-group required">
                                <div class="form-input-group">
                                <label>Start at </label>
                                    <input type="date" class="form-control" name="start_at" value="{{date('Y-m-d',strtotime($discount->start_at))}}">
                                    <label class='error' for='start_at'>
                                        @if ($errors->has('start_at'))
                                            {{ $errors->first('start_at') }}
                                        @endif
                                    </label> 
                                </div>
                                <div class="input-group-append ">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default input-group required">
                                <div class="form-input-group">
                                    <label>End at</label>
                                    <input type="date" class="form-control" name="end_at" value="{{date('Y-m-d',strtotime($discount->end_at))}}">
                                    <label class='error' for='end_at'>
                                        @if ($errors->has('end_at'))
                                            {{ $errors->first('end_at') }}
                                        @endif
                                    </label> 
                                </div>
                                <div class="input-group-append ">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                                <label>Percentage</label>
                                <input type="text" class="form-control" name="percentage"  value="{{$discount->percentage }}">
                                <label class='error' for='percentage'>
                                    @if ($errors->has('percentage'))
                                        {{ $errors->first('percentage') }}
                                    @endif
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">description</label>
                            <div class="summernote-wrapper bg-white">
                            <div id="summernote">{!!$discount->discountLang()->description!!}</div>
                                <input type="hidden" name="description" id="description">
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
                                            @foreach($discount->discountLangs as $discountLang)
                                                @if($discountLang->reference != "")
                                                    <strong><a href="#">{{$discountLang->lang->name}}</a></strong>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-12">
                                            <a href="{{url('discounts/'.$discount->id.'/translations')}}" class="btn btn-transparent"><strong><i class="fas fa-language p-r-10 fa-lg"></i>Add or Edit translations</strong></a>                                    
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
        $('#summernote').summernote({height: 250});
        $("#onClick").click( function () {
         $('#description').val($('#summernote').summernote().code());
        $('#form').submit();
    });
    </script>
@endsection