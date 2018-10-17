<div class="card">
        <div class="card-header">
            <div class="card-title">
                Details list 
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
                        <div class="col-md-3 text-right no-padding">
                                @if (auth()->guard('staff')->user()->can('write','category'))
                                <a href="{{url('details/create')}}" class="btn btn-transparent"><i class="fas fa-plus fa-sm"></i> <strong>Add</strong></a>
                                @endif
                                </div>
                        <div class="col-md-3 text-right no-padding">
                            <a href="{{url('details/trash')}}" class="btn btn-transparent-danger"><i class="fas fa-trash-alt fa-sm"></i> <strong>Trash</strong></a>
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
                    <form action="{{route('delete.categories')}}" method="post">
                    {{ method_field('DELETE') }}
                        {{ csrf_field() }}
            <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                <thead>
                    <th class="text-center" style="width:35px"><a href="#"><i class="fas fa-trash-alt"></i></a></th>
                    <th style="width:62px"></th>
                    <th style="width:62px"></th>
                    <th style="width:150px">Detail name</th>           
                    <th style="width:300px">Categories using this detail</th>             
                    <th style="width:100px">Languages</th>
                </thead>
        
                <tbody> 
                    <tr role="row" id="0">
                        <td class="v-align-middle p-l-5 p-r-5">
                            <div class="checkbox no-padding no-margin text-center">
                                <input type="checkbox" id="checkbox2">
                                <label for="checkbox2" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle text-center p-l-5 p-r-5">
                            <a href="{{url('categories/create')}}"><i class="fas fa-pen fa-sm"></i> <strong>Edit</strong></a>
                            </td> 
                        <td class="v-align-middle text-center p-l-5 p-r-5">
                            <a href="#" class="text-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a></td>
                        <td class="v-align-middle"><a href="#"><strong>Detail name</strong></a></td>
                        <td class="v-align-middle">
                            <a href="#" class="btn btn-tag">cat</a>
                            <a href="#" class="btn btn-tag">subcat1</a>
                            <a href="#" class="btn btn-tag">sub-subcat1</a>
                        </td>
                        <td class="v-align-middle">
                            <a href="#" class="btn btn-tag">En</a>
                            <a href="#" class="btn btn-tag">Fr</a>
                        </td>
                    </tr>                                 
                </tbody>
            </table>
        </div>
    </div> 
    
    @section('inner_script')
        <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
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