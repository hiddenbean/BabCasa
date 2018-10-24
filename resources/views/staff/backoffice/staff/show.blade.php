@extends('layouts.backoffice.staff.app')
@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')

@if (isset(Session::get('messages')['error']))
    <div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert"></button>
        <strong>Error: </strong>{{ Session::get('messages')['error'] }}
    </div>
@endif

<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/staff') }}">Staff</a>
                </li>
                <li class="breadcrumb-item active">
                    ID : {{$staff->id}}
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">
                        Member  id :  {{$staff->id}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 b-r b-dashed b-grey p-b-15">
                            <h5>
                                Picture
                            </h5>
                            <img src="@if(isset($staff->picture->path)) {{Storage::url($staff->picture->path)}} @else https://ae01.alicdn.com/kf/HTB1VGbHiZuYBuNkSmRy763A3pXaX.png @endif" alt="cat1">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Username
                                    </h5>
                                    <p>
                                         {{$staff->name}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Email
                                    </h5>
                                    <p>
                                         {{$staff->email}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>
                                        First name
                                    </h5>
                                    <p>
                                         {{$staff->first_name}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        Last name
                                    </h5>
                                    <p>
                                         {{$staff->last_name}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Birthday
                                    </h5>
                                    <p>
                                         {{$staff->birthday}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Gender
                                    </h5>
                                    <p>
                                         {{$staff->gender->genderLang()->reference}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Profile
                                    </h5>
                                    <p>
                                         {{$staff->profile->profileLang()->reference}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Publish
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                         <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    Status : <strong>@if($staff->deleted_at == NULL) Publish @else Removed @endif</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : <strong>{{$staff->created_at}}</strong>
                                </div>
                            </div>
                            @if($staff->updated_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>{{$staff->updated_at}}</strong>
                                </div>
                            </div>
                            @endif
                            @if($staff->deleted_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>{{$staff->deleted_at}}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                            @if($staff->deleted_at == NULL)
                                <div class="col-md-6">
                                    <a href="{{url('staff/'.$staff->id.'/edit')}}" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>
                            @endif
                                <div class="col-md-6">
                                @if($staff->deleted_at == NULL)
                                    <a  href="{{route('delete.staff',['staff'=>$staff->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                @else
                                    <form action="{{url('staff/'.$staff->id.'/restore')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                        </form>
                                @endif
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
                                Rest password
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="" class="btn btn-block btn-transparent"><strong>send password rest link</strong></a>                                    
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <a href="" class="btn btn-block text-danger"><strong>generate a new password</strong></a>
                                </div>
                            </div>
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
                        Activity Log
                        <a 
                            href="javascript:;" 
                            data-toggle="tooltip" 
                            data-placement="bottom" 
                            data-html="true" 
                            trigger="click" 
                            title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                            <i class="fas fa-question-circle"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after_script')
    <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/lodash.min.js')}}"></script>

    <script>
    $(document).ready(function () {
        

        var table = $('#tableWithSearch');

        var settings = {
            "sDom": "<t><'row'<p i>>",
            "destroy": true,  
            "scrollCollapse": true,
            "order": [
                    [0, "desc"]
                ],
            "iDisplayLength": 10
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });

            $('#tableWithSearch input[type=checkbox]').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected');
                console.log($(this).closest('tr').html());

            } else {
                $(this).closest('tr').removeClass('selected');
            }

        });
    });
    </script>
@endsection
        