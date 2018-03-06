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
{!! Form::model($user, ['route' => ['user.updateData', $user ], 'method' => 'put', 'id' => 'edit-form']) !!}
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        {!! Form::text('documento',null, ['id' => 'materialFormDocument', 'class' => 'form-control']) !!}
        {!! Form::label('materialFormDocument', 'Documento') !!}   
    </div>
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        {!! Form::text('name',null, ['id' => 'materialFormContactNameEx', 'class' => 'form-control']) !!}
        {!! Form::label('materialFormContactNameEx', 'Nombre') !!}   
    </div>
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        {!! Form::email('email',null, ['id' => 'materialFormEmail', 'class' => 'form-control']) !!}
        {!! Form::label('materialFormEmail', 'Email') !!}   
    </div>
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        {!! Form::text('direccion',null, ['id' => 'materialFormAddress', 'class' => 'form-control']) !!}
        {!! Form::label('materialFormAddress', 'Direccion') !!}   
    </div>
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        {!! Form::text('telefono',null, ['id' => 'materialFormPhone', 'class' => 'form-control']) !!}
        {!! Form::label('materialFormPhone', 'telefono') !!}   
    </div>
    {!! Form::submit('Registrar', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}
@endsection()