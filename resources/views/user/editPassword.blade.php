@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    {!! Form::open(['route' => 'user.updatePassword', 'method' => 'put', 'id' => 'create-form']) !!}
        {{ csrf_field() }}
        <div class="md-form{{ $errors->has('current-password') ? ' has-error' : '' }}">
            <i class="fa fa-user prefix grey-text"></i> 
            <input id="current-password" type="password" class="form-control" name="current-password" required>
            <label for="current-password" class="col-md-4 control-label">Current Password</label>
            @if ($errors->has('current-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                </span>
            @endif
        </div>
        <div class="md-form{{ $errors->has('new-password') ? ' has-error' : '' }}">
            <i class="fa fa-user prefix grey-text"></i> 
            <input id="new-password" type="password" class="form-control" name="new-password" required>
            <label for="new-password" class="col-md-4 control-label">New Password</label>
            @if ($errors->has('new-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('new-password') }}</strong>
                </span>
            @endif
        </div>
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i> 
            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
        </div>
        {!! Form::submit('Cambiar contraseña', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()