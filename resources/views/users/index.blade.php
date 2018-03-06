@extends('layouts.app')

@section('content')
<div class="page-header">
        <h1>Listado de usuarios</h1>
    </div>
    <table class="table table-bordered table-striped">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right">Nuevo usuario</a>
        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th>Documento</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr> 
        </thead>
        @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>
                        {{ $user->documento }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->direccion }}
                    </td>
                    <td>
                        {{ $user->telefono }}
                    </td>
                    <td class="actions">
                        <button class="btn btn-sm btn-deep-purple admin" data-id="{{ $user->id }}" >Administrador</button>
                        <button class="btn btn-sm btn-indigo biblio" data-id="{{ $user->id }}" >Bibliotecario</button>
                        <button class="btn btn-sm btn-light-blue user" data-id="{{ $user->id }}">Usuario</button>
                        <input type="hidden"
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection()

@section('scripts')
<script src="{{ asset('js/users/changeRole.js') }}"></script>
@endsection()