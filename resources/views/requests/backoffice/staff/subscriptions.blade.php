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
                            <a href="#">Requests</a>
                        </li>
                        <li class="breadcrumb-item active">
                                subscriptions
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
                    partner Requests list 
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
                <form action="{{url('affiliates/multi-restore')}}" method="post">
                    {{ csrf_field() }}
                    <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                        <thead>
                            <th style="width:80px">Account type</th>           
                            <th style="width:100px">Company name</th>         
                            <th style="width:80px">username</th>
                            <th style="width:150px">email</th>
                            <th style="width:80px">Admin</th>          
                            <th style="width:100px">Admin phone</th>
                            <th style="width:100px">Request date</th>
                        </thead>
                        @foreach($partners as $partner)
                        @if($partner->status->first()->is_approved==0)
                        <tr role="row" id="0">
                            <td class="v-align-middle">
                                partner
                            </td>
                            <td class="v-align-middle"><a href="{{url('affiliates/'.$partner->name)}}"><strong>{{$partner->company_name }}</strong></a></td>
                            <td class="v-align-middle"><a href="{{url('affiliates/'.$partner->name)}}"><strong>{{$partner->name }}</strong></a></td>
                            <td class="v-align-middle">{{$partner->status->where('is_approved',0)->first()->email }}</td>
                            <td class="v-align-middle"><strong>{{$partner->first_name.' '.$partner->last_name }}</strong></td>
                            <td class="v-align-middle">{{$partner->phones()->where('tag','admin')->first()->country->phone_code.' '.$partner->phones()->where('tag','admin')->first()->number}}</td>
                            <td class="v-align-middle"> {{$partner->created_at}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach($businesses as $business)
                        @if($business->status->first()->is_approved==0)
                        <tr role="row" id="0">
                            <td class="v-align-middle">
                                business
                            </td>
                            <td class="v-align-middle"><a href="{{url('businesses/'.$business->name)}}"><strong>{{$business->company_name }}</strong></a></td>
                            <td class="v-align-middle"><a href="{{url('businesses/'.$business->name)}}"><strong>{{$business->name }}</strong></a></td>
                            <td class="v-align-middle">{{$business->email }}</td>
                            <td class="v-align-middle"><strong>{{$business->first_name.' '.$business->last_name }}</strong></td>
                            <td class="v-align-middle">{{$business->phones()->where('tag','admin')->first()->country->phone_code.' '.$business->phones()->where('tag','admin')->first()->number}}</td>
                            <td class="v-align-middle"> {{$business->created_at}}</td>
                        </tr>
                        @endif
                        @endforeach

                        <tbody> 
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
                        [6, "desc"]
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