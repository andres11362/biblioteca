@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>Tus prestamos</h1>
    </div>
    <table class="table table-bordered table-striped">
        <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm pull-right">Nuevo prestamo</a>
        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th>Libro</th>
                <th>Inicio prestamo</th>
                <th>Fin prestamo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr> 
        </thead>
        @foreach ($prestamos as $prestamo)
            <tbody>
                <tr>
                    <td>
                        {{ $prestamo->libros->nombre }}
                    </td>
                    <td>
                        {{ $prestamo->fecha_inicio }}
                    </td>
                    <td>
                        {{ $prestamo->fecha_fin }}
                    </td>
                    <td>
                        @if($prestamo->estado == 1)
                            Solicitado
                        @endif
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection()