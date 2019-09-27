@extends('layouts.backoffice.app') 

@section('body')
<div class="register-container sm-p-t-30 register-staff-width">
    <div class="d-flex justify-content-center flex-column full-height">
        <div class="logo_text">  
            <div class="logo_text">
                <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60"/>
            </div>
        </div>
        @yield('content')
    </div>
</div>

<div class=" container-fluid  container-fixed-lg footer">
    <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
            <span class="hint-text">Copyright © 2018 </span>
            <span class="font-montserrat">BABCasa</span>.
            <span class="hint-text">All rights reserved. </span>
            <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
        </p>
        
        <p class="small no-margin pull-right sm-pull-reset">
            <a id="langs" href="javascript:;">{{ LaravelLocalization::getCurrentLocaleName() }} ({{ LaravelLocalization::getCurrentLocaleRegional() }})</a>
            <div class="dropup-content">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="small" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }} ({{ $properties['regional'] }})
                    </a>
                @endforeach
            </div>
        </p>
        <div class="clearfix"></div>
    </div>
</div>
@stop 


@section('after_script')
    <script>
    $('#langs').click(function() {
        $('.dropup-content').show();
    });

    $('.dropup-content a').click(function() {
        $('.dropup-content').hide();
    });

    $(document).mouseup(function(e) 
    {
        var container = $(".dropup-content");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.hide();
        }
    });
    </script>
@stop
