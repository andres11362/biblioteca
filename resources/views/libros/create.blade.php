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
        <h1>Nuevo Libro</h1>
    </div>
    {!! Form::open(['route' => 'libros.store', 'method' => 'post', 'id' => 'create-form']) !!}
        @include('libros.form.book')
        {!! Form::submit('Registrar', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()