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
                <div class="card-title">List of Patner</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                            <a href="{{url('partner/create')}}" class="btn btn-primary btn-cons">New partner</a>
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
                        <th style="width:10%" class="text-center"></th>                
                    </thead>
            
                    <tbody>  
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><a href="{{url('partner/show')}}"><strong> Kalil Wakil </strong></a></td>
                                <td class="v-align-middle text-center"><strong> kalil-wakil@admin.com</strong></td>                
                                <td class="v-align-middle text-center"> February 2, 1985 </td>       
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><a href="{{url('partner/show')}}"><strong> Abde Lkhabir Tareef </strong></a></td>
                                <td class="v-align-middle text-center"><strong>  lkhabir-tareef@admin.com</strong></td>                
                                <td class="v-align-middle text-center"> March 26, 1977 </td>       
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><a href="{{url('partner/show')}}"><strong> Amjad Mazin </strong></a></td>
                                <td class="v-align-middle text-center"><strong> amjad-mazin@admin.com</strong></td>                
                                <td class="v-align-middle text-center"> April 8, 1969 </td>       
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><a href="{{url('partner/show')}}"><strong> Wahid Haddad </strong></a></td>
                                <td class="v-align-middle text-center"><strong> wahid.haddad@admin.com</strong></td>                
                                <td class="v-align-middle text-center"> August 5, 1961 </td>       
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><a href="{{url('partner/show')}}"><strong> Naila Shamoun </strong></a></td>
                                <td class="v-align-middle text-center"><strong> naila.shamoun@admin.com</strong></td>                
                                <td class="v-align-middle text-center"> June 2, 1964 </td>       
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