@extends('layouts.backoffice.staff.app')

@section('css_before')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@endsection

@section('content')
    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item active">
                        subjects
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header">
               @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
            <div class="card-title">List of Subjects </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                            @if (auth()->guard('staff')->user()->can('write','subject'))
                            <a href="{{url('subjects/create')}}" class="btn btn-primary btn-cons">New Subject</a>
                            @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>
            <div class="card-body">
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:2%" class="text-center">Id</th>                    
                        <th style="width:30%" class="text-center">reference</th>                    
                        <th style="width:30%" class="text-center">description</th>                    
                         @if (auth()->guard('staff')->user()->can('write','subject'))               
                        <th style="width:10%" class="text-center"></th>           
                        @endif                    
                    </thead>
            
                    <tbody>  
                        @foreach($subjects as $subject)
                        <tr class="order-progress"  >
                            <td class="v-align-middle">{{$subject->id}}</a></td>            
                            <td class="v-align-middle">  {{$subject->subjectLang->first()->reference}} </td>            
                            <td class="v-align-middle">  {{$subject->subjectLang->first()->description}} </td>            
                             @if (auth()->guard('staff')->user()->can('write','subject'))               
                            <td class="v-align-middle text-center">
                                    <a href="{{url('subjects/'.$subject->id.'/edit')}}" class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.subject',['subject'=>$subject->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></a>
                           </td> 
                        @endif           
                            
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    
@endsection

@section('script')
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
        });
    </script>

@endsection