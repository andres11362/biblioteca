
<div class="md-form">
    <i class="fa fa-user prefix grey-text"></i>
    {!! Form::text('nombre',null, ['id' => 'materialFormContactNameEx', 'class' => 'form-control']) !!}
    {!! Form::label('materialFormContactNameEx', 'Nombre') !!}   
</div>
<div class="md-form">
    <!--i class="fa fa-user prefix grey-text"--><!--/i-->
    {!! Form::select('genero',array(
        'Ciencia ficción'  => 'ciencia ficcion',
        'Comedia'          => 'comedia',
        'Epica'            => 'epica',
        'Terror'           => 'terror'  
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
