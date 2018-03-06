@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>Inventario de libros</h1>
    </div>
    <table class="table table-bordered table-striped">
        <a href="{{ route('libros.create') }}" class="btn btn-primary btn-sm pull-right">Nuevo Libro</a>
        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th>Nombre</th>
                <th>Genero</th>
                <th>Editorial</th>
                <th>Autor</th>
                <th>Existencias</th>
                <th>Acciones</th>
            </tr> 
        </thead>
        @foreach ($libros as $libro )
            <tbody>
                <tr>
                    <td>
                        {{ $libro->nombre }}
                    </td>
                    <td>
                        {{ $libro->genero }}
                    </td>
                    <td>
                        {{ $libro->editorial }}
                    </td>
                    <td>
                        {{ $libro->autor }}
                    </td>
                    <td>
                        {{ $libro->cantidad }}
                    </td>
                    <td class="actions">
                        <a href="{{ route('libros.edit', ['id' => $libro->id ]) }}" class="btn btn-sm btn-default">Editar</a>
                        {!!Form::open(['route'=> ['libros.destroy',$libro], 'method' => 'DELETE'])!!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection()