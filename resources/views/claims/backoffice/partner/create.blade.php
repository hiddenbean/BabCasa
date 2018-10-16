@extends('layouts.backoffice.partner.app')
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
                    <a href="{{ url('/claims') }}">Claims</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Create new Claim</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal">
                        <div class="card card-transparent">
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10"> 
                                        <form action="" method="POST"
                                            id="form-work" class="form-horizontal" role="form" autocomplete="on"
                                            novalidate="novalidate">
                                            {{ csrf_field() }}

                                            <div class="form-group row">
                                                <label for="object" class="col-md-3 control-label">Object</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="title" value="" class="form-control"
                                                        id="name" placeholder="" required=""
                                                        aria-required="true" /> 
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="subject" class="col-md-3 control-label">Subject</label>
                                                <div class="col-md-9"> 
                                                    <div class="form-group form-group-default"> 
                                                            <label class="">Subject</label>
                                                            <select class="form-control attr" name="attr" >
                                                                <option value="">Subject</option> 
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="summernote" class="col-md-12 control-label">Message</label>
                                                <div class="col-md-12 p-l-0">
                                                    <br>
                                                    <!-- content start -->
                                                    <div class="summernote-wrapper bg-white ">
                                                        <div id="summernote" class="form-control"></div>
                                                        <input type="hidden" value="" id="message" name="message">
                                                    </div>
                                                    <!-- content end -->
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row"> 
                                                <div class="col-md-9">
                                                    <button class="btn btn-primary" type="submit" id="onClick">Save</button> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                ($('#message').val($('#summernote').summernote().code()));
    
                this.form.submit();
            });
            $('#onReste').on('click', function(){ 
                $('#summernote').summernote().code('');  
            }); 
    });
</script> 
@stop