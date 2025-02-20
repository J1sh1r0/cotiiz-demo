@extends('layouts.app')

@section('title', 'Nuevo Proveedor')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Registrar Nuevo Proveedor</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong>¡Error!</strong> Por favor, corrige los siguientes problemas:
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('proveedores.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-gray-700 font-semibold">Nombre del Proveedor</label>
                <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Correo -->
            <div>
                <label for="correo" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Teléfono -->
            <div>
                <label for="telefono" class="block text-gray-700 font-semibold">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Botón -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">
                    Guardar Proveedor
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

