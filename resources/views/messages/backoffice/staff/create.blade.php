@extends('layouts.backoffice.staff.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}"/>    
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
                <li class="breadcrumb-item">
                    <a href="{{ url('/support/'.$claim->id) }}">{{$claim->title}}</a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Create new Message For {{$claim->title}}</strong> </h4>
             <label class='error' >
             @if($errors->count()>0)
                You have {{$errors->count()}} ERROR(S) !!
            @endif
             </label>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                        <div class="card card-transparent">
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10"> 
                                        <form action="{{url('support/message/'.$claim->id)}}" method="POST"
                                            id="form-work" class="form-horizontal" role="form" autocomplete="on"
                                            novalidate="novalidate">
                                            {{ csrf_field() }}

                                            <div class="form-group row">
                                                <label for="summernote" class="col-md-12 control-label">Message</label>
                                                <div class="col-md-12 p-l-0">
                                                    <br>
                                                    <!-- content start -->
                                                    <div class="summernote-wrapper bg-white ">
                                                        <div id="summernote" class="form-control"></div>
                                                        <input type="hidden" value="" id="message" name="message">
                                                    </div>
                                                        <label class='error' for='message' id="error">
                                                        </label> 
                                                    <!-- content end -->
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row"> 
                                                <div class="col-md-9">
                                                    <button class="btn btn-primary" type="button" id="onClick">Save</button> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
<script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#birthday').datepicker();

         $('#summernote').summernote();
            $('#onClick').on('click', function(){ 
                 var chaine = ''+$('#summernote').summernote().code().replace(/<\/?[^>]+(>|$)/g, "");
                if(chaine=='')
                {
                    $('#error').html('the message field is required .');
                } else
                {
                    ($('#message').val($('#summernote').summernote().code()));
                    this.form.submit();

                }
            });
            $('#onReste').on('click', function(){ 
                $('#summernote').summernote().code('');  
            }); 
    });
</script> 
@stop