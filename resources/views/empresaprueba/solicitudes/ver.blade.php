@extends('layouts.app')

@section('title', 'Detalles de Solicitud')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h1 class="text-xl font-semibold text-gray-800">Detalles de Solicitud</h1>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Información Básica</h3>
                    <dl class="mt-2 space-y-2">
                        <div class="border-t border-gray-200 pt-2">
                            <dt class="text-sm font-medium text-gray-500">Título</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->titulo }}</dd>
                        </div>
                        <div class="border-t border-gray-200 pt-2">
                            <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->descripcion }}</dd>
                        </div>
                        <!-- Agrega más campos según necesites -->
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Estado</h3>
                    <div class="mt-2">
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $solicitud->estado == 'pendiente'
                                ? 'bg-yellow-100 text-yellow-800'
                                : ($solicitud->estado == 'aprobado'
                                    ? 'bg-green-100 text-green-800'
                                    : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($solicitud->estado) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('empresa_prueba.solicitudes') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                    Volver al listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
