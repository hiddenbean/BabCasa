<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Products list
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

                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-3 text-right no-padding">
                                <a href="{{url('/products/create')}}" class="btn btn-transparent"><i class="fas fa-plus fa-sm"></i> <strong>Add</strong></a>
                            </div>
                            <div class="col-md-3 text-right no-padding">
                                <a href="{{url('/products/trash')}}" class="btn btn-transparent-danger"><i class="fas fa-trash-alt fa-sm"></i> <strong>Trash</strong></a>
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
                        <th class="text-center" style="width:25px"><button type="submit" class="btn btn-link"><i class="fas fa-trash-alt"></i></button></th>
                        <th style="width:30px"></th>
                        <th style="width:30px"></th>
                        <th style="width:80px">Picture</th>
                        <th style="width:100px">Product name</th>
                        <th style="width:80px">Price</th>
                        <th style="width:120px">Short desc</th> 
                        <th style="width:80px">Variants</th>
                        <th style="width:80px">Category</th>                
                        <th style="width:100px">Tags</th>             
                        <th style="width:80px">Languages</th>
                    </thead>
                    <tbody>                       
                    </tbody>
                </table>
            </div>
        </div>
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