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
        <h1>Editar Libro</h1>
    </div>
    {!! Form::model($libro, ['route' => ['libros.update', $libro ], 'method' => 'put', 'id' => 'edit-form']) !!}
        @include('libros.form.book')
        {!! Form::submit('Editar', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()