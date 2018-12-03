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
                            <a href="{{ url('details') }}">Details</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('details/'.$detail->id) }}">ID : {{$detail->id}}</a>
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
                                    Detail translations
                                    <a 
                                        href="javascript:;" 
                                        data-toggle="tooltip" 
                                        data-placement="bottom" 
                                        data-html="true" 
                                        trigger="click" 
                                        title= "<p class='tooltip-text'>You can use this form to create a new Detail if you have the right permissions.<br>
                                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                        <i class="fas fa-question-circle"></i>
                                    </a>    
                                </div>
                            </div>
                            <form action="{{url('details/'.$detail->id.'/translations')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                            @foreach($languages as $key=>$language)
                                            @if(isset($detail->detailLangs->where('lang_id',$language->id)->first()->value)&& !empty($detail->detailLangs->where('lang_id',$language->id)->first()->value))
                                                <li>
                                                <a data-toggle="tab" class="{{$language->id==$detail->detailLang()->lang_id ? 'active' : ''}}" href="#{{$language->id}}">
                                                    <span>{{$language->name}}</span>
                                                    </a>
                                                </li>
                                            @else 
                                            <li id="{{$language->id}}_slide" style="display:none;">
                                                <a data-toggle="tab" href="#{{$language->id}}">
                                                <span>{{$language->name}}</span>
                                                </a>
                                            </li>
        
                                            @endif
                                            @endforeach
                                        
                                        <li>
                                            <a id="add_lang" href="#">
                                                <i class="fas fa-plus"></i> Add translation
                                            </a>
                                        </li>
                                        <li id="langs_list" style="display:none">
                                            <div class="btn-group">
                                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Langues<span class="caret"></span> </a>
                                                <ul class="dropdown-menu">
                                                    @foreach($languages as $key=>$language)
                                                    @if(!isset($detail->detailLangs->where('lang_id',$language->id)->first()->value)|| empty($detail->detailLangs->where('lang_id',$language->id)->first()->value))
                                                        <li id="{{$language->id}}_slide_option">
                                                            <a onclick="show_slide('{{$language->id}}_slide')" >{{$language->name}}</a>
                                                        </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <input type="hidden" id="langsCount" value="{{ count($languages) }}">
                                        @foreach($languages as $key=>$language)
                                    <div class="tab-pane slide-left {{$language->id==$detail->detailLang()->lang_id? 'active' :''}}" id="{{$language->id}}">
                                               
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"  name="values[]"  value="@if(isset($detail->detailLangs->where('lang_id',$language->id)->first()->value)){{$detail->detailLangs->where('lang_id',$language->id)->first()->value}}@endif">
                                                    <input type="hidden" name="languages_id[]" value="{{$language->id}}"></div>
                                            </div>
                                        </div>
                                     </div>
        
                                        {{-- @endif --}}
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
                                            title= "<p class='tooltip-text'>You can use this form to create a new Detail if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Status : <strong>@if($detail->deleted_at == NULL) Publish @else Removed @endif</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong>{{$detail->created_at}}</strong>
                                        </div>
                                    </div>
                                    @if($detail->updated_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong>{{$detail->updated_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    @if($detail->deleted_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong>{{$detail->deleted_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type='reset' class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>cancel</strong></button>
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
    </div>
@endsection

@section('after_script')
<script>
        function show_slide(slide) {
            $('#'+slide).show();
            $('#'+slide+"_option").hide();
            $('#add_lang').show();
            $('#langs_list').hide();
        }

        $('#add_lang').click( function () {
            $(this).hide();
            $('#langs_list').show(100);
        });
</script>
@endsection