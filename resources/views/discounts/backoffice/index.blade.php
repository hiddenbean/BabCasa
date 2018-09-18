@extends('layouts.backoffice.partner.app')

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
                        <a href="{{ url('/') }}">Tableau de borad</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Discounts
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header">
                <div class="card-title">List of discount</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                            <a href="{{url('products/create')}}" class="btn btn-primary btn-cons">New Discount</a>
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
                        <th style="width:10%" class="text-center">Reference</th> 
                        <th style="width:10%" class="text-center">Start At</th> 
                        <th style="width:10%" class="text-center">End At</th>                
                        <th style="width:5%" class="text-center">Products Count</th>
                        <th style="width:5%" class="text-center">percentage</th>
                        <th style="width:10%" class="text-center">Creation date</th> 
                        <th style="width:5%" class="text-center"></th>                
                    </thead>
            
                    <tbody>  
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><strong> Lorem ipsum dolor sit amet. </strong></td>
                                <td class="v-align-middle text-center"><strong> 07/02/2018 </strong></td>      
                                <td class="v-align-middle text-center"><strong>01/03/2018</strong></td> 
                                <td class="v-align-middle text-center"> 10 </td>      
                                <td class="v-align-middle text-center"><strong> 50% </strong>
                                
                                </td>      
                                <td class="v-align-middle text-center"> 01/02/2018 </td>      
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><strong> Baby Car Seat. </strong></td>
                                <td class="v-align-middle text-center"><strong> 21/05/2018 </strong></td>      
                                <td class="v-align-middle text-center"><strong>15/06/2018</strong></td> 
                                <td class="v-align-middle text-center"> 5 </td>      
                                <td class="v-align-middle text-center"><strong> 30%</strong>
                                
                                </td>   
                                <td class="v-align-middle text-center"> 01/05/2018 </td>      
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><strong> Wolfe Design. </strong></td>
                                <td class="v-align-middle text-center"><strong> 07/04/2018 </strong></td>      
                                <td class="v-align-middle text-center"><strong>30/05/2018</strong></td>
                                <td class="v-align-middle text-center"> 7 </td>      
                                <td class="v-align-middle text-center"> <strong><strong>25%</strong>
                                
                                </td>    
                                <td class="v-align-middle text-center"> 01/04/2018 </td>      
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
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