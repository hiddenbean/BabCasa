@extends('system.backoffice.partner.public_template') 

@section('content')
        <h3>Get a reset password link</h3>
        <p>
            To get the reset password link, you need to entre your BABCasa partner account E-mail. 
        </p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form id="form-register" class="p-t-15" role="form" action="{{ url('/password/email') }}" method="POST">
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
            <div class="row m-b-10">
                <div class="col-lg-6">
                    <a href="#" class="small">Help? Contact Support</a>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="{{ url('/') }}" class="small">Cancel the password reset</a>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit"> 
                Send my password rest link 
            </button>
        </form>
@stop 

