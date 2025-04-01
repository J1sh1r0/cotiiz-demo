@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

    <form action="{{ route('comprador.usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Nombre</label>
            <input type="text" name="name" value="{{ $usuario->name }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Correo Electrónico</label>
            <input type="email" name="email" value="{{ $usuario->email }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Teléfono</label>
            <input type="tel" name="phone" value="{{ $usuario->phone }}" class="border p-2 w-full" required>
        </div>

        <!-- Agrega más campos según necesites -->

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Actualizar Usuario
            </button>
            <a href="{{ route('comprador.usuarios') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
