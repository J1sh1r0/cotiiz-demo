@extends('layouts.app')

@section('title', 'Detalles de Solicitud')

@section('content')
    <div class="w-full px-4 md:px-6 py-6">
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <!-- Título con icono -->
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                        <i class="ri-file-list-2-line text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Detalles de la Solicitud</h1>
                    </div>
                </div>
                
                <!-- Botón de regreso mejorado -->
                <a href="{{ route('empresa_prueba.solicitudes') }}" 
                   class="flex items-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-blue-200 hover:text-blue-600 transition-all duration-200">
                    <i class="ri-arrow-left-line mr-2"></i> Regresar
                </a>
            </div>
        </div>

        <!-- Contenedor principal que ocupa todo el ancho -->
        <div class="w-full bg-white rounded-xl shadow-md overflow-hidden mb-6">
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Información Básica -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Información Básica</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-700">Título:</span>
                                <span class="text-gray-600 text-right">{{ $solicitud->titulo }}</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-700">Estado:</span>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($solicitud->estado == 'aprobado' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Fecha:</span>
                                <span class="text-gray-600">{{ $solicitud->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Descripción</h2>
                        <p class="text-gray-600">{{ $solicitud->descripcion }}</p>
                    </div>
                </div>

                <!-- Sección para campos adicionales -->
                @if(isset($solicitud->campos_adicionales) && count($solicitud->campos_adicionales) > 0)
                <div class="border-t pt-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Información Adicional</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($solicitud->campos_adicionales as $campo => $valor)
                            <div class="bg-white p-3 rounded-lg shadow-sm">
                                <p class="font-medium text-gray-700 mb-1">{{ ucfirst(str_replace('_', ' ', $campo)) }}</p>
                                <p class="text-gray-600">{{ $valor }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection