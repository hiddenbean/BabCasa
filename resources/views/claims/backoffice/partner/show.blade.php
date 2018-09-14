@extends('layouts.backoffice.partner.app')

@section('css') 
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}"/>

@endsection

@section('content')

    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/support">Support</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong> {{$claim->title}}</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- content start -->
    <!-- show menu -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header ">
                <div class="card-title">Information</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 b-r b-dashed b-grey">
                        <div class="row">
                            <div class="col-md-12">
                                Titre
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1>
                                    <strong> {{$claim->title}}</strong>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Sujet
                            </div>
                            <div class="col-md-8">
                                <strong>{{$claim->subject->title}}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Date de création
                            </div>
                            <div class="col-md-8">
                            <strong>{{$claim->created_at}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                Etat
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                @if($claim->status == true)
                                    <h3>
                                        <strong>Open</strong>
                                    </h3>
                                    @else
                                    <h3>
                                        <strong>Closed</strong>
                                    </h3>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                    @if($claim->status == true)
                                        <form action="{{url('/support/ticket/'.$claim->id.'/close')}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Close</button>
                                        </form>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="div_message"> <input type="hidden" class="new_message" id="new_message" onchange="change()"></div>
    <!-- Messages start -->
    @foreach($claim->claimMessages as $message )
    @if($message->claim_messageable_type == 'partner')
    <!-- Partner message start -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="row p-t-20 p-b-20">
            <div class="col-md-2 b-r b-dashed b-grey">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img  src="{{ Storage::url($claim->claimable->picture->where('tag','partner_avatar')->first()->path)}}" alt="{{$claim->claimable->company_name}}" data-src="{{ Storage::url($claim->claimable->picture->where('tag','partner_avatar')->first()->path)}}" data-src-retina="{{ Storage::url($claim->claimable->picture->where('tag','partner_avatar')->first()->path)}}" width="32" height="32">
                </span>
                <div class="m-l-40 p-t-5">      
                    <strong>{{$claim->claimable->company_name}}</strong>
                    @if( strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) < 60)
                        <br> à l'instant
                    @elseif( strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) < 3600)
                        <br>Il y a {{  round((strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at))/60) }} min
                    @elseif( strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) > 3600 && strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) < 86400 )
                        <br>Il y a {{  round((strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at))/60/60) }} heurs
                    @else
                        <br>Le {{  date('y-m-d H:i:s', strtotime($message->created_at)) }}                    
                    @endif      
                </div>
            </div>
            <div class="col-md-10">
                    {!!$message->message!!}   
            </div>
        </div>
    </div> 
    @endif
    <br>
    <!-- Partner message end -->

    <!-- Staff message start -->
    @if($message->claim_messageable_type == 'staff')
    <div class="container-fluid container-fixed-lg" style="background-color:#daeffd">
        <div class="row p-t-20 p-b-20">
            <div class="col-md-10 b-r b-dashed b-grey">
                    {!!$message->message!!}  
            </div>
            <div class="col-md-2">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="{{ Storage::url($message->claimMessageable->picture->where('tag','staff')->first()->path)}}" alt="{{$message->claimMessageable->first_name}} {{$message->claimMessageable->last_name}}" data-src="{{ Storage::url($message->claimMessageable->picture->where('tag','staff')->first()->path)}}" width="32" height="32">
                </span>
                <div class="m-l-40 p-t-5">
                    <strong>{{$message->claimMessageable->first_name}}  {{$message->claimMessageable->last_name}} </strong><br>
                    @if( strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) < 3600)
                        <br>Il y a {{  round((strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at))/60) }} min
                    @elseif( strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) > 3600 && strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at) < 86400 )
                        <br>Il y a {{  round((strtotime(date('y-m-d H:i:s')) - strtotime($message->created_at))/60/60) }} heurs
                    @else
                        <br>Le {{  date('y-m-d H:i:s', strtotime($message->created_at)) }}                    
                    @endif      
                </div>
            </div>
        </div>
    </div> 
    @endif
    <br>
    <!-- Staff message end -->   
    @endforeach
    @if($claim->status == true)
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="row p-t-20 p-b-20">
            <div class="col-md-2 b-r b-dashed b-grey">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="{{ Storage::url($claim->claimable->picture->where('tag','partner_avatar')->first()->path)}}" alt="{{$claim->claimable->company_name}}" data-src="{{ Storage::url($claim->claimable->picture->where('tag','partner_avatar')->first()->path)}}" data-src-retina="{{ Storage::url($claim->claimable->picture->where('tag','partner_avatar')->first()->path)}}" width="32" height="32">
                </span>
                <div class="m-l-40 p-t-5">
                    <strong>{{$claim->claimable->company_name}}</strong><br>
                </div>
            </div>
            <div class="col-md-10">
                <div class="summernote-wrapper bg-white">
                    <div id="summernote"></div>
                        @if ($errors->has('message'))
                        <small class="p-l-10 text-danger" role="alert">
                            {{ $errors->first('message') }}
                        </small>
                        @endif
                </div>
                <br>   
                <form action="{{url('/support/ticket/'.$claim->id)}}" id="myform" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="message" id="message">
                    <input type="hidden" name="claim_id" value="">
                    <button class="btn btn-success" id="onclick" value="">Send</button>
                    <a class="btn btn-default" id="onReste" href="{{ url()->current()}}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    @endif
    <br>
     

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('backoffice/assets/plugins/summernote/js/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#onclick').on('click', function(){       
                        ($('#message').val($('#summernote').summernote().code()));
                this.form.submit();
            });
            $('#onReste').on('click', function(){ 
                $('#summernote').summernote().code('');  
            });
        });

        $('#test').on('click', function(){
            console.log($('#new_message').val());
        })

        function change(){
            console.log($('#new_message').val());
            /*var lastChange = $('#new_message').val();
            //if($("#last_change")!= null)
            {
            $.ajax({
                    url : '/support/ticket/new/',
                    method : 'GET',
                    dataType : 'json',
                    success: function (reponse) {
                        data = reponse;
                        var array = [];
                          for(i=0; i<data.length; i++)
                        {
                        console.log(data[i]['id']);
                        }
                    },
                });
            })*/
        }
    </script>
    
    <script>
        // console.log(worker);
    /*document.addEventListener("DOMContentLoaded",function(event){
        startWorker();
        function startWorker()
        {
            var worker = new Worker('/js/worker.js');
            worker.addEventListener('message', function (event) {
            console.log('Worker said two: ', event.data);
            if(typeof $.parseJSON(event.data) == 'object')
            {
                var div
                var data = $.parseJSON(event.data);
                if($.isNumeric(data['id']))
                {
                    $('#new_message').val(data['id']);
                }
            }
            });
            worker.postMessage('start');
        }
    });*/
    </script>
@endsection