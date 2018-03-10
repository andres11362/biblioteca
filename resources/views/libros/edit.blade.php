@extends('layouts.app')

@section('content')
    @include('alerts.validate')
    <div class="page-header">
        <h1>Editar Libro</h1>
    </div>
    {!! Form::model($libro, ['route' => ['libros.update', $libro ], 'files' => true, 'method' => 'put', 'id' => 'edit-form']) !!}    
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            {!! Form::text('nombre',null, ['id' => 'materialFormContactNameEx', 'class' => 'form-control']) !!}
            {!! Form::label('materialFormContactNameEx', 'Nombre') !!}   
        </div>
        <div class="md-form">
            <!--i class="fa fa-user prefix grey-text"--><!--/i-->
            {!! Form::select('genero',array(
                'Ciencia ficción'       => 'ciencia ficcion',
                'Comedia'               => 'comedia',
                'Epica'                 => 'epica',
                'Terror'                => 'terror',
                'Educacion'             => 'educacion',
                'Cuentos'               => 'cuentos',
                'Biografias'            => 'biografias',    
            ),null,['id' => 'genro', 'class' => 'form-control', 'placeholder' => 'Seleccione un genero']) !!}
        </div>
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            {!! Form::text('editorial',null, ['id' => 'materialFormEditorial', 'class' => 'form-control']) !!}
            {!! Form::label('materialFormEditorial', 'Editorial') !!}   
        </div>        
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            {!! Form::text('autor',null, ['id' => 'materialFormAuthor', 'class' => 'form-control']) !!}
            {!! Form::label('materialFormAuthor', 'Autor') !!}   
        </div>  
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            {!! Form::number('cantidad',null, ['id' => 'materialFormQuantity', 'class' => 'form-control']) !!}
            {!! Form::label('materialFormQuantity', 'Cantidad') !!}   
        </div>  
        <div class="md-form">
            {!! Form::file('img') !!}
        </div>  

        {!! Form::submit('Editar', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
@endsection()