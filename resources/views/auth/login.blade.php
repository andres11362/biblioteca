@extends('layouts.app')

@section('content')

<!-- Material form login -->
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <p class="h4 text-center mb-4">Sign in</p>

    <!-- Material input email -->
    <div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="email" id="materialFormLoginEmailEx" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        <label for="materialFormLoginEmailEx">Your email</label>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Material input password -->
    <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="materialFormLoginPasswordEx" class="form-control" name="password" required>
        <label for="materialFormLoginPasswordEx">Your password</label>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="md-form">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>
    </div>


    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit">Login</button>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
    </div>
</form>
<!-- Material form login -->
                    
@endsection
