@extends('layouts.backoffice.partner.app')

@section('css')
    <link type="text/css" rel="stylesheet" href="{{asset('backoffice/assets/plugins/jquery-datatable/media/css/jquery.dataTables.css') }}">
    <link type="text/css" rel="stylesheet" href="{{asset('backoffice/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}">
    <link media="screen" type="text/css" rel="stylesheet" href="{{asset('backoffice/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}">
@endsection

@section('content')

    @yield('breadcrumb')

    <!-- Content start-->
    <div class="container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-9">
                <div class="bg-white">
                    <!-- Table start -->
                    @yield('table')
                    <!-- Table end -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11 bg-white">
                        <div class="card card-transparent">
                            <div class="card-block">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/orders') }}"><span class="badge">2</span> orders</a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/orders') }}"><span class="badge">14</span> pending orders</a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/orders') }}"><span class="badge">5</span> currentb orders</a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/orders') }}"><span class="badge">6</span> orders completed</a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/orders') }}"><span class="badge"></span> orders canceled</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->

@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('backoffice/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('backoffice/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('backoffice/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"></script>
    <script src="{{asset('backoffice/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}" type="text/javascript"></script>
    <script src="{{asset('backoffice/assets/plugins/datatables-responsive/js/lodash.min.js') }}" type="text/javascript"></script>
    @yield('table_javascript')
@endsection