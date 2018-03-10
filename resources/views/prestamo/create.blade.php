@extends('layouts.app')

@section('content')
@include('alerts.validate')
{!! Form::open(['route' => 'transaction.store', 'method' => 'post', 'id' => 'create-form']) !!}
    {!! Form::select('id_libro', $libros, null) !!}
    {!! Form::submit('Registrar', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}
@endsection()