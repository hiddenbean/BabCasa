@extends('layouts.backoffice.staff.app')
@section('css_before')
<link href="{{asset('plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" /> 
<link href="{{asset('plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('plugins/nvd3/nv.d3.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('plugins/mapplic/css/mapplic.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/rickshaw/rickshaw.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css" media="screen">
<link href="{{asset('plugins/jquery-metrojs/MetroJs.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('pages/css/pages-icons.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- END BREADCRUMB --> 
        </div>
    </div>
</div>

<!-- content start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-6 m-b-10">
                    <div class="ar-2-1">
                        <!-- START WIDGET widget_graphTile-->
                        <div class="widget-4 card no-border  no-margin widget-loader-bar">
                            <div class="container-sm-height full-height d-flex flex-column">
                                <div class="card-header  ">
                                    <div class="card-title text-black hint-text">
                                        <span class="font-montserrat fs-11 all-caps">
                                            Product revenue <i class="fa fa-chevron-right"></i>
                                        </span>
                                    </div>
                                    <div class="card-controls">
                                        <ul>
                                            <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
                                                        class="card-icon card-icon-refresh"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="p-l-20 p-r-20">
                                    <h5 class="no-margin p-b-5 pull-left hint-text">Pages</h5>
                                    <p class="pull-right no-margin bold hint-text">2,563</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget-4-chart line-chart mt-auto" data-line-color="success"
                                    data-area-color="success-light" data-y-grid="false" data-points="false"
                                    data-stroke-width="2">
                                    <svg></svg>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET -->
                    </div>
                </div>
                <div class="col-sm-6 m-b-10">
                    <div class="ar-2-1">
                        <!-- START WIDGET widget_barTile-->
                        <div class="widget-5 card no-border  widget-loader-bar">
                            <div class="card-header  pull-top top-right">
                                <div class="card-controls">
                                    <ul>
                                        <li><a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="container-xs-height full-height">
                                <div class="row row-xs-height">
                                    <div class="col-xs-5 col-xs-height col-middle relative">
                                        <div class="padding-15 top-left bottom-left">
                                            <h5 class="hint-text no-margin p-l-10">France, Florence</h5>
                                            <p class=" bold font-montserrat p-l-10">2,345,789
                                                <br>USD</p>
                                            <p class=" hint-text visible-xlg p-l-10">Today's sales</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-7 col-xs-height col-bottom relative widget-5-chart-container">
                                        <div class="widget-5-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-b-10">
                    <!-- START WIDGET D3 widget_graphTileFlat-->
                    <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
                        <div class="container-xs-height full-height">
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="card-header  top-left top-right">
                                        <div class="card-title text-black hint-text">
                                            <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                            </span>
                                        </div>
                                        <div class="card-controls">
                                            <ul>
                                                <li>
                                                    <a data-toggle="refresh" class="card-refresh text-black" href="#"><i
                                                        class="card-icon card-icon-refresh"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height ">
                                <div class="col-xs-height col-top relative">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="p-l-20">
                                                <h3 class="no-margin p-b-5 text-white">$14,000</h3>
                                                <p class="small hint-text m-t-5">
                                                    <span class="label  font-montserrat m-r-5">60%</span>Higher
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        </div>
                                    </div>
                                    <div class='widget-8-chart line-chart' data-line-color="black" data-points="true"
                                        data-point-color="success" data-stroke-width="2">
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
                        <div class="full-height d-flex flex-column">
                            <div class="card-header ">
                                <div class="card-title text-black">
                                    <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                    </span>
                                </div>
                                <div class="card-controls">
                                    <ul>
                                        <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-l-20">
                                <h3 class="no-margin p-b-5 text-white">$23,000</h3>
                                <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
                                </a>
                                <span class="small hint-text text-white">65% lower than last month</span>
                            </div>
                            <div class="mt-auto">
                                <div class="progress progress-small m-b-20">
                                    <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                    <div class="progress-bar progress-bar-white" style="width:45%"></div>
                                    <!-- END BOOTSTRAP PROGRESS -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xlg-3 m-b-10">
            <!-- START WIDGET D3 widget_graphOptionsWidget-->
            <div class="widget-16 card no-border  no-margin widget-loader-circle">
                <div class="card-header ">
                    <div class="card-title">Page Options
                    </div>
                    <div class="card-controls">
                        <ul>
                            <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-16-header padding-20 d-flex">
                    <span class="icon-thumbnail bg-master-light pull-left text-master">ws</span>
                    <div class="flex-1 full-width overflow-ellipsis">
                        <p class="hint-text all-caps font-montserrat  small no-margin overflow-ellipsis ">Pages name
                        </p>
                        <h5 class="no-margin overflow-ellipsis ">Webarch Sales Analysis</h5>
                    </div>
                </div>
                <div class="p-l-25 p-r-45 p-t-25 p-b-25">
                    <div class="row">
                        <div class="col-md-4 ">
                            <p class="hint-text all-caps font-montserrat small no-margin ">Views</p>
                            <p class="all-caps font-montserrat  no-margin text-success ">14,256</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
                            <p class="all-caps font-montserrat  no-margin text-warning ">24</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
                            <p class="all-caps font-montserrat  no-margin text-success ">56</p>
                        </div>
                    </div>
                </div>
                <div class="relative no-overflow">
                    <div class="widget-16-chart line-chart" data-line-color="success" data-points="true"
                        data-point-color="white" data-stroke-width="2">
                        <svg></svg>
                    </div>
                </div>
                <div class="b-b b-t b-grey p-l-20 p-r-20 p-b-10 p-t-10">
                    <p class="pull-left">Post is Public</p>
                    <div class="pull-right">
                        <input type="checkbox" data-init-plugin="switchery" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="b-b b-grey p-l-20 p-r-20 p-b-10 p-t-10">
                    <p class="pull-left">Maintenance mode</p>
                    <div class="pull-right">
                        <input type="checkbox" data-init-plugin="switchery" checked="checked" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="p-l-20 p-r-20 p-t-10 p-b-10 ">
                    <p class="pull-left no-margin hint-text">Super secret options</p>
                    <a href="#" class="pull-right"><i class="fa fa-arrow-circle-o-down text-success fs-16"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END WIDGET -->
        </div>
        <div class="col-md-4">
            <!-- START WIDGET widget_tableWidget-->
            <div class="widget-11 card no-border  no-margin widget-loader-bar">
                <div class="card-header  ">
                    <div class="card-title">Today's Table
                    </div>
                    <div class="card-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-l-25 p-r-25 p-b-20">
                    <div class="pull-left">
                        <h2 class="text-success no-margin">webarch</h2>
                    </div>
                    <h3 class="pull-right semi-bold"><sup>
                            <small class="semi-bold">$</small>
                        </sup> 102,967
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="widget-11-table auto-overflow">
                    <table class="table table-condensed table-hover">
                        <tbody>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">dewdrops</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18">$27</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">johnsmith</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18 text-primary">$1000</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">janedrooler</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18">$27</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">johnsmith</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18 text-primary">$1000</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">dewdrops</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18">$27</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">johnsmith</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18 text-primary">$1000</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">dewdrops</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18">$27</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">johnsmith</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18 text-primary">$1000</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">dewdrops</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18">$27</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-montserrat all-caps fs-12">Purchase CODE #2345</td>
                                <td class="text-right">
                                    <span class="hint-text small">johnsmith</span>
                                </td>
                                <td class="text-right b-r b-dashed b-grey">
                                    <span class="hint-text small">Qty 1</span>
                                </td>
                                <td>
                                    <span class="font-montserrat fs-18 text-primary">$1000</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="padding-25">
                    <p class="small no-margin">
                        <a href="#"><i class="fa fs-16 fa-arrow-circle-o-down text-success m-r-10"></i></a>
                        <span class="hint-text ">Show more details of APPLE . INC</span>
                    </p>
                </div>
            </div>
            <!-- END WIDGET -->

        </div>
    </div>
</div>
@endsection


@section('script_before')  
<script src="{{asset('plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/jquery-actual/jquery.actual.min.js')}}"></script>  
<script src="{{asset('plugins/classie/classie.js')}}"></script>
<script src="{{asset('plugins/switchery/js/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/lib/d3.v3.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/nv.d3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/src/utils.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/src/tooltip.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/src/interactiveLayer.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/src/models/axis.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/src/models/line.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/nvd3/src/models/lineWithFocusChart.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/mapplic/js/hammer.min.js')}}"></script>
<script src="{{asset('plugins/mapplic/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/mapplic/js/mapplic.js')}}"></script>
<script src="{{asset('plugins/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('plugins/jquery-metrojs/MetroJs.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/skycons/skycons.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('js/dashboard.js')}}" type="text/javascript"></script>
@endsection