@extends('layouts.app')

@section('title', 'Editar Solicitud')

@section('content')
    <div class="w-full px-4 md:px-6 py-6">
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
                <!-- Título con icono más compacto -->
                <div class="flex items-center gap-2">
                    <div class="p-1.5 bg-blue-100 rounded-lg text-blue-600">
                        <i class="ri-edit-2-line text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800">Editar Solicitud</h1>
                    </div>
                </div>
                
                <!-- Botón de regreso más compacto -->
                <a href="{{ route('empresa_prueba.solicitudes') }}" 
                   class="flex items-center px-3 py-2 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium text-gray-700 hover:bg-gray-50 hover:border-blue-200 hover:text-blue-600 transition-all duration-200">
                    <i class="ri-arrow-left-line mr-1.5"></i> Regresar
                </a>
            </div>
        </div>

        <!-- Contenedor principal del formulario -->
        <div class="w-full bg-white rounded-xl shadow-md overflow-hidden mb-6">
            <form action="{{ route('empresa_prueba.solicitudes.actualizar', $solicitud->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <!-- Campos del formulario -->
                <div class="grid grid-cols-1 gap-6">
                    <!-- Campo Título -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $solicitud->titulo) }}"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        @error('titulo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Descripción -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                                  class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">{{ old('descripcion', $solicitud->descripcion) }}</textarea>
                        @error('descripcion')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Aquí puedes agregar más campos específicos según el tipo de solicitud -->
                    <!-- Ejemplo de campo adicional condicional -->
                    @if($solicitud->tipo === 'producto')
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <label for="cantidad" class="block text-sm font-medium text-gray-700 mb-2">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $solicitud->cantidad) }}"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                    </div>
                    @endif

                    <!-- Botones de acción -->
                    <div class="flex justify-end space-x-3">
                        <button type="submit"
                                class="flex items-center px-4 py-2.5 bg-blue-600 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <i class="ri-save-line mr-2"></i> Guardar 
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection