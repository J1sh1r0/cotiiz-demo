@extends('layouts.app')

@section('title', 'Seleccionar Tipo de Solicitud')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Crear Nueva Solicitud</h1>
        <p class="text-gray-600 mb-6">Selecciona el tipo de solicitud que deseas crear:</p>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ route('empresa_prueba.solicitudes.crear', 'producto') }}"
               class="p-4 border border-gray-200 rounded-lg hover:bg-blue-50 transition">
               <h3 class="font-medium text-lg text-blue-600">Producto</h3>
               <p class="text-gray-500 text-sm">Solicitud de compra de productos</p>
            </a>

            <a href="{{ route('empresa_prueba.solicitudes.crear', 'servicio') }}"
               class="p-4 border border-gray-200 rounded-lg hover:bg-green-50 transition">
               <h3 class="font-medium text-lg text-green-600">Servicio</h3>
               <p class="text-gray-500 text-sm">Solicitud de contratación de servicios</p>
            </a>

            <a href="{{ route('empresa_prueba.solicitudes.crear', 'profesionista') }}"
               class="p-4 border border-gray-200 rounded-lg hover:bg-purple-50 transition">
               <h3 class="font-medium text-lg text-purple-600">Profesionista</h3>
               <p class="text-gray-500 text-sm">Solicitud de contratación de profesionales</p>
            </a>
        </div>

        <div class="mt-6">
            <a href="{{ route('empresa_prueba.dashboard') }}"
               class="text-blue-500 hover:text-blue-700 flex items-center">
               <i class="fas fa-arrow-left mr-2"></i> Volver al listado
            </a>
        </div>
    </div>
</div>
@endsection
