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
                            <a href="{{ url('categories') }}">Categories</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('categories/'.$category->id) }}">ID : {{$category->id}}</a>
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
    <form action="{{url('categories/'.$category->id.'/translations')}}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Categoriy translations
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
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li>
                                    <a data-toggle="tab" href="#en">
                                        <span>English</span>
                                    </a>
                                </li>
                                <li id="fr_slide" style="display:none;">
                                    <a data-toggle="tab" href="#fr">
                                        <span>Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a id="add_lang" href="#">
                                        <i class="fas fa-plus"></i> Add translation
                                    </a>
                                </li>
                                <li id="langs_list" style="display:none">
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Langues<span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a onclick="show_slide('fr_slide')">Français</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane slide-left active" id="en">
                                    <form action="post" action="javascript:;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"  name=""  value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 m-b-20">
                                                <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-15">Description</label>
                                                <div class="summernote-wrapper bg-white">
                                                    <div id="summernote1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane slide-left" id="fr">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div class="row b-b b-dashed b-grey">
                                <div class="col-md-12">
                                    <h5>
                                        Name in
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($languages as $key => $language)
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label> {{$language->name}}</label>
                                                    <input type="text" class="form-control"  name="references[]"  value="@if(isset($category->categoryLangs->where('lang_id',$language->id)->first()->reference)){{$category->categoryLangs->where('lang_id',$language->id)->first()->reference}}@endif">
                                                    <input type="hidden" name="languages_id[]" value="{{$language->id}}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Description in
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" id="langsCount" value="{{ count($languages) }}">
                                @foreach($languages as $key => $language)
                                <div class="col-md-12 m-b-20">
                                    <label for="summernote{{$key}}" class="upper-title p-t-5 p-b-5 p-l-15">{{$language->name}}</label>
                                    <div class="summernote-wrapper bg-white">
                                        <div id="summernote{{$key}}">@if(isset($category->categoryLangs->where('lang_id',$language->id)->first()->description)){!!$category->categoryLangs->where('lang_id',$language->id)->first()->description!!}@endif</div>
                                            <input type="hidden" name="descriptions[]" id="description{{$key}}">
                                    </div>
                                </div>
                                @endforeach
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
                                            Status : <strong>@if($category->deleted_at == NULL) Publish @else Removed @endif</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong>{{$category->created_at}}</strong>
                                        </div>
                                    </div>
                                    @if($category->updated_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong>{{$category->updated_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    @if($category->deleted_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong>{{$category->deleted_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button id="onClick" type="button" class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ url(url()->current()) }}" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>cancel</strong></a>
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
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script>
            function show_slide(slide) {
                $('#'+slide).show();
                $('#add_lang').show();
                $('#langs_list').hide();
            }
            var langsCount = $('#langsCount').val();
            for(var i =0; i < langsCount; i++)
            {
                $('#summernote'+i).summernote({height: 250});
            }
            $('#onClick').on('click', function(){
            var langsCount = $('#langsCount').val();
            for(var i =0; i< langsCount; i++)
            {
                $('#description'+i).val($('#summernote'+i).summernote().code());
            }
                this.form.submit();
            });

            $('#add_lang').click( function () {
                $(this).hide();
                $('#langs_list').show(100);
            });
    </script>
@endsection