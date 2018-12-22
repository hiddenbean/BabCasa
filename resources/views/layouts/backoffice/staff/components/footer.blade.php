<div class=" container-fluid  container-fixed-lg footer">
    <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
            <span class="hint-text">Copyright © 2018 </span>
            <span class="font-montserrat">BABCasa</span>.
            <span class="hint-text">All rights reserved. </span>
            <span class="sm-block"><a href="{{ url('terms_of_use') }}" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="{{ url('privacy_policy') }}" class="m-l-10">Privacy Policy</a></span>
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