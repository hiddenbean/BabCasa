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
                    <a href="{{ url('/tags') }}">tags</a>
                </li>
                <li class="breadcrumb-item active">
                    Show
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Tags</strong>{{$tag->id}} </h4>
        </div>
        <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    @foreach($languages as $key=>$language)
                    @if(isset($tag->tagLangs->where('lang_id',$language->id)->first()->tag)&& !empty($tag->tagLangs->where('lang_id',$language->id)->first()->tag))
                        <li >
                            <a data-toggle="tab" href="#{{$language->id}}">
                                <span>{{$language->name}}</span>
                                </a>
                            </li>
                            @endif
                    @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                     @foreach($languages as $key=> $language)
                     <!-- silde  {{$key}} start -->
                     <div class="tab-pane slide-left {{$language->id==$tag->tagLang()->lang_id ? 'active' : ''}}" id="{{$language->id}}">
                            @if(isset($tag->tagLangs->where('lang_id',$language->id)->first()->tag)&& !empty($tag->tagLangs->where('lang_id',$language->id)->first()->tag))
                        <div class="row">
                     
                             <div class="col-md-12">
                                <div class="row m-b-10">
                                    <div class="col-md-3 uppercase">
                                        Name
                                    </div>
                                    <div class="col-md-9">
                                        <strong>
                                            {{ $tag->tagLangs->where('lang_id',$language->id)->first()->tag}}
                                        </strong>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        @endif
                    </div>
                    <!-- silde {{$key}} end -->
                    @endforeach
                </div>
            </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
@stop