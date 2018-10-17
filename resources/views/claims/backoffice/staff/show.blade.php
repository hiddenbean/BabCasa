@extends('layouts.backoffice.staff.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
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
                    <a href="{{ url('/support') }}">Claims</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Claim Information</strong> </h4>
        </div>
        <div class="card-body">
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">Information</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 b-r b-dashed b-grey">
                            <div class="row">
                                <div class="col-md-12">
                                    Title
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>
                                        <strong> {{$claim->title}}  </strong>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    Sujet
                                </div>
                                <div class="col-md-8">
                                    <strong> {{$claim->subject->subjectLang->first()->reference}}  </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    Creation date
                                </div>
                                <div class="col-md-8">
                                    <strong> {{date('d-m-Y', strtotime($claim->created_at))}} </strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    Status
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        <strong> @if($claim->status) Open @else Close @endif </strong>
                                    </h3>
                                </div>
                            </div>
                            @if($claim->status) 
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{url('support/'.$claim->id.'/close')}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Close</button>
                                    </form>
                                </div>
                            </div>
                             @endif 
                        </div>
                    </div>
                </div>
            </div>
             @if($claim->status) 
            <div class="row">
                <div class="col-md-12 text-right">
                <a href="{{url('support/message/'.$claim->id.'/create')}}" class="btn btn-info"> add message</a>
                </div>
            </div>
                </br>
            @endif
@foreach($claim->claimMessages()->orderBy('created_at', 'desc')->get() as $message)
    @if($message->claim_messageable_type != 'staff')
            <!-- Partner message start -->
            <div class="row p-t-20 p-b-20bg-white">
                <div class="col-md-2 b-r b-dashed b-grey">
                    <span class="thumbnail-wrapper d32 circular inline">
                         <img src="{{ Storage::url($message->claimMessageable->picture->path) }}" alt="" width="32" height="32">
                    </span>
                    <div class="m-l-40 p-t-5">
                        {{date('y-m-d H:i:s', strtotime($message->created_at)) }}
                    </div>
                </div>
                <div class="col-md-10">
                    {!!$message->message!!}
                </div>
            </div>

            <br>
            <!-- Partner message end -->
    @else
            <!-- Staff message start -->

            <div class="row p-t-20 p-b-20" style="background-color:#daeffd">
                <div class="col-md-10 b-r b-dashed b-grey">
                     {!! $message->message !!}
                </div>
                <div class="col-md-2">
                    <span class="thumbnail-wrapper d32 circular inline">
                        <img src=" {{Storage::url($message->claimMessageable->picture->path) }}" alt="" width="32" height="32">
                    </span>
                    <div class="m-l-40 p-t-5">
                        {{date('y-m-d H:i:s', strtotime($message->created_at)) }}
                    </div>
                </div>
            </div>

            <br>
            <!-- Staff message end -->
    @endif
@endforeach

        </div>
    </div>
</div>
@endsection

@section('script')

@stop