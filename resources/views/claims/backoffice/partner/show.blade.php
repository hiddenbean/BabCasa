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
                        <a href="/">Tableau de borad</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/support">Support</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Tickets titre
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
                                    <strong> Titre</strong>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Sujet
                            </div>
                            <div class="col-md-8">
                                <strong>Sujet</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Date de création
                            </div>
                            <div class="col-md-8">
                            <strong>15/08/2018 10:25:53</strong>
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
                                <h3>
                                    <strong>Ouvert</strong>
                                </h3> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                               <a class="btn btn-danger" href=" ">Fermer</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="div_message"> <input type="hidden" class="new_message" id="new_message" onchange="change()"></div>
    <!-- Messages start -->
  
    <!-- Partner message start -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="row p-t-20 p-b-20">
            <div class="col-md-2 b-r b-dashed b-grey">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img  src="" alt="" data-src="" data-src-retina="" width="32" height="32"> 
                </span>
                <div class="m-l-40 p-t-5">      
                    <strong>Company name</strong>
                    <br>Le 15/08/2018 10:25:53      
                </div>
            </div>
            <div class="col-md-10">
                  Message   
            </div>
        </div>
    </div> 
    <br>
    <!-- Partner message end -->

    <!-- Staff message start -->
     
    <div class="container-fluid container-fixed-lg" style="background-color:#daeffd">
        <div class="row p-t-20 p-b-20">
            <div class="col-md-10 b-r b-dashed b-grey">
                  Message 
            </div>
            <div class="col-md-2">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="" alt="" data-src="" width="32" height="32">
                </span>
                <div class="m-l-40 p-t-5">
                    <strong>first_name last_name</strong><br>
                     <br>Le 15/08/2018 10:25:53      
                </div>
            </div>
        </div>
    </div> 
    <br>
    <!-- Staff message end -->   
 
   
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="row p-t-20 p-b-20">
            <div class="col-md-2 b-r b-dashed b-grey">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="" alt="" data-src="" data-src-retina="" width="32" height="32">
                </span>
                <div class="m-l-40 p-t-5">
                <strong>Company name </strong><br>
                </div>
            </div>
            <div class="col-md-10">
                <div class="summernote-wrapper bg-white">
                    <div id="summernote"></div>
                   
                    <small class="p-l-10 text-danger" role="alert">
                       Error 
                    </small>
                  
                </div>
                <br>   
                <form action="" id="myform" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="message" id="message">
                    <input type="hidden" name="claim_id" value="">
                    <button class="btn btn-success" id="onclick" value="">Send</button>
                    <button class="btn btn-default" id="onReste" type="button">Cancel</button>
                </form>
            </div>
        </div>
    </div> 
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