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
                            <a href="{{ url('/staff') }}">Staff</a>
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
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Removed Staff members list 
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
                <div class="clearfix"></div>
                
            </div>
            <div class="card-body">
                <form action="{{url('staff/multi-restore')}}" method="post">
                    {{ csrf_field() }}
                    <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                        <thead>
                            <th class="text-center" style="width:35px"><button class="btn btn-link" type="submit"><i class="fas fa-undo-alt fa-lg"></i></button></th>
                            <th style="width:62px"></th>
                            <th style="width:80px">Picture</th>           
                            <th style="width:100px">Username</th>         
                            <th style="width:150px">email</th>         
                            <th style="width:100px">first name</th>             
                            <th style="width:100px">last name</th>             
                            <th style="width:100px">profile</th>
                            <th style="width:150px">Deleted at</th>       
                        </thead>

                        <tbody> 
                         @foreach($staffs as $staff)                                   
                           <tr>
                                <td class="v-align-middle p-l-5 p-r-5">
                                    <div class="checkbox no-padding no-margin text-center">
                                        <input type="checkbox" value="{{$staff->id}}" name="staffs[]" id="checkbox{{$staff->id}}">
                                        <label for="checkbox{{$staff->id}}" class="no-padding no-margin"></label>
                                    </div>
                                </td>
                                <td class="v-align-middle text-center p-l-5 p-r-5">
                                        <a href="{{url('staff/'.$staff->id.'/restore')}}" data-method="POST"  data-token="{{csrf_token()}}" class="text-danger"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></a></td>
                                </td> 
                                 <td class="v-align-middle picture">
                                    <a href="{{url('staff/'.$staff->id)}}"><img src="@if(isset($staff->picture->path)) {{Storage::url($staff->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" alt="cat1"></a>
                                </td>
                                <td class="v-align-middle">{{$staff->name}}</td>
                                <td class="v-align-middle">{{$staff->email}}</td>
                                <td class="v-align-middle">{{$staff->first_name}}</td>
                                <td class="v-align-middle">{{$staff->last_name}}</td>
                                <td class="v-align-middle">{{$staff->profile->profileLang()->reference}}</td>
                                <td class="v-align-middle">{{$staff->deleted_at}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
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
                        [1, "desc"]
                    ],
                    "columnDefs": [
                        { "orderable": false, "targets": 0 },
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
                } else {
                    $(this).closest('tr').removeClass('selected');
                }
            });
        });
    </script>

@endsection