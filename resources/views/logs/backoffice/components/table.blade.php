
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Activity Log
                            <a 
                                href="javascript:;" 
                                data-toggle="tooltip" 
                                data-placement="bottom" 
                                data-html="true" 
                                trigger="click" 
                                title= "<p class='tooltip-text'>You can use this form to create a new detail if you have the right permissions.<br>
                                        If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                <i class="fas fa-question-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                    @foreach($activities as $key=> $activitys)
                        <div class="row">
                            <div class="col-md-12">
                                <h5>
                                    <strong>
                                     {{$key }}
                                    </strong>
                                </h5>
                            </div>
                        </div>
                        @foreach($activitys as $activity)
                        <!-- log row -->
                        <div class="row b-t b-grey">
                            <div class="col-md-12 p-t-5 p-b-10">
                                <div class="row">
                                    <div class="col-md-8">
                                        <strong><a href="javasacript:;">{{ $activity->causer->first_name }} {{ $activity->causer->last_name }}</a></strong> {!! $activity->description !!} 
                                        {{-- <a href="javascript:;"><u>link</u></a> --}}
                                    </div>
                                    <div class="col-md-4 text-right">
                                            {{ date_format($activity->created_at, 'H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end log row -->
                        @endforeach
                    @endforeach
                    </div>
                </div>
            </div>
        </div>