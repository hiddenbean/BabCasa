

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
                Orders list 
                <a 
                    href="javascript:;" 
                    data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-html="true" 
                    trigger="click" 
                    title= "<p class='tooltip-text'>This table is containing all the categories in the BABCasa platforme.
                            <br> You can (add, edit or remove) a order if you have the right permissions.
                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                    <i class="fas fa-question-circle"></i>
                </a>
            </div>
            <div class="pull-right">
                <div class="col-xs-12">
                    <div class="row">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            
        </div>
        <div class="card-body">
            <form action="{{route('multi_delete.affiliates')}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <table id="tableWithSearch" class="table no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>                    
                        {{-- <th style="width:62px">ID</th>
                        <th style="width:130px">Customer</th>
                        <th style="width:50px">new client</th>
                        <th style="width:80px">Delivery</th>           
                        <th style="width:80px">total</th>
                        <th style="width:100px">Paiment method</th>         
                        <th style="width:70px">status</th>
                        <th style="width:150px">date</th>          
						<th style="width:100px">pdf	</th> --}}
						<th>Product</th>
						<th>Product Action</th>
						<th  style="width:0px">Order Status</th>
						<th>Order Action</th>
                    </thead> 

                    <tbody>
						<tr>
							<td  style="background-color: whitesmoke;"><small class="text-muted">order id :</small> 1232232423 <a href="#">view Detail</a><br> <small class="text-muted">order items & date :</small> 12:43 21/11/1992</td>
							<td  style="background-color: whitesmoke;"><small class="text-muted">Store name : </small> probook <br> <a href="#" class="text-danger">visit store</a> |  <a href="#" class="text-danger"><i class="fas fa-envelope"></i> contact seller</a> </td>
							<td  style="background-color: whitesmoke;"></td>
							<td  style="background-color: whitesmoke;">Order Amount : <br> <div class="text-primary"> 23 DH</div></td>
						</tr>
						<tr>
							<td><img src="http://shfcs.org/en/wp-content/uploads/2015/11/MedRes_Product-presentation-2.jpg" width="70" alt=""> dqsdqsdqsqs  <p>$ 23.0 X 1</p>  </td>
							<td>Confirmed Received <br> <a href="#" class="text-danger">Open Disqute</a></td>
							<td>Finished</td>
							<td><button class="btn btn-block"><i class="fas fa-eye fa-sm"></i> <strong>View</strong></button></td>
						</tr>
						<tr>
							<td><img src="http://shfcs.org/en/wp-content/uploads/2015/11/MedRes_Product-presentation-2.jpg" width="70" alt=""> dqsdqsdqsqs  <p>$ 23.0 X 1</p>  </td>
							<td>Confirmed Received <br> <a href="#" class="text-danger">Open Disqute</a></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td  style="background-color: whitesmoke;"><small class="text-muted">order id :</small> 1232232423 <a href="#">view Detail</a><br> <small class="text-muted">order items & date :</small> 12:43 21/11/1992</td>
							<td  style="background-color: whitesmoke;"><small class="text-muted">Store name : </small> probook <br> <a href="#" class="text-danger">visit store</a> |  <a href="#" class="text-danger"><i class="fas fa-envelope"></i> contact seller</a> </td>
							<td  style="background-color: whitesmoke;"></td>
							<td  style="background-color: whitesmoke;">Order Amount : <br> <div class="text-primary"> 23 DH</div></td>
						</tr>
						<tr>
							<td><img src="http://shfcs.org/en/wp-content/uploads/2015/11/MedRes_Product-presentation-2.jpg" width="70" alt=""> dqsdqsdqsqs  <p>$ 23.0 X 1</p>  </td>
							<td>Confirmed Received <br> <a href="#" class="text-danger">Open Disqute</a></td>
							<td>Finished</td>
							<td><button class="btn btn-block"><i class="fas fa-eye fa-sm"></i> <strong>View</strong></button></td>
						</tr>
						<tr>
							<td><img src="http://shfcs.org/en/wp-content/uploads/2015/11/MedRes_Product-presentation-2.jpg" width="70" alt=""> dqsdqsdqsqs  <p>$ 23.0 X 1</p>  </td>
							<td>Confirmed Received <br> <a href="#" class="text-danger">Open Disqute</a></td>
							<td></td>
							<td></td>
						</tr>
						
							{{-- <tr role="row" id="0">
								<td class="v-align-middle"><strong>1</strong></td>
								<td class="v-align-middle"><strong>salah alamjed</strong></td>
								<td class="v-align-middle">Yes</td>
								<td class="v-align-middle">rabat</td>
								<td class="v-align-middle">29 DH</td>
								<td class="v-align-middle">bank</td>
								<td class="v-align-middle"><span class="badge badge-success">Finished</span></td>
								<td class="v-align-middle">23-02-2019 12:39:18 </td>
								<td class="v-align-middle text-center p-l-5 p-r-5">
									<a href="#"><i class="fas fa-eye fa-sm"></i> <strong>View</strong></a>
								</td> 
							</tr> --}}
                            @foreach($orders as $order)
                            <tr role="row" id="0">
                                @if (auth()->guard('staff')->user()->can('write','condition'))
                                <td class="v-align-middle p-l-5 p-r-5">
                                    <div class="checkbox no-padding no-margin text-center">
                                        <input type="checkbox" value="{{$order->id}}" name="affiliates[]" id="checkbox{{$order->id}}">
                                        <label for="checkbox{{$order->id}}" class="no-padding no-margin"></label>
                                    </div>
                                </td>
                                
                                <td class="v-align-middle text-center p-l-5 p-r-5">
                                    <a href="{{url('affiliates/'.$order->name.'/edit')}}"><i class="fas fa-eye fa-sm"></i> <strong>Edit</strong></a>
                                    </td> 
                                <td class="v-align-middle text-center p-l-5 p-r-5">
                                    <a href="{{route('delete.order',['order'=>$order->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="text-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                </td>
                                @endif
                                <td class="v-align-middle picture">
                                        <a href="{{url('affiliates/'.$order->name)}}"><img src="@if(isset($order->picture->path)) {{Storage::url($order->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" alt="cat1"></a>
                                    </td>
                                <td class="v-align-middle"><a href="{{url('affiliates/'.$order->name)}}"><strong>{{$order->company_name }}</strong></a></td>
                                <td class="v-align-middle"><a href="{{url('affiliates/'.$order->name)}}"><strong>{{$order->name }}</strong></a></td>
                                <td class="v-align-middle">{{$order->email }}</td>
                                <td class="v-align-middle"><strong>{{$order->first_name.' '.$order->last_name }}</strong></td>
                                <td class="v-align-middle">{{$order->phones()->where('tag','admin')->first()->country->phone_code.' '.$order->phones()->where('tag','admin')->first()->number}}</td>
                                <td class="v-align-middle"><strong> {{$order->status->first()->is_approved!=0 ? 'approves' : 'rejected'}}</strong></td>
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
				"order":false,
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