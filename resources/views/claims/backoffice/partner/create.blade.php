@extends('layouts.backoffice.partner.app')

@section('css')

    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}"/>    

@endsection

@section('content')

    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Tableau de borad</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('support') }}">Support</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">sujets</a>
                    </li>
                    <li class="breadcrumb-item active">Ticket</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- content start-->
    <div class=" container-fluid container-fixed-lg">

        <div class="card card">
            <div class="card-header ">
                <div class="card-title">Ticket</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum est officiis inventore?</h3>
                        <p> Nihil illum? Placeat quod doloribus tenetur reprehenderit nulla, beatae ea in maiores, temporibus delectus repellat quis.</p>
                        <br>
                        <p class="small hint-text">quod doloribus tenetur reprehenderit nulla, beatae ea in maiores, temporibus delectus repellat ipsum dolor sit amet consectetur adipisicing elit</p>
                        <form action="" method="POST" id="form-work" class="form-horizontal" role="form" autocomplete="on" novalidate="novalidate">
                            {{ csrf_field() }}
                            
                            <div class="form-group row">
                                <label for="object" class="col-md-3 control-label">Object</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control {{ $errors->has('title') ? 'input-error' : '' }}" id="name" placeholder="Saisissez l'objet du ticket"  required="" aria-required="true"/>
                                    @if ($errors->has('title'))
                                    <small class="p-l-10 text-danger" role="alert">
                                        {{ $errors->first('title') }}
                                    </small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-md-3 control-label">Subject</label>
                                <div class="col-md-9">
                                    <div class="form-group required no-padding" required>
                                        <select name="subject" class="full-width" data-placeholder="Choisissez un sujet" data-init-plugin="select2" id="subject"> 
                                           <option value=""> title </option> 
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
                                        <div id="summernote" class=""></div>
                                        <input type="hidden" value="" id="message" name="message">
                                    </div>
                                    <!-- content start -->
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>nouvelles </p>
                                </div>
                                <div class="col-md-9">
                                    <button class="btn btn-success" type="button" id="onClick">Créer</button>
                                    <button class="btn btn-default" type="button" id="onReste" ><i class="pg-close"></i>Effacer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end --> 
@endsection

@section('script') 
    <script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
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
@endsection