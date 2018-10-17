@extends('system.backoffice.staff.public_template') 

@section('content')
    <h3>Staff space login</h3>
    <p>
        Use your staff account provided by BABCasa.
    </p>
    <div class="row">
        <div class="col-md-12">
            <form class="p-t-15" role="form" method="POST" action="{{route('staff.login.submit')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default input-group @if($errors->has('username')) has-error @endif">
                            <div class="form-input-group">
                                <label>USERNAME</label>
                                <input type="text" name="username" class="form-control" placeholder="Ex : ayoub.moum" value="{{ old('username') }}"/>
                                @if ($errors->has('username'))
                                <label class='error' for='username'>{{ $errors->first('username') }}</label>
                                @endif
                            </div>
                            <div class="input-group-append ">
                                <span class="input-group-text">
                                    @babcasa.com
                                </span>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default @if($errors->has('password')) has-error @endif">
                            <label>PASSWORD</label>
                            <input type="password" name="password" class="form-control"/>
                            @if ($errors->has('password'))
                            <label class='error' for='password'>{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($errors->has('faild'))
                    <label class='error'>{{ $errors->first('faild') }}</label>
                @endif
                <div class="row m-b-10"> 
                    <div class="col-md-6 sm-p-l-10">
                        <div class="checkbox no-margin">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember')? "checked": "" }} />
                            <label for="remember">Keep Me Signed in</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('staff.passwords.reset') }}" class="small">Forgot your password ?</a> 
                    </div>
                </div>
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Login</button>
            </form>
        </div>
    </div>
@stop 