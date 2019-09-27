@extends('layouts.backoffice.staff.app')
@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
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
                        <a href="{{ url('/details') }}">Details</a>
                    </li>
                    <li class="breadcrumb-item active">
                        ID : {{ $detail->id }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">
                        Detail id : {{ $detail->id }}
                    </div>
                </div>
                <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            @foreach($languages as $key=>$language)
                            @if(isset($detail->detailLangs->where('lang_id',$language->id)->first()->value)&& !empty($detail->detailLangs->where('lang_id',$language->id)->first()->value))
                                <li >
                                    <a data-toggle="tab" class="{{$language->id==$detail->detailLang()->lang_id ? 'active' : ''}}" href="#{{$language->id}}">
                                        <span>{{$language->name}}</span>
                                        </a>
                                    </li>
                                    @endif
                            @endforeach
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach($languages as $key=> $language)
                            <!-- silde  {{$key}} start -->
                            <div class="tab-pane slide-left {{$language->id==$detail->detailLang()->lang_id ? 'active' : ''}}" id="{{$language->id}}">
                                    @if(isset($detail->detailLangs->where('lang_id',$language->id)->first()->value)&& !empty($detail->detailLangs->where('lang_id',$language->id)->first()->value))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row m-b-10">
                                            <div class="col-md-3 uppercase">
                                                Name
                                            </div>
                                            <div class="col-md-9">
                                                <strong>
                                                    {{ $detail->detailLangs->where('lang_id',$language->id)->first()->value}}
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="row m-b-10">
                                            <div class="col-md-3 uppercase">
                                                categorys
                                            </div>
                                            <div class="col-md-8">
                                                <strong>
                                                    @foreach($detail->categories as $Category)
                                                        <a href="{{url('categories/'.$Category->id)}}" class="btn btn-tag btn-tag-light btn-tag-rounded m-r-5">{{isset($Category->categoryLangs->where('lang_id',$language->id)->first()->reference) ?$Category->categoryLangs->where('lang_id',$language->id)->first()->reference :$Category->categoryLang()->reference}}</a>
                                                    @endforeach
                                                </strong>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                @endif
                            </div>
                            <!-- silde {{$key}} end -->
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Publish
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    Status : <strong>@if($detail->deleted_at == NULL) Publish @else Removed @endif</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : <strong>{{$detail->created_at}}</strong>
                                </div>
                            </div>
                            @if($detail->updated_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>{{$detail->updated_at}}</strong>
                                </div>
                            </div>
                            @endif
                            @if($detail->deleted_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>{{$detail->deleted_at}}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                            @if($detail->deleted_at == NULL)
                                <div class="col-md-6">
                                    <a href="{{url('details/'.$detail->id.'/edit')}}" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>
                            @endif
                                <div class="col-md-6">
                                @if($detail->deleted_at == NULL)
                                    <a  href="{{route('delete.detail',['detail'=>$detail->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                @else
                                    <form action="{{url('details/'.$detail->id.'/restore')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                        </form>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Category translations
                                <a 
                                    href="javascript:;" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-html="true" 
                                    trigger="click" 
                                    title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    Available in : 
                                    @foreach($detail->detailLangs as $detailLang)
                                        @if($detailLang->value != "")
                                            <strong><a href="#">{{$detailLang->lang->name}}</a></strong> ,
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-12">
                                    <a href="{{url('details/'.$detail->id.'/translations')}}" class="btn btn-transparent"><strong><i class="fas fa-language p-r-10 fa-lg"></i>Add or Edit translations</strong></a>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('products.backoffice.staff.components.table')
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
                    [0, "desc"]
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
                console.log($(this).closest('tr').html());

            } else {
                $(this).closest('tr').removeClass('selected');
            }

        });
    });
    </script>
@endsection