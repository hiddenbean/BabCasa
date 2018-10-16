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
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/currencies') }}">Currencies</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Create new currency</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal" method="POST" action="{{url('currencies/'.$currency->id)}}" >
                        {{ csrf_field() }}
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$currency->name}}" placeholder="name">
                                        <label class='error' for='name'>
                                                @if ($errors->has('name'))
                                                    {{ $errors->first('name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Symbole</label>
                                <input type="text" class="form-control" name="symbole" value="{{$currency->symbole}}" placeholder="symbole">
                                    <label class='error' for='symbole'>
                                            @if ($errors->has('symbole'))
                                                {{ $errors->first('symbole') }}
                                            @endif
                                    </label> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group form-group-default">
                                    <label>Country</label>
                                    <select class="cs-select cs-skin-slide cs-transparent" name="country_id" data-init-plugin="cs-select">
                                            @foreach($countries as $country)

                                            <option value="{{$country->id}}"   @if($country->id == $currency->country_id){ selected } @endif
                                                >{{$country->name}}</option> 
                                            @endforeach
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
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script> 
@stop