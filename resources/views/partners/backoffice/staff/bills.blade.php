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
                <li class="breadcrumb-item">
                    <a href="{{ url('/partners') }}">Partner</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('partners/'.$partner->name)}}">{{$partner->company_name}}</a>
                </li>
                <li class="breadcrumb-item active">
                    Bills
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- START SECONDARY SIDEBAR -->
<nav class="secondary-sidebar"> 
        <p class="menu-title">Sttings</p>
        <ul class="main-menu"> 
         <li >
                <a href="{{url('partners/'.$partner->name)}}">
                <span class="title"><i class="pg-folder"></i>Partner Information</span>
                </a> 
            </li>
             <li>
                <a href="{{url('partners/'.$partner->name.'/statuses')}}">
                <span class="title"><i class="pg-folder"></i>Statuses history</span>
                </a> 
            </li>
            <li>
                <a href="{{url('partners/'.$partner->name.'/products')}}">
                <span class="title"><i class="pg-folder"></i>products</span>
                </a> 
            </li>
            <li >
                <a href="{{url('partners/'.$partner->name.'/orders')}}">
                    <span class="title"><i class="pg-sent"></i>orders</span>
                </a>
            </li> 
            <li>
                <a href="{{url('partners/'.$partner->name.'/discounts')}}">
                    <span class="title"><i class="pg-sent"></i>discounts</span>
                </a>
            </li> 
            <li class="active">
                <a href="#">
                    <span class="title"><i class="pg-sent"></i>bills</span>
                </a>
            </li> 
        </ul> 
    </nav>
<!-- END SECONDARY SIDEBAR  -->

    <!-- breadcrumb end -->
    <div class="inner-content full-height padding-20">
        <div class="card card-transparent">
            <div class="card-body">
                 <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:10%" class="text-center">Reference</th> 
                        <th style="width:10%" class="text-center">Total</th>                
                        <th style="width:5%" class="text-center">Status</th>
                        <th style="width:10%" class="text-center">Creation date</th> 
                        <th style="width:5%" class="text-center"></th>                
                    </thead>
            
                    <tbody>  
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><strong> Lorem ipsum dolor sit amet. </strong></td>
                                <td class="v-align-middle text-center"><strong>150 $</strong></td> 
                                <td class="v-align-middle text-center"> paid </td>      
                                <td class="v-align-middle text-center"> 01/02/2018 </td>      
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-print"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><strong> Baby Car Seat. </strong></td>
                                <td class="v-align-middle text-center"><strong> 1400 $ </strong></td>      
                                <td class="v-align-middle text-center"> not paid </td>      
                                <td class="v-align-middle text-center"> 01/05/2018 </td>      
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-print"></i></button>
                                </td> 
                            </tr> 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><strong> Wolfe Design. </strong></td>
                                <td class="v-align-middle text-center"><strong>5500 $ </strong></td>      
                                <td class="v-align-middle text-center">paid</td>
                                <td class="v-align-middle text-center"> 01/04/2018 </td>      
                                <td class="v-align-middle text-center">
                                    <button class="btn btn-transparent"><i class="fa fa-print"></i></button>
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