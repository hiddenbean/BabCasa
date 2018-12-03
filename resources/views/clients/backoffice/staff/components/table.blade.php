

@if (isset(Session::get('messages')['success']))
<div class="alert alert-success" role="alert">
    <button class="close" data-dismiss="alert"></button>
    <strong>Success: </strong>{{ Session::get('messages')['success'] }}
</div>
@endif
@if (isset(Session::get('messages')['error']))
<div class="alert alert-danger" role="alert">
    <button class="close" data-dismiss="alert"></button>
    <strong>Error: </strong>{{ Session::get('messages')['error'] }}
</div>
@endif
<div class="card">
        <div class="card-header">
            <div class="card-title">
                Active clients list 
                <a 
                    href="javascript:;" 
                    data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-html="true" 
                    trigger="click" 
                    title= "<p class='tooltip-text'>This table is containing all the categories in the BABCasa platforme.
                            <br> You can (add, edit or remove) a staff if you have the right permissions.
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
            <form action="{{route('multi_delete.staff')}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:80px">username</th>
                        <th style="width:150px">Email</th>
                        <th style="width:100px">Phone</th>
                        <th style="width:100px">Full name</th>
                        <th style="width:100px">Birthday</th>
                        <th style="width:100px">Social media</th>   
                        <th style="width:100px">Account status</th>
                    </thead> 
                    <tbody> 
                        @foreach($particulars as $particular)
                        <tr role="row" id="0">
                            <td class="v-align-middle"><a href="{{url('clients/'.$particular->name)}}"><strong>{{$particular->name}}</a></strong></td>
                            <td class="v-align-middle"><a href="{{url('clients/'.$particular->name)}}"><strong>{{$particular->email}}</a></strong></td>
                            <td class="v-align-middle">{{$particular->phone->country->phone_code.$particular->phone->number}}</td>
                            <td class="v-align-middle"><a href="{{url('clients/'.$particular->name)}}"><strong>{{$particular->first_name.' '.$particular->last_name}}</a></strong></td>
                            <td class="v-align-middle">{{$particular->birthday}}</td>
                            <td class="v-align-middle"><a href="javascript:;" class="btn btn-tag"> <i class="fab fa-facebook-f"></i></a><a href="javascript:;" class="btn btn-tag"><i class="fab fa-google"></i></a></td>
                            <td class="v-align-middle"><strong>{{$particular->status}}</strong></td>
                              
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </form>
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
                "scrollCollapse": true,
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