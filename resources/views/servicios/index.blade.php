@extends('layouts.app')

@section('title', 'Servicios Técnicos')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Servicios Técnicos</h1>

    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Nuevo Servicio</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>
                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este servicio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
