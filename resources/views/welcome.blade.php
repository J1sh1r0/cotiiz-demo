@extends('layouts.app')

@section('title', 'Bienvenido a Cotiiz Demo')

@section('content')
<div class="text-center">
    <h1>Bienvenido a la Demo de Cotiiz</h1>
    <p>Explora las funcionalidades de la plataforma creando empresas, proveedores, servicios y solicitudes.</p>
    <a href="{{ url('/empresas') }}" class="btn btn-primary">Empezar</a>
</div>
@endsection
