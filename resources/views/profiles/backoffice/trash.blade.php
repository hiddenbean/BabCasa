@extends('layouts.backoffice.staff.app')

@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@endsection

@section('content')
    <!-- breadcrumb start -->
    <div class="jumbotron">
        <div class="container-fluid container-fixed-lg ">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">DASHBOARD</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/profiles') }}">Staff Profiles</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Trash
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
        <!-- breadcrumb end -->
        <div class="container-fluid container-fixed-lg">
        @if (isset(Session::get('messages')['success']))
        <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>Success: </strong>{{ Session::get('messages')['success'] }}
        </div>
        @endif
        @if (isset(Session::get('messages')['error']))
        <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>Error: </strong>{{ Session::get('messages')['error'] }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Profiles list 
                    <a 
                        href="javascript:;" 
                        data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-html="true" 
                        trigger="click" 
                        title= "<p class='tooltip-text'>This table is containing all the categories in the BABCasa platforme.
                                <br> You can (add, edit or remove) a category if you have the right permissions.
                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                        <i class="fas fa-question-circle"></i>
                    </a>
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('delete.tags')}}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                        <thead>
                            <th class="text-center" style="width:35px"><button class="btn btn-link" type="submit"><i class="fas fa-undo-alt fa-lg"></i></button></th>
                            <th style="width:62px"></th>
                            <th style="width:150px">Profile</th>           
                            <th style="width:100px">Description</th>
                            <th style="width:100px">Accounts</th>
                            <th style="width:100px">Languages</th>
                            <th style="width:150px">Deleted at</th>
                        </thead> 
                        <tbody>                   
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
    
@endsection

@section('after_script')
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/lodash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script>
    $(document).ready(function () {
        

        var table = $('#tableWithSearch');

        var settings = {
            "sDom": "<t><'row'<p i>>",
            "destroy": true,  
            "scrollCollapse": true,
            "order": [
                    [3, "desc"]
                ],
                "columnDefs": [
                    { "orderable": false, "targets": 0 },
                    { "orderable": false, "targets": 1 },
                    { "orderable": false, "targets": 2 },
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