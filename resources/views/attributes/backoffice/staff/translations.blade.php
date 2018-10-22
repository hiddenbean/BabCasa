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
                            <a href="{{ url('attributes') }}">Attributes</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('attributes/'.$attribute->id) }}">ID : {{$attribute->id}}</a>
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
        <form action="{{url('attributes/'.$attribute->id.'/translations')}}" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Attribute translations
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
                                        @foreach($languages as $key => $language)
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label> {{$language->name}}</label>
                                                <input type="text" class="form-control"  name="references[]"  value="@if(isset($attribute->attributeLangs->where('lang_id',$language->id)->first()->reference)){{$attribute->attributeLangs->where('lang_id',$language->id)->first()->reference}}@endif">
                                                <input type="hidden" name="languages_id[]" value="{{$language->id}}">
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>
                                                Description in
                                            </h5>
                                        </div>
                                        <input type="hidden" id="langsCount" value="{{count($languages)}}">
                                        @foreach($languages as $key => $language)
                                        <div class="col-md-12 m-b-20">
                                            <label for="summernote{{$key}}" class="upper-title p-t-5 p-b-5 p-l-15">{{$language->name}}</label>
                                            <div class="summernote-wrapper bg-white">
                                                <div id="summernote{{$key}}">@if(isset($attribute->attributeLangs->where('lang_id',$language->id)->first()->description)){!!$attribute->attributeLangs->where('lang_id',$language->id)->first()->description!!}@endif</div>
                                                <input type="hidden" name="descriptions[]" id="description{{$key}}">
                                            </div>
                                        </div>
                                        @endforeach
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
                                                <button id="onClick" type="button" class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>cancel</strong></button>
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
        var langsCount = $('#langsCount').val();
        for(var i =0; i< langsCount; i++)
        {
            $('#summernote'+i).summernote({height: 250});
        }
        $('#onClick').on('click', function(){ 
                    
                var langsCount = $('#langsCount').val();
                for(var i =0; i< langsCount; i++)
                {
                    $('#description'+i).val($('#summernote'+i).summernote().code());
                    console.log($('#summernote'+i).summernote().code());
                }
                    this.form.submit();

                });
    </script>
@endsection