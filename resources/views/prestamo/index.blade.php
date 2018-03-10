@extends('layouts.app')

@section('content')
    @include('alerts.messages')
    <div class="page-header">
        <h1 class="center-text">Tus prestamos</h1>
    </div>
    <br>
    @foreach ($prestamos as $prestamo)
        <div class="row">
            <div col="col-md-4">
                <img src="{{ asset('storage/imagenes/'.$prestamo->libros->img) }}" width="250" height="350" /> 
            </div>
            <div class="col-md-8">
                <h2 class="center-text">{{ $prestamo->libros->nombre }}</h2>
                <dd>
                    <h4 class="center-text">Fecha de prestamo: {{ $prestamo->fecha_inicio }}</h4>
                </dd>
                <dd>
                    <h4 class="center-text">Fecha de finalizacion: {{ $prestamo->fecha_fin }}</h4>
                </dd>
                <dd>
                    <h4 class="center-text">Estado:
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
                    </h4> 
                </dd>
                <dd>
                    <div class="center-text">
                        <button type="button" class="btn btn-indigo">Cancelar prestamo</button>
                    </div>
                </dd>
            </div>
        </div>
        <br>
    @endforeach
@endsection()