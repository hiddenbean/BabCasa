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
                        Business clients
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
                <div class="card-title">Business clients list</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                             @if (auth()->guard('staff')->user()->can('write','business_client'))
                            <a href="{{url('clients/business/create')}}" class="btn btn-primary btn-cons">New client business</a>
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
                <form action="{{url('/clients/business/multi-restore')}}" method="post">
                {{ csrf_field() }}
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:3%" class="text-center"><button class="btn btn-link" type="submit"><i class="fas fa-undo-alt fa-lg"></i></button></th>
                        <th style="width:62px"></th>
                        <th style="width:20%" class="text-center">Name</th>
                        <th style="width:10%" class="text-center">Email</th> 
                        <th style="width:10%" class="text-center">Creation date</th>                
                        <th style="width:10%" class="text-center">Status</th>            
                    </thead>
            
                    <tbody>
                        @foreach($businesses as $business)  
                        <tr class="order-progress"  >
                            <td class="v-align-middle">
                                <div class="checkbox text-center">
                                <input type="checkbox" value="{{$business->name}}" name="businesses[]" id="checkbox{{$business->id}}">
                                <label for="checkbox{{$business->id}}" class="no-padding no-margin"></label>
                                </div>
                            </td>
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="{{url('/clients/business/'.$business->name.'/restore')}}" data-method="post"  data-token="{{csrf_token()}}" class="text-danger"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></a></td>
                            </td>
                            <td class="v-align-middle"><a href="{{url('clients/business/'.$business->name)}}"><strong> {{ $business->company_name }} </strong></a></td>
                            <td class="v-align-middle text-center"><strong> {{ $business->email }}</strong></td>                
                            <td class="v-align-middle text-center"> {{ $business->created_at }} </td>
                            <!-- {{ $business->status->first()->is_approved ? $status = 'Approved' : $status = 'Not approved' }} -->    
                        <td class="v-align-middle text-center"> <strong>{{ $status }}</strong> </td>       
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