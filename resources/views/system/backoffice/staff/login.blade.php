@extends('system.backoffice.staff.public_template') 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="p-t-15" role="form" method="POST" action="{{route('staff.login.submit')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default input-group @if($errors->has('username')) has-error @endif">
                            <div class="form-input-group">
                                <label>USERNAME</label>
                                <input type="text" name="username" class="form-control" placeholder="Your staff username here"/>
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
                            <input type="password" name="password" class="form-control" placeholder="Your staff password here"/>
                            @if ($errors->has('password'))
                            <label class='error' for='password'>{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row m-t-10 m-b-10"> 
                    <div class="col-md-6 sm-p-l-10">
                        <div class="checkbox no-margin">
                            <input type="checkbox" name="remember" id="remember"/>
                            <label for="remember">Keep Me Signed in</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('staffs.passwords.rest') }}" class="small">Forgot your password ?</a> 
                    </div>
                </div>
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Login</button>
            </form>
        </div>
    </div>
@stop 