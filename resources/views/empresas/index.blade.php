@extends('layouts.app')

@section('title', 'Empresas')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Empresas</h1>
    
    <a href="{{ route('empresas.create') }}" class="btn btn-primary mb-3">Nueva Empresa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->correo }}</td>
                <td>
                    <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta empresa?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
