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
    <div class="page-header">
        <h1>Nuevo usuario</h1>
    </div>
    {!! Form::open(['route' => 'users.store', 'method' => 'post', 'id' => 'create-form']) !!}
        @include('users.form.usuario')
        {!! Form::submit('Registrar', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()