@extends('layouts.backoffice.staff.app')
@section('css_before')
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/code_countries') }}">Code Countries</a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Create new code country</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="code" placeholder="Code">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group form-group-default">
                                    <label>Country</label>
                                    <select class="cs-select cs-skin-slide cs-transparent" name="country_id[]" data-init-plugin="cs-select">
                                        <option Selected>County</option>
                                        <option>USA (+1)</option>
                                        <option>Uzbekistan (+7)</option> 
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
    <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script> 
@stop