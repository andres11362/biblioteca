@extends('layouts.app')

@section('content')
    @include('alerts.validate')
    <div class="page-header">
        <h1>Nuevo usuario</h1>
    </div>
    {!! Form::open(['route' => 'users.store', 'method' => 'post', 'id' => 'create-form']) !!}
        @include('users.form.usuario')
        {!! Form::submit('Registrar', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()