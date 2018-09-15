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
                        Client Particular
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header">
                <div class="card-title">List of Client Particular</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                            <a href="{{url('clients/particular/create')}}" class="btn btn-primary btn-cons">New client particular</a>
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
                        <th style="width:20%" class="text-center">Name</th>
                        <th style="width:10%" class="text-center">Email</th> 
                        <th style="width:10%" class="text-center">Creation date</th>                
                        <th style="width:10%" class="text-center">Status</th>                
                        <th style="width:10%" class="text-center"></th>                
                    </thead>
            
                    <tbody>  
                            <tr class="order-progress"  >
                                    <td class="v-align-middle"><a href="{{url('clients/particular/show')}}"><strong> Khalifah Abde lghaffar </strong></a></td>
                                    <td class="v-align-middle text-center"><strong> khalifah-Abde-lghaffar@gmail.com</strong></td>                
                                    <td class="v-align-middle text-center"> December 23, 1978 </td>       
                                    <td class="v-align-middle text-center"> <strong>Not Approved</strong> </td>       
                                    <td class="v-align-middle text-center">
                                        <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                    </td> 
                                </tr> 
                                <tr class="order-progress"  >
                                    <td class="v-align-middle"><a href="{{url('clients/particular/show')}}"><strong> Jihad Haytham </strong></a></td>
                                    <td class="v-align-middle text-center"><strong> jihad.haytham@gmail.com</strong></td>                
                                    <td class="v-align-middle text-center"> March 31, 1982 </td>       
                                    <td class="v-align-middle text-center"> <strong>Approve</strong> </td>       
                                    <td class="v-align-middle text-center">
                                        <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                    </td> 
                                </tr> 
                                <tr class="order-progress"  >
                                    <td class="v-align-middle"><a href="{{url('clients/particular/show')}}"><strong> Mahbub Hanan </strong></a></td>
                                    <td class="v-align-middle text-center"><strong> mahbub.hanan@gmail.com</strong></td>                
                                    <td class="v-align-middle text-center"> April 10, 1992 </td>       
                                    <td class="v-align-middle text-center"> <strong>Approve</strong> </td>       
                                    <td class="v-align-middle text-center">
                                        <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                    </td> 
                                </tr> 
                                <tr class="order-progress"  >
                                    <td class="v-align-middle"><a href="{{url('clients/particular/show')}}"><strong> Ahmad Gerges </strong></a></td>
                                    <td class="v-align-middle text-center"><strong> ahmad_gerges@gmail.com</strong></td>                
                                    <td class="v-align-middle text-center"> May 26, 1981 </td>       
                                    <td class="v-align-middle text-center"> <strong>Not Approved</strong> </td>       
                                    <td class="v-align-middle text-center">
                                        <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                    </td> 
                                </tr> 
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