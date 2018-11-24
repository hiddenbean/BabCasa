

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
                Affiliates list 
                <a 
                    href="javascript:;" 
                    data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-html="true" 
                    trigger="click" 
                    title= "<p class='tooltip-text'>This table is containing all the categories in the BABCasa platforme.
                            <br> You can (add, edit or remove) a partner if you have the right permissions.
                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                    <i class="fas fa-question-circle"></i>
                </a>
            </div>
            <div class="pull-right">
                <div class="col-xs-12">
                    <div class="row">
                        @if (auth()->guard('staff')->user()->can('write','partner'))
                            <div class="col-md-3 text-right no-padding">
                                <a href="{{url('affiliates/create')}}" class="btn btn-transparent"><i class="fas fa-plus fa-sm"></i> <strong>Add</strong></a>
                            </div>
                            <div class="col-md-3 text-right no-padding">
                                <a href="{{url('affiliates/trash')}}" class="btn btn-transparent-danger"><i class="fas fa-trash-alt fa-sm"></i> <strong>Trash</strong></a>
                            </div> 
                        @endif
                        <div class="col-md-6">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            
        </div>
        <div class="card-body">
            <form action="{{route('multi_delete.affiliates')}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                    @if (auth()->guard('staff')->user()->can('write','partner'))
                        <th class="text-center" style="width:35px"><button class="btn btn-link" type="submit"><i class="fas fa-trash-alt"></i></button></th>
                    @endif
                    
                        <th style="width:62px"></th>
                        <th style="width:62px"></th>
                        <th style="width:80px">Picture</th>           
                        <th style="width:100px">Company name</th>         
                        <th style="width:80px">username</th>
                        <th style="width:150px">email</th>
                        <th style="width:100px">Admin</th>          
                        <th style="width:100px">Admin phone</th>
                        <th style="width:100px">Account status</th>
                    </thead> 

                    <tbody>
                            @foreach($partners as $partner)
                            <tr role="row" id="0">
                                @if (auth()->guard('staff')->user()->can('write','partner'))
                                <td class="v-align-middle p-l-5 p-r-5">
                                    <div class="checkbox no-padding no-margin text-center">
                                        <input type="checkbox" value="{{$partner->id}}" name="partners[]" id="checkbox{{$partner->id}}">
                                        <label for="checkbox{{$partner->id}}" class="no-padding no-margin"></label>
                                    </div>
                                </td>
                                
                                <td class="v-align-middle text-center p-l-5 p-r-5">
                                    <a href="{{url('affiliates/'.$partner->name.'/edit')}}"><i class="fas fa-pen fa-sm"></i> <strong>Edit</strong></a>
                                    </td> 
                                <td class="v-align-middle text-center p-l-5 p-r-5">
                                    <a href="{{route('delete.partner',['partner'=>$partner->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="text-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                </td>
                                @endif
                                <td class="v-align-middle picture">
                                        <a href="{{url('affiliates/'.$partner->name)}}"><img src="@if(isset($partner->picture->path)) {{Storage::url($partner->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" alt="cat1"></a>
                                    </td>
                                <td class="v-align-middle"><a href="{{url('affiliates/'.$partner->id)}}"><strong>{{$partner->company_name }}</strong></a></td>
                                <td class="v-align-middle"><a href="{{url('affiliates/'.$partner->id)}}"><strong>{{$partner->name }}</strong></a></td>
                                <td class="v-align-middle">{{$partner->email }}</td>
                                <td class="v-align-middle"><strong>{{$partner->first_name.' '.$partner->last_name }}</strong></td>
                                <td class="v-align-middle">{{$partner->phones()->where('tag','admin')->first()->country->phone_code.' '.$partner->phones()->where('tag','admin')->first()->number}}</td>
                                <td class="v-align-middle"><strong> {{$partner->status->first()->is_approved ? 'approves' : 'rejected'}}</strong></td>
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