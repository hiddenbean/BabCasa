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
                            <a href="{{ url('/categories') }}">Categories</a>
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
                    Removed Categories list 
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
            <form action="{{url('categories/multi-restore')}}" method="post">
                {{ csrf_field() }}
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th class="text-center" style="width:35px"><button class="btn btn-link" type="submit"><i class="fas fa-undo-alt fa-lg"></i></button></th>
                        <th style="width:62px"></th>
                        <th style="width:80px">Picture</th>
                        <th style="width:150px">Category name</th>
                        <th style="width:250px">Description</th> 
                        <th style="width:100px">Parent</th>                
                        <th style="width:80px">Articles</th>             
                        <th style="width:80px">Languages</th>             
                        <th style="width:150px">Deleted at</th>             
                    </thead>
            
                    <tbody> 
                    @foreach($categories as $category)
                        <tr role="row" id="0">
                            <td class="v-align-middle p-l-5 p-r-5">
                            <div class="checkbox no-padding no-margin text-center">
                                <input type="checkbox" value="{{$category->id}}" name="categories[]" id="checkbox{{$category->id}}">
                                <label for="checkbox{{$category->id}}" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle text-center p-l-5 p-r-5">
                            <a href="{{url('categories/'.$category->id.'/restore')}}" data-method="POST"  data-token="{{csrf_token()}}" class="text-danger"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></a></td>
                        </td> 
                        <td class="v-align-middle picture">
                            <a href="#"><img src="@if(isset($category->picture->path)) {{Storage::url($category->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" alt="cat1"></a>
                        </td>
                        <td class="v-align-middle"><a href="{{url('categories/'.$category->id)}}"><strong>{{$category->categoryLang()->reference }}</strong></a></td>
                        <td class="v-align-middle">{!!$category->categoryLang()->description!!}</td>
                        <td class="v-align-middle">@if(isset($category->category)) {{$category->category->categoryLang()->reference}}@else -@endif</td>
                        <td class="v-align-middle">{{count($category->products)}}</td>
                        <td class="v-align-middle">
                            @foreach($category->categoryLangs as $categoryLang)
                                    @if($categoryLang->reference != "")
                                        <a href="#" class="btn btn-tag">{{$categoryLang->lang->alpha_2_code}}</a>
                                    @endif
                                @endforeach
                        </td>
                            <td class="v-align-middle">{{$category->deleted_at}}</td>
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
                        [3, "desc"]
                    ],
                    "columnDefs": [
                        { "orderable": false, "targets": 0 },
                        { "orderable": false, "targets": 1 },
                        { "orderable": false, "targets": 2 },
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