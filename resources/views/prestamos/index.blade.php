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
                <th>Acciones</th>
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
                        @if($prestamo->estado == 0)
                            Solicitado
                        @endif
                        @if($prestamo->estado == 1)
                            Prestado
                        @endif
                        @if($prestamo->estado == 2)
                            Devuelto
                        @endif
                        @if($prestamo->estado == 3)
                            Multa
                        @endif
                    </td>
                    <td class="actions">
                        <button class="btn btn-sm btn-deep-purple rec" data-id="{{ $prestamo->id }}" >Reclamar</button>
                        <button class="btn btn-sm btn-indigo dev" data-id="{{ $prestamo->id }}" >Devolucion</button>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection()

@section('scripts')
    <script src="{{ asset('js/prestamos/state.js') }}"></script>
@endsection()