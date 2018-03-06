@extends('layouts.app')

@section('content')
<div class="page-header">
        <h1>Listado de prestamos</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th>Usuario</th>
                <th>Libro</th>
                <th>Inicio prestamo</th>
                <th>Fin prestamo</th>
                <th>Estado</th>
            </tr> 
        </thead>
        @foreach ($prestamos as $prestamo)
            <tbody>
                <tr>
                    <td>
                        {{ $prestamo->users->name }}
                    </td>
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
                            En prestamo
                        @endif
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection()