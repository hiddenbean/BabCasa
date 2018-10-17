@extends('layouts.backoffice.staff.app') 
@section('css')
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content') 

<!-- START SECONDARY SIDEBAR -->
<nav class="secondary-sidebar"> 
    <p class="menu-title">Sttings</p>
    <ul class="main-menu"> 
        <li class="active">
            <a href="{{ url('/security') }}">
            <span class="title"><i class="pg-folder"></i>Security</span>
            </a> 
        </li>
        <li>
            <a href="{{ url('/log') }}">
                <span class="title"><i class="pg-sent"></i>Log</span>
            </a>
        </li> 
    </ul> 
</nav>
<!-- END SECONDARY SIDEBAR  -->
<div class="inner-content full-height padding-20"> 
    <div class="card ">
            <div class="card-header">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                <h4 class="m-t-0 m-b-0"> <strong>Security</strong> </h4>
            </div>
            
                    <div class="card-body">
                            <div class="row">
                                    @foreach($guests as $guest)
                                    <div class="col-md-7 b-r b-dashed b-grey">
                                        
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <i class="fa fa-laptop" style="font-size:50px"></i>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-8">
                                                                        
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
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Navigateur</strong>   
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $guest->browser }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Adresse IP</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                            {{ $guest->ipAddress }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Derniere activeite</strong> 
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                           {{ $guest->lastActivity }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <strong>Lieux</strong> 
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        Rabat, Maroc
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-4 m-t-5">
                                                                        <strong>Acces au compte</strong>  
                                                                    </div>
                                                                <form action="{{ url($staff->name.'/security/'.$guest->id) }}" method="post">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                        <div class="col-md-8">
                                                                            <button class="btn btn-transparent text-danger"><strong>Supprimer</strong></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                          
                                    </div>
                                    @endforeach
                                    <div class="col-md-5">
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

