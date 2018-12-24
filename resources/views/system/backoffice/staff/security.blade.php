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
            <div class="col-md-8">
                @foreach($guests as $guest)
                    <div class="row">
                        <div class="col-md-12">
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
                                            <div class="float-right">

                                                {{$guest->id==session()->getId() ? 'current' : ''}}
                                            </div>
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
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Update password
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" data-html="true" trigger="click" title="" data-original-title="<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            It's a good idea to use a strong password that you're not using elsewhere.
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <div class="col-md-12">
                                            <a href="javascript:;" data-toggle="modal" data-target="#modalSlideUp" class="btn btn-block text-danger"><strong>Update my password</strong></a>
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
                                        Account desactivation
                                        <a  
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title="" 
                                            data-original-title="<p class='tooltip-text'>You can use this 
                                                form to create a new category if you have the right permissions.<br>
                                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            By deactivating your account, you are disabling your profile, your name and photo from most of the content you have shared on Babcasa.
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <div class="col-md-12">
                                            <form action="{{ url($staff->name.'/desactivate') }}" method="POST" class="m-t-5">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" class="btn btn-danger btn-block" value="Desactiver">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br>
        </div>
    </div>
</div>

@include('system.backoffice.partner.password.modal_password_gen')
@endsection

@section('script')
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
@stop

