@extends('layouts.backoffice.app')

@section('body')
<div class="d-flex justify-content-center full-height full-width align-items-center">
    <div class="error-container text-center">
        <h1 class="error-number">500</h1>
        <h2 class="semi-bold">Sorry but we couldnt find this page</h2>
        <p class="p-b-10">This page you are looking for does not exsist <a href="#">Report this?</a></p>
        <div class="error-container-innner text-center">
            <form class="error-form">
                <div class=" transparent text-left">
                    <div class="form-group form-group-default input-group">
                        <div class="form-input-group">
                            <label>Search</label>
                                <input class="form-control" placeholder="Try searching the missing page" type="email">
                            </div>
                        <div class="input-group-append">
                            <span class="input-group-text transparent">
                                <span class="pg-search p-l-10"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="pull-bottom sm-pull-bottom full-width d-flex align-items-center justify-content-center">
    <div class="error-container">
        <div class="error-container-innner">
            <div class="p-b-30 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix d-flex-md-up row no-margin">
                <div class="col-md-12 no-padding d-flex align-items-center justify-content-center">
                    <!--<img alt="" data-src="{{ asset('img/logo.png') }}" data-src-retina="{{ asset('img/logo.png') }}" src="{{ asset('img/logo.png') }}" width="100">-->
                    <a href="http://www.babcasa.com">www.babcasa.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection