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
                            <a href="{{ url('/attributes') }}">attributes</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Trash
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
                    Removed attributes list 
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
              <form action="{{url('attributes/multi-restore')}}" method="post">
                        {{ csrf_field() }}
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th class="text-center" style="width:35px"><button class="btn btn-link" type="submit"><i class="fas fa-undo-alt fa-lg"></i></button></th>
                        <th style="width:62px"></th>
                        <th style="width:150px">Attribute name</th>           
                        <th style="width:150px">Attribute type</th>           
                        <th style="width:150px">Description</th>           
                        <th style="width:300px">Categories using this attribute</th>             
                        <th style="width:100px">Languages</th>
                        <th style="width:150px"> Deleted at</th>       
                    </thead>
            
                    <tbody> 
                    @foreach($attributes as $attribute)
                        <tr role="row" id="0">
                           <td class="v-align-middle p-l-5 p-r-5">
                            <div class="checkbox no-padding no-margin text-center">
                                <input type="checkbox" value="{{$attribute->id}}" name="attribute[]" id="checkbox{{$attribute->id}}">
                                <label for="checkbox{{$attribute->id}}" class="no-padding no-margin"></label>
                            </div>
                        </td>
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <form action="{{url('attributes/'.$attribute->id.'/restore')}}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-link" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                </form>
                            </td> 
                             <td class="v-align-middle"><a href="{{url('attributes/'.$attribute->id)}}"><strong>@if($attribute->attributeLang->first()->reference==' '){{$attribute->attributeLangNotEmpty->first()->reference}} @else {{$attribute->attributeLang->first()->reference }}@endif</strong></a></td>
                            <td class="v-align-middle"><strong> {{$attribute->type}}</strong></td>
                            <td class="v-align-middle"><a href="{{url('attributes/'.$attribute->id)}}"><strong>@if($attribute->attributeLang->first()->description==' '){{$attribute->attributeLangNotEmpty->first()->description}} @else {{$attribute->attributeLang->first()->description }}@endif</strong></a></td>
                            <td class="v-align-middle">
                                @foreach($attribute->categories as $category)
                            <a href="{{url('categories/'.$category->id)}}" class="btn btn-tag">{{$category->categoryLang->first()->reference}}</a>
                            @endforeach
                            </td>
                            <td class="v-align-middle">
                                @foreach($attribute->attributeLangs as $attributeLang)
                                @if($attributeLang->value != " ")
                                     <a href="#" class="btn btn-tag">{{$attributeLang->lang->alpha_2_code}}</a>
                                @endif
                            @endforeach
                            </td>
                            <td class="v-align-middle">{{$attribute->deleted_at}}</td>
                        </tr> 
                    @endforeach                                       
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
                        [1, "desc"]
                    ],
                    "columnDefs": [
                        { "orderable": false, "targets": 0 },
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