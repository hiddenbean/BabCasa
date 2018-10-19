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
<<<<<<< HEAD
                            <a href="{{ url('attributes') }}">Attributes</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('attributes/1') }}">ID : 1</a>
=======
                            <a href="{{ url('attributes') }}">attributes</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('attributes/'.$attribute->id) }}">ID : {{$attribute->id}}</a>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                        </li>
                        <li class="breadcrumb-item active">
                            Tanslations
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <div class="container-fluid container-fixed-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
<<<<<<< HEAD
                                    Attribute translations
=======
                                    attribute translations
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
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
<<<<<<< HEAD
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 b-r b-dashed b-grey">
                                        <h5>
                                            English
=======
                            <form action="{{url('attributes/'.$attribute->id.'/translations')}}" method="POST">
                              {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                @foreach($languages as $key => $language)
                                    <div class="col-md-6 b-r b-dashed b-grey">
                                        <h5>
                                            {{$language->name}}
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
<<<<<<< HEAD
                                                    <label>Attribute name</label>
                                                    <input type="text" class="form-control" name="reference">
                                                    <label class='error' for='reference'>
                                                        @if ($errors->has('reference'))
                                                            {{ $errors->first('reference') }}
                                                        @endif
                                                    </label> 
=======
                                                    <label>Category name</label>
                                                    <input type="text" class="form-control" name="references[]" value="{{$attribute->attributeLangs->where('lang_id',$language->id)->first()->reference}}">
                                                    <input type="hidden" name="languages_id[]" value="{{$language->id}}">
                                                    
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
<<<<<<< HEAD
                                                <label for="summernote1" class="upper-title p-t-5 p-b-5 p-l-15">description</label>
                                                <div class="summernote-wrapper bg-white">
                                                    <div id="summernote1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>
                                            Français
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nom d'attribut</label>
                                                    <input type="text" class="form-control" name="reference">
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
                                                <label for="summernote2" class="upper-title p-t-5 p-b-5 p-l-15">description</label>
                                                <div class="summernote-wrapper bg-white">
                                                    <div id="summernote2"></div>
=======
                                                <div class="form-group form-group-default">
                                                    <label>Category name</label>
                                                    <textarea class="form-control" name="descriptions[]">{{$attribute->attributeLangs->where('lang_id',$language->id)->first()->description}}</textarea>
                                                    
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<<<<<<< HEAD
                                </div>
                            </div>
=======
                                    @endforeach
                                </div>
                            </div>
                            
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
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
<<<<<<< HEAD
                                            Status : <strong>Publish</strong>, <strong>Removed</strong>
=======
                                            Status : <strong>@if($attribute->deleted_at == NULL) Publish @else Removed @endif</strong>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
<<<<<<< HEAD
                                            Creation date : <strong>10/18/2018 18:46:11</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong>10/18/2018 18:48:40</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong>10/18/2018 18:49:22</strong>
                                        </div>
                                    </div>
=======
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
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
<<<<<<< HEAD
                                            <button class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>cancel</strong></button>
                                        </div>
                                    </div>
                                </div>
=======
                                            <button type='reset' class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>cancel</strong></button>
                                        </div>
                                    </div>
                                </div>
                                
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
=======
                </form>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
            </div>
        </div>
    </div>
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script>
        $('#summernote1, #summernote2').summernote({height: 250});
    </script>
@endsection