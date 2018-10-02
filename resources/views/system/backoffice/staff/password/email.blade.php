@extends('layouts.backoffice.app') 

@section('body')

<div class="register-container sm-p-t-30 register-staff-width">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div> 
        <h3>Get a rest password link</h3>
        <p>
            To get the rest password link you need to entre your BABCasa staff account E-mail. 
        </p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form id="form-register" class="p-t-15" role="form" action="{{ route('staff.password.link.send') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default input-group  @if ($errors->has('email')) has-error @endif">
                        <div class="form-input-group">
                            <label>E-mail</label> 
                            <input type="text" class="form-control " name="email" placeholder="Ex : xy@babcasa.com">
                            <label class='error' for='email'>
                            @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                            </label>
                        </div> 
                    </div>
                    
                </div> 
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit"> 
                Send my password rest link 
            </button>
        </form>
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

@section('script')
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
