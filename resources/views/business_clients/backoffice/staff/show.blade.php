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
                    <a href="{{ url('/clients/business') }}">Business clients</a>
                </li>
                <li class="breadcrumb-item active">
                    Show
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<div class="row">
        <!-- START SECONDARY SIDEBAR -->
        <div class=" col-md-3">
                <nav class="secondary-sidebar"> 
                    <p class="menu-title">Sub menu</p>
                    <ul class="main-menu"> 
                        <li class="active">
                            <a href="{{ url('/') }}">
                            <span class="title"><i class="pg-folder"></i>Orders</span>
                            </a> 
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <span class="title"><i class="pg-sent"></i>Markets</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <span class="title"><i class="pg-sent"></i>offers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <span class="title"><i class="pg-sent"></i>Support</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <span class="title"><i class="pg-sent"></i>Support</span>
                            </a>
                        </li>
                    </ul> 
                </nav>
                </div>
                <!-- END SECONDARY SIDEBAR  -->
<div class="container-fluid container-fixed-lg col-md-9">
    <div class="card ">
        <div class="card-header">
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <h4 class="m-t-0 m-b-0"> <strong>Business client Information</strong> </h4>
        </div>
        
        <div class="card-body ">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Name</h5>
                                <p>{{ $business->company_name }}</p>

                            </div>
                            <div class="col-md-4">
                                <h5>Email</h5>
                                <p>{{ $business->email }}</p>

                            </div>
                            <div class="col-md-4">
                                <img src="{{ Storage::url($business->picture->path)}}" class="img-thumbnail" alt="" srcset="">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Adresse:</h5>
                                <p>{{ $business->address->address }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Country:</h5>
                            <p>{{ $business->address->country->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Trade registry:</h5>
                                <p>{{ $business->trade_registry }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Ice:</h5>
                                <p>{{ $business->ice }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>City:</h5>
                                <p>{{ $business->address->city}}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Full name:</h5>
                                <p>{{ $business->address->full_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Zip code:</h5>
                                <p>{{ $business->address->zip_code }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Phone N1:</h5>
                                @if(count($business->phones) > 0 && isset($business->phones()->whereIn('type', ['fix', 'phone'])->get()[0]->number))
                                    <!--{{ $number0 = $business->phones()->whereIn('type', ['phone', 'fix'])->get()[0]->number }}-->
                                    <!--{{ $country0_code = $business->phones()->whereIn('type', ['phone', 'fix'])->get()[0]->country->code }}-->
                                @else
                                    <!--{{ $number0 = null }}-->
                                    <!--{{ $country0_code = 'Not available' }}-->
                                @endif

                            <p>{{ $country0_code }}{{ $number0 }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>phone N2:</h5>
                                @if(count($business->phones) > 1 && isset($business->phones()->whereIn('type', ['fix', 'phone'])->get()[1]->number))
                                    <!--{{ $number1 = $business->phones()->whereIn('type', ['phone', 'fix'])->get()[1]->number }}-->
                                    <!--{{ $country1_code = $business->phones()->whereIn('type', ['phone', 'fix'])->get()[1]->country->code }}-->
                                @else
                                    <!--{{ $number1 = null }}-->
                                    <!--{{ $country1_code = 'Not available' }}-->
                                @endif
                                <p>{{ $country1_code }}{{ $number1 }}</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Fax:</h5>
                                @if(isset($business->phones->where('type', 'fax')->first()->number))
                                    <!--{{ $fax = $business->phones->where('type', 'fax')->first()->number }}-->
                                    <!--{{ $country3_code = $business->phones->where('type', 'fax')->first()->country->code }}-->
                                @else
                                    <!--{{ $fax = null }}-->
                                    <!--{{ $country3_code = 'Not available' }}-->
                                @endif
                                <p>{{ $country3_code }}{{ $fax }}</p>
                            </div>
                        </div> 
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                                @if($business->status->first()->is_approved)
                                <span class="label label-success">Approuve</span>  
                                @else 
                                     <span class="label label-danger">Rejeter</span>  
                                @endif
                                <a href="{{url('statuses/business/'.$business->name)}}" class="float-right"> Statuses history</a>
                                <br>
                            <h3> Approve this account</h3>
                            When a user submits a self-registration form, it can be reviewed and approved.

                            <form action="{{url('statuses')}}" method="post" class="mt-2">
                                @csrf
                                <input type="hidden" name="user_name" value="{{$business->name}}">
                                <input type="hidden" name="user_type" value="business">
                                <input type="checkbox" data-init-plugin="switchery" data-size="small" name="is_approved" data-color="primary" @if($business->status->first()->is_approved) checked @endif /> 
                                <label for="">Approve</label><br>
                                <label for="">
                                    @if($business->status->first())
                                        @foreach($business->status->first()->reasons as $key => $reason)
                                            {{$reason->reference}} 
                                            @if(count($business->status->first()->reasons)-1!=$key) / @endif
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
                        <div class="col-md-12">
                            <h3>Update password</h3>
                            We advise you to use a password you do not use anywhere else<br>
                            <form action="{{route('reset.password.business',['business'=>$business->name])}}" method="post">
                                @csrf
                                <button type="submit">Update password</button>
                            </form>
                        </div> 
                        <div class="col-md-12">
                            <h3> Deactivate this account</h3>
                            Deactivating your account will disable your profile and remove your name and photo from most things you've shared on Babcasa. Some information may still be visible to others.
                            <form action="{{ url('clients/business/'.$business->name.'/destroy') }}" method="post" class="mt-2">
                                @csrf
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-danger" >Desactivate</button>
                            </form>
                        </div>
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