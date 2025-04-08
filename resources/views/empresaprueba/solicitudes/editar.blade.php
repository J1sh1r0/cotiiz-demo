@extends('layouts.app')

@section('title', 'Editar Solicitud')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h1 class="text-xl font-semibold text-gray-800">Editar Solicitud</h1>
        </div>

        <div class="p-6">
            <form action="{{ route('empresa_prueba.solicitudes.actualizar', $solicitud->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campos del formulario según el tipo de solicitud -->
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título *</label>
                        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $solicitud->titulo) }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Agrega más campos según el tipo de solicitud -->

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('empresa_prueba.solicitudes') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
