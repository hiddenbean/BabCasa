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
                        Partner
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
                <div class="card-title">List of Patner</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                            @if (auth()->guard('staff')->user()->can('write','partner'))
                            <a href="{{url('partners/create')}}" class="btn btn-primary btn-cons">New partner</a>
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
                <form action="{{route('multi_delete.partners')}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:3%" class="text-center"><button class="btn btn-link" type="submit"><i class="pg-trash"></i></button></th>
                        <th style="width:20%" class="text-center">Name</th>
                        <th style="width:10%" class="text-center">Email</th> 
                        <th style="width:10%" class="text-center">Creation date</th>    
                        @if (auth()->guard('staff')->user()->can('write','partner'))               
                        <th style="width:10%" class="text-center"></th>                
                        @endif              
                    </thead>
            
                    <tbody> 
                        @foreach($partners as $partner) 
                            <tr class="order-progress"  >
                                <td class="v-align-middle">
                                    <div class="checkbox text-center">
                                    <input type="checkbox" value="{{$partner->name}}" name="partners[]" id="checkbox{{$partner->id}}">
                                    <label for="checkbox{{$partner->id}}" class="no-padding no-margin"></label>
                                    </div>
                                </td>
                                <td class="v-align-middle"><a href="{{url('partners/'.$partner->name)}}"><strong> {{$partner->company_name}} </strong></a></td>
                                <td class="v-align-middle text-center"><strong> {{$partner->email}}</strong></td>                
                                <td class="v-align-middle text-center"> {{date('M d, Y',strtotime($partner->created_at))}} </td>       
                                @if (auth()->guard('staff')->user()->can('write','partner'))               

                                <td class="v-align-middle text-center">
                                        <a href="{{url('partners/'.$partner->name.'/edit')}}" class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete.partner',['partner'=>$partner->name])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></a>
                                    </td> 
                                @endif
                            </tr> 
                        @endforeach
                         
                    </tbody>
                </table>
                </form>
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