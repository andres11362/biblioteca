@extends('layouts.app')

@section('content')
    @include('alerts.validate')
    <div class="page-header">
        <h1>Nuevo Libro</h1>
    </div>
    {!! Form::open(['route' => 'libros.store', 'method' => 'post', 'files' => true, 'id' => 'create-form']) !!}
        @include('libros.form.book')
        {!! Form::submit('Registrar', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()