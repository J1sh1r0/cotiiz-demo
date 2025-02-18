@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Solicitudes</h1>

    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary mb-3">Nueva Solicitud</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Empresa</th>
                <th>Servicio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->id }}</td>
                <td>{{ $solicitud->proveedor->nombre }}</td>
                <td>{{ $solicitud->empresa->nombre }}</td>
                <td>{{ $solicitud->servicio->nombre }}</td>
                <td>{{ $solicitud->estado }}</td>
                <td>
                    <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta solicitud?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
