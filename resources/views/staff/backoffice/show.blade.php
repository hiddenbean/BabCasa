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
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    {!! \Session::get('error') !!}
                </div>
            @endif
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
                                @if(count($staff->phones) > 0 && isset($staff->phones->whereIn('type', ['phone', 'fix'])->first()->number))
                                    <!--{{ $phone1 = $staff->phones->whereIn('type', ['phone', 'fix'])->first()->number }}-->
                                    <!--{{ $country1 = $staff->phones->whereIn('type', ['phone', 'fix'])->first()->country->code }}-->
                                @else
                                    <!--{{ $phone1 = null }}-->
                                    <!--{{ $country1 = 'Not available' }}-->
                                @endif
                                <h5>Phone N1:</h5>
                                <p>{{'('.$country1.') '. $phone1 }}</p>
                            </div>
                           
                            <div class="col-md-4">
                                @if(count($staff->phones) > 1 && isset($staff->phones->whereIn('type', ['phone', 'fix'])->first()->number))
                                    <!--{{ $phone2 = $staff->phones->whereIn('type', ['phone', 'fix'])->first()->number }}-->
                                    <!--{{ $country2 = $staff->phones->whereIn('type', ['phone', 'fix'])->first()->country->code }}-->
                                @else
                                    <!--{{ $phone2 = null }}-->
                                    <!--{{ $country2 = 'Not available' }}-->
                                @endif
                                <h5>phone N2:</h5>
                                <p>{{'('.$country2.') '. $phone2 }}</p>
                            </div>
                            <div class="col-md-4">
                                @if(isset($staff->phones->where('type', 'fax')->first()->number))
                                    <!--{{ $phone3 = $staff->phones->where('type', 'fax')->first()->number }}-->
                                    <!--{{ $country3 = $staff->phones->where('type', 'fax')->first()->country->code }}-->
                                @else
                                    <!--{{ $phone3 = null }}-->
                                    <!--{{ $country3 = 'Not available' }}-->
                                @endif
                                <h5>Fax:</h5>
                                <p>{{'('.$country3.') '. $phone3 }}</p>
                            </div>
                        </div> 
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Update password</h3>
                            We advise you to use a password you do not use anywhere else.<br>
                            <form action="{{route('reset.password.staff',['staff'=>$staff->name])}}" method="post">
                                @csrf
                                <button type="submit">Update password</button>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <h3> Deactivate this account</h3>
                            Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Babcasa. Some information may still be visible to others.
                           <br>
                            <a href="{{route('delete.staff',['staff'=>$staff->name])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-danger">Deactivate</a> 
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