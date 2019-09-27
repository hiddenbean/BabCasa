
@foreach($notifications as $notification)
<div class="notification-item b-b b-grey {{$notification->read_at ? '': 'unread'}}">
        <a href="{{url('notifications/'.$notification->id)}}" class="notification-container">
        <div class="notification-content">
            <span class="thumbnail-wrapper d48 circular inline">
                <img src="{{Storage::url($notification->causer()->picture->path) }}" alt="" data-src="{{Storage::url($notification->causer()->picture->path) }}" data-src-retina="{{Storage::url($notification->causer()->picture->path) }}" width="32" height="32">
                <span><i class="fa fa-lg fa-user text-secondary"></i></span>
            </span>
            <div class="notification-text">
                <p>
                    <span class="notification-sender bold">
                        {{$notification->causer()->first_name.' '.$notification->causer()->last_name}} 
                    </span>
                    <span class="notification-desc">
                        @php
                            $path = parse_url($notification->type, PHP_URL_PATH);
                            $pathFragments = explode('\\', $path);
                            $end = end($pathFragments);
                        @endphp
                        {{ __('notification.'.snake_case($end))}}
                    </span>
                </p>
                <div class="small time">
                    {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                </div>
            </div>
        </div>
    </a>
        <div class="option" data-toggle="tooltip" data-placement="left" data-original-title="mark as read">
            <form action="{{$notification->read_at ? 'javascript:;': url('notifications/'.$notification->id.'/mark-as-read')}}" class="ajax">
                @csrf
                <button type="submit" class="btn btn-transparent no-padding mark"></button>
            </form>	
        </div>
    </div>
@endforeach