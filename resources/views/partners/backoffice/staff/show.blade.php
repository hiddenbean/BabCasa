@extends('layouts.backoffice.staff.app')
@section('css')
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="{{ asset('pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
@endsection

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
                    <a href="{{ url('/partners') }}">Partner</a>
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
            <h4 class="m-t-0 m-b-0"> <strong>Partner Information</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                    <div class="col-md-9 b-r b-dashed b-grey"> 
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Name</h5>
                                    <p>{{$partner->name}}</p>
    
                                    <h5 class="p-t-15">Email</h5>
                                    <p>{{$partner->email}}</p>

                                    <h5 class="p-t-15">Ice</h5>
                                    <p>{{$partner->ice}}</p>
                                   
                                </div>
                                <div class="col-md-4">
                                    <h5>Company name</h5>
                                    <p>{{$partner->company_name}}</p>
    
                                    <h5 class="p-t-15"> Trade registry</h5>
                                    <p>{{$partner->trade_registry}}</p> 
                                    <h5 class="p-t-15"> Taxe id</h5>
                                    <p>{{$partner->taxe_id}}</p> 
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($partner->picture->path)}}" alt="" srcset="" width="350">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Adresse:</h5>
                                    <p>{{$partner->address->address}}
                                        <br>{{$partner->address->address_two}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Country:</h5>
                                    <p>{{$partner->address->country->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>City:</h5>
                                    <p>{{$partner->address->city}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Full name:</h5>
                                    <p>{{$partner->address->full_name}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Zip code:</h5>
                                    <p>{{$partner->address->zip_code}}</p>
                                </div>
                            </div>
                            {{-- {{$partner->phones[0]->country}} --}}
                            <div class="row">
                                <div class="col-md-4">
                                    @if(count($partner->phones) > 0 && isset($partner->phones->whereIn('type', ['phone', 'fix'])->first()->number))
                                        <!--{{ $phone1 = $partner->phones->whereIn('type', ['phone', 'fix'])->first()->number }}-->
                                        <!--{{ $country1 = $partner->phones->whereIn('type', ['phone', 'fix'])->first()->country->code }}-->
                                    @else
                                        <!--{{ $phone1 = 'Not available' }}-->
                                        <!--{{ $country1 = 'Not available' }}-->
                                    @endif
                                    <h5>Phone N1:</h5>
                                    <p>{{'('.$country1.') '. $phone1 }}</p>
                                </div>
                               
                                <div class="col-md-4">
                                    @if(count($partner->phones) > 1 && isset($partner->phones->whereIn('type', ['phone', 'fix'])->first()->number))
                                        <!--{{ $phone2 = $partner->phones->whereIn('type', ['phone', 'fix'])->first()->number }}-->
                                        <!--{{ $country2 = $partner->phones->whereIn('type', ['phone', 'fix'])->first()->country->code }}-->
                                    @else
                                        <!--{{ $phone2 = 'Not available' }}-->
                                        <!--{{ $country2 = 'Not available' }}-->
                                    @endif
                                    <h5>phone N2:</h5>
                                    <p>{{'('.$country2.') '. $phone2 }}</p>
                                </div>
                                <div class="col-md-4">
                                    @if(isset($partner->phones->where('type', 'fax')->first()->number))
                                        <!--{{ $phone3 = $partner->phones->where('type', 'fax')->first()->number }}-->
                                        <!--{{ $country3 = $partner->phones->where('type', 'fax')->first()->country->code }}-->
                                    @else
                                        <!--{{ $phone3 = 'Not available' }}-->
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
                                @if($partner->status->first()->is_approved)
                                <span class="label label-success">Approuve</span>  
                                @else 
                                     <span class="label label-danger">Rejeter</span>  
                                @endif
                                <a href="{{url('statuses/'.$partner->name)}}" class="float-right"> Statuses history</a>
                                <br>
                                <div id="approve">

                                
                            <h3> Approve this account</h3>
                            When a user submits a self-registration form, it can be reviewed and approved.
                        <form action="{{url('statuses')}}" method="post" class="mt-2">
                                @csrf
                        <input type="hidden" name="partner_id" value="{{$partner->id}}">
                                <input type="checkbox" data-init-plugin="switchery" data-size="small" name="is_approved" data-color="primary" @if($partner->status->first()->is_approved) checked @endif /> 
                                <label for="">Approve</label><br>
                                <label for="">
                                        @if($partner->status->first())
                                            @foreach($partner->status->first()->reasons as $key => $reason)
                                            {{$reason->reference}} 
                                            @if(count($partner->status->first()->reasons)-1!=$key) / @endif
                                            @endforeach
                                        @endif
                               
                                </label>
                                <select class="full-width select2-hidden-accessible" name="reasons[]" data-init-plugin="select2" multiple="" tabindex="-1" aria-hidden="true">
                                        @foreach($reasons as $reason)
                                            <option value="{{$reason->id}}">{{$reason->reference}}</option>
                                        @endforeach
                                    
                                    </select>
                                    <label class='error' for='reasons'>
                                            @if ($errors->has('reasons'))
                                                {{ $errors->first('reasons') }}
                                            @endif
                                    </label> 
                                    <button type="submit"  class="btn btn-danger mt-2">Submit</button>
                            </form>
                        </div>
                        </div>
                        
                        <div class="col-md-12">
                            <h3>Update password</h3>
                            We advise you to use a password you do not use anywhere else.<br>
                            <form action="{{route('reset.password.partner',['partner'=>$partner->name])}}" method="post">
                                @csrf
                                <button type="submit">Update password</button>
                            </form>
                        </div> 
                        <div class="col-md-12">
                            <h3> Deactivate this account</h3>
                            Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Babcasa. Some information may still be visible to others.
                          <br>
                                <a href="{{route('delete.partner',['partner'=>$partner->name])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-danger">Deactivate</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

@stop