                <div class="split-view">
                    <!-- START SPLIT LIST VIEW -->
                    <div class="split-list">
                    <a class="list-refresh" href="#"><i class="fa fa-refresh"></i></a>
                    <div data-email="list" class="boreded no-top-border">
                        <!-- START EMAIL LIST SORTED BY DATE -->
                        <div data-email="list" class="boreded no-top-border list-view">
                            <!-- START EMAIL LIST SORTED BY DATE -->
                            <!-- END EMAIL LIST SORTED BY DATE -->
                            <div class="list-view-wrapper" data-ios="false">
                                    {{-- foreach --}}
                            @foreach($claims as $date => $items)
                            <div class="list-view-group-container">
                                <div class="list-view-group-header"><span>{{$date}}</span></div>
                                <ul class="no-padding">
                                    @foreach($items as $claim)
                                        <li class="item padding-15" data-email-id="{{$claim->id}}">
                                            <input type="hidden" id="close_ticket_link" value="{{url('support/'.$claim->id.'/close')}}">
                                            <input type="hidden" id="reply_form_link" value="{{url('support/'.$claim->id.'/message')}}">
                                            <input type="hidden" id="ticket_status_value" value="{{ $claim->status }}">
                                            <div class="avatar thumbnail-wrapper d32 circular"> <img width="40" height="40" alt="" data-src-retina="@if(isset($claim->claimable->picture->path)){{Storage::url($claim->claimable->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif"
                                                    data-src="@if(isset($claim->claimable->picture->path)) {{ Storage::url($claim->claimable->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif" src="@if(isset($claim->claimable->picture->path)) {{Storage::url($claim->claimable->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif"> </div>
                                            <div class="checkbox  no-margin p-l-10"> <input type="checkbox" value="1" id="emailcheckbox-0-0">
                                                <label for="emailcheckbox-0-0"></label> </div>
                                            <div class="inline m-l-15">
                                                <p class="name recipients no-margin hint-text small">{{$claim->claimable->name}}</p>
                                                <p class="subject no-margin">{{$claim->title}}</p>
                                                <p class="object no-margin">{{$claim->subject->subjectLang()->reference}}</p>
                                                <div class="body no-margin" style="display:none;">
                                                    @foreach($claim->claimMessages as $message)
                                                    <div class="b-t b-dashed b-grey p-t-20">
                                                        <div class="thumbnail-wrapper circular bordered">
                                                            <img width="40" height="40" data-src-retina="" src="@if(isset($message->claimMessageable->picture->path)) {{Storage::url($message->claimMessageable->picture->path)}} @else {{asset('img/img_placeholder.png')}} @endif">
                                                        </div>
                                                        <div class="sender inline m-l-10 m-b-20">
                                                            <p class="name no-margin bold">
                                                                {{$message->claimMessageable->name}}
                                                            </p>
                                                            <p class="datetime no-margin">{{ date_format($message->created_at, 'H:i') }}</p>
                                                        </div>
                                                        <br>
                                                        <p>
                                                        {!!$message->message!!}</p>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="datetime"> {{ date_format($claim->created_at, 'H:i') }}</div>
                                            <div class="clearfix"></div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            {{-- endforeach --}}
                        </div>
                        </div><!-- END EMAIL LIST SORTED BY DATE -->
                    </div>
                </div>
                <!-- END SPLIT LIST VIEW -->
                <!-- START SPLIT DETAILS -->
                <div data-email="opened" class="split-details">
                    <div class="no-result">
                        <h1>No ticket has been selected</h1>
                    </div>
                    <div class="email-content-wrapper" style="display:none">
                        <form id="reply_form" method="post">
                            @csrf
                        <div class="actions-wrapper menuclipper bg-master-lightest">
                            <ul class="actions menuclipper-menu no-margin p-l-20 ">
                                <li class="visible-sm-inline-block visible-xs-inline-block">
                                    <a href="{{url('support/all')}}" class="ajax email-list-toggle"><i class="fa fa-angle-left"></i> All tickets</a>
                                </li>
                                <li class="no-padding controls"><button type="submit" id="reply_submit" class="btn btn-transparent">Reply</button>
                                </li>
                                <li class="no-padding controls"><a data-method="post" id="close_ticket" data-token="{{csrf_token()}}" data-confirm="Are you sure?"  class="text-danger">Close this ticket</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="email-content">
                            <div class="email-content-header">  
                                <div class="subject m-t-20 m-b-20 bold">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="email-content-body m-t-20"></div>
                            <div class="controls wysiwyg5-wrapper b-a b-grey m-t-30">
                                <textarea class="email-reply" placeholder="Reply" name="message"></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- END SPLIT DETAILS -->
                    <!-- START COMPOSE BUTTON FOR TABS -->
                    <div class="compose-wrapper d-md-none" id="body">
                        <a class="compose-email text-info pull-right m-r-10 m-t-10" href="#"><i class="fa fa-pencil-square-o"></i></a>
                    </div>
                    <!-- END COMPOSE BUTTON -->
                </div>
            </div>
            <!-- END APP -->