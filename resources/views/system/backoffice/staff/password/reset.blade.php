@extends('system.backoffice.staff.public_template') 

@section('content')

<h3>Reset your password</h3> 
<p>
    Create a new password for your staff account
</p>
<form id="form-register" class="p-t-15" action="{{ route('staff.password.reset') }}" method="post">
    @csrf 
    <input type="hidden" name="token" value="{{$token}}">
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="form-group form-group-default input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email"  value="{{ $email }}" class="form-control" placeholder="Ex : xy@babcasa.com">
                <label class='error' for='email'></label>
            </div>
        </div>  
    </div>
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="form-group form-group-default input-group">
                <label for="password">New password</label>
                <input type="text" name="password" class="form-control">
                <label class='error' for='password'>
                    @if($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="form-group form-group-default input-group">
                <label for="password_confirmation">Confirm new password</label>
                <input type="text" name="password_confirmation" class="form-control"> 
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
        Reset password
    </button>
</form>

@stop