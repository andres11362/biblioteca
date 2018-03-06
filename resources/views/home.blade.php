@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="center">
            <img src="{{ asset('img/bienvenidos.png') }}" class="img-fluid" alt="Responsive image">    
        </div>
    </div>
</div>
@endsection
