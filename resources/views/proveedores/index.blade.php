@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Proveedores</h1>
    
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Nuevo Proveedor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->correo }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>
                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
