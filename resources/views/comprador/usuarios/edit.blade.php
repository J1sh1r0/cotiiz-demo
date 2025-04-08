@extends('layouts.app')

@section('content')
<div class="w-full px-4 md:px-6 py-6">
    <!-- Encabezado mejorado -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
            <div class="flex items-center gap-2">
                <div class="p-1.5 bg-blue-100 rounded-lg text-blue-600">
                    <i class="ri-user-settings-line text-lg"></i>
                </div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Editar Usuario</h1>
            </div>
            
            <a href="{{ route('comprador.usuarios') }}" 
               class="flex items-center px-3 py-2 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium text-gray-700 hover:bg-gray-50 hover:border-blue-200 hover:text-blue-600 transition-all duration-200">
                <i class="ri-arrow-left-line mr-1.5"></i> Regresar
            </a>
        </div>
    </div>

    <!-- Formulario mejorado -->
    <div class="w-full bg-white rounded-xl shadow-md overflow-hidden mb-6">
        <form action="{{ route('comprador.usuarios.update', $usuario->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <!-- Campo Nombre -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $usuario->name) }}"
                           class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $usuario->email) }}"
                           class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Teléfono -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $usuario->phone) }}"
                           class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           required>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Agrega más campos según necesites -->
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-3 mt-2">
                <button type="submit"
                        class="flex items-center px-4 py-2.5 bg-blue-600 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <i class="ri-save-line mr-2"></i> Actualizar Usuario
                </button>
            </div>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection