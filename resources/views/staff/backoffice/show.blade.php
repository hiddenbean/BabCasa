@extends('layouts.backoffice.staff.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
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
                    <a href="{{ url('/staff') }}">Staff</a>
                </li>
                <li class="breadcrumb-item active">
                    Show
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Staff Information</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Name</h5>
                                <p>{{$staff->name}}</p>

                                <h5 class="p-t-15">First name</h5>
                                <p>{{$staff->first_name}}</p>
                                <h5 class="p-t-15">Profile</h5>
                                <p>{{$staff->profile->profileLang->first()->reference}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Email</h5>
                                <p>{{$staff->email}}</p>

                                <h5 class="p-t-15"> last Name</h5>
                                <p>{{$staff->last_name}}</p> 
                            </div>
                            <div class="col-md-4">
                                <img src="{{ Storage::url($staff->picture->path)}}" alt="" srcset="" width="350">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Adresse:</h5>
                                <p>{{$staff->address->address}}
                                    <br>{{$staff->address->address_two}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Country:</h5>
                                <p>{{$staff->address->country->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>City:</h5>
                                <p>{{$staff->address->city}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Full name:</h5>
                                <p>{{$staff->address->full_name}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Zip code:</h5>
                                <p>{{$staff->address->zip_code}}</p>
                            </div>
                        </div>
                        {{-- {{$staff->phones[0]->country}} --}}
                        <div class="row">
                            <div class="col-md-4">
                                    <h5>Phone N1:</h5>
                                    <p>{{'('.$staff->phones[0]->country->code.') '. $staff->phones[0]->number }}</p>
                                </div>
                           
                            <div class="col-md-4">
                                <h5>phone N2:</h5>
                                <p>{{'('.$staff->phones[1]->country->code.') '. $staff->phones[1]->number }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Fax:</h5>
                                <p>{{'('.$staff->phones[2]->country->code.') '. $staff->phones[2]->number }}</p>
                            </div>
                        </div> 
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Update password</h3>
                            We advise you to use a password you do not use anywhere else.<br>
                            <a href="#"><strong>Update password</strong></a>
                        </div>
                        <div class="col-md-12">
                            <h3> Deactivate this account</h3>
                            Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Babcasa. Some information may still be visible to others.
                           <br>
                            <a href="{{route('delete.staff',['staff'=>$staff->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-danger">Deactivate</a> 
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@stop