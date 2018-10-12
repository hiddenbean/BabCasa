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
                    <a href="{{ url('/clients/particular') }}">Particular clients</a>
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
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <h4 class="m-t-0 m-b-0"> <strong>particularClient Information</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Name</h5>
                                <p>{{$particularClient->name}}</p>

                                <h5 class="p-t-15">First name</h5>
                                <p>{{$particularClient->first_name}}</p>
                               
                            </div>
                            <div class="col-md-4">
                                <h5>Email</h5>
                                <p>{{$particularClient->email}}</p>

                                <h5 class="p-t-15"> last Name</h5>
                                <p>{{$particularClient->last_name}}</p> 
                            </div>
                            <div class="col-md-4">
                                <img src="{{ Storage::url($particularClient->picture->path)}}" alt="" srcset="" width="350">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Adresse:</h5>
                                <p>{{$particularClient->address->address}}
                                    <br>{{$particularClient->address->address_two}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Country:</h5>
                                <p>{{$particularClient->address->country->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>City:</h5>
                                <p>{{$particularClient->address->city}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Full name:</h5>
                                <p>{{$particularClient->address->full_name}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Zip code:</h5>
                                <p>{{$particularClient->address->zip_code}}</p>
                            </div>
                        </div>
                        {{-- {{$particularClient->phones[0]->country}} --}}
                        <div class="row">
                            <div class="col-md-4">
                                @if(count($particularClient->phones) > 0 && isset($particularClient->phones->whereIn('type', ['phone', 'fix'])->first()->number))
                                    <!--{{ $phone1 = $particularClient->phones->whereIn('type', ['phone', 'fix'])->first()->number }}-->
                                    <!--{{ $country1 = $particularClient->phones->whereIn('type', ['phone', 'fix'])->first()->country->code }}-->
                                @else
                                    <!--{{ $phone1 = null }}-->
                                    <!--{{ $country1 = 'Not available' }}-->
                                @endif
                                <h5>Phone N1:</h5>
                                <p>{{'('.$country1.') '. $phone1 }}</p>
                            </div>
                           
                            <div class="col-md-4">
                                @if(count($particularClient->phones) > 1 && isset($particularClient->phones->whereIn('type', ['phone', 'fix'])->first()->number))
                                    <!--{{ $phone2 = $particularClient->phones->whereIn('type', ['phone', 'fix'])->first()->number }}-->
                                    <!--{{ $country2 = $particularClient->phones->whereIn('type', ['phone', 'fix'])->first()->country->code }}-->
                                @else
                                    <!--{{ $phone2 = null }}-->
                                    <!--{{ $country2 = 'Not available' }}-->
                                @endif
                                <h5>phone N2:</h5>
                                <p>{{'('.$country2.') '. $phone2 }}</p>
                            </div>
                            <div class="col-md-4">
                                @if(isset($particularClient->phones->where('type', 'fax')->first()->number))
                                    <!--{{ $phone3 = $particularClient->phones->where('type', 'fax')->first()->number }}-->
                                    <!--{{ $country3 = $particularClient->phones->where('type', 'fax')->first()->country->code }}-->
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
                            <form action="{{route('reset.password.particular_client',['partner'=>$particularClient->name])}}" method="post">
                                @csrf
                                <button type="submit">Update password</button>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <h3> Deactivate this account</h3>
                            Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Babcasa. Some information may still be visible to others.
                           <br>
                            <a href="{{route('delete.particular-client',['particular'=>$particularClient->name])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-danger">Deactivate</a> 
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