@extends('layouts.backoffice.staff.app') 
@section('css')
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content') 
<!-- breadcrumb start -->
<div class="jumbotron">
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:;">Account</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Security
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<div class="container container-fixed-lg">
    <div class="card card-transparent">
        <div class="card-header">
            <div class="card-title">
                Sessions list
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
        @foreach($guests as $guest)
            <div class="col-md-8 b-r b-dashed b-grey">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-laptop" style="font-size:50px"></i>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{ $guest->device }} 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{ $guest->os }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <form action="{{ url($staff->name.'/security/'.$guest->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                <div class="col-md-8">
                                                    <button class="btn btn-transparent text-danger"><strong><i class="fas fa-trash-alt"></i></strong></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Browser</strong>   
                                        </div>
                                        <div class="col-md-8">
                                            {{ $guest->browser }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>IP Address</strong>
                                        </div>
                                        <div class="col-md-8">
                                                {{ $guest->ipAddress }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Last activity</strong> 
                                        </div>
                                        <div class="col-md-8">
                                                {{ $guest->lastActivity }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Location</strong> 
                                        </div>
                                        <div class="col-md-8">
                                            Rabat, Maroc
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                        
                </div>
                @endforeach
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Update password</h3>
                            We advise you to use a password you do not use anywhere else.<br>
                            <a href="{{ url('staff/password') }}"><strong>Update password</strong></a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Deactivate your account</h3>
                            By deactivating your account, you deactivate your profile and delete your name and photo from most of the content you have shared on Babcasa.
    
                        <form action="{{ url($staff->name.'/desactivate') }}" method="POST" class="m-t-5">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" value="Desactiver">
                                </form>  
                        </div>
                    </div>
                </div>
            </div> <br>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
@stop

