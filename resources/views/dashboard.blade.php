@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">👋 Bienvenido a <span class="text-blue-600">Cotiiz Demo</span></h2>
        <p class="text-gray-600">Explora las funcionalidades de la plataforma creando empresas, proveedores y solicitudes.</p>
    </div>

    <div class="grid grid-cols-3 gap-6 mt-6">
        <!-- Tarjeta Empresas -->
        <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
            <div class="text-blue-600 text-3xl">🏢</div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Empresas</h3>
                <p class="text-2xl font-bold text-gray-600">{{ $empresas ?? 0 }}</p>
            </div>
        </div>

        <!-- Tarjeta Proveedores -->
        <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
            <div class="text-yellow-500 text-3xl">📦</div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Proveedores</h3>
                <p class="text-2xl font-bold text-gray-600">{{ $proveedores ?? 0 }}</p>
            </div>
        </div>

        <!-- Tarjeta Solicitudes -->
        <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
            <div class="text-red-500 text-3xl">📝</div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Solicitudes</h3>
                <p class="text-2xl font-bold text-gray-600">{{ $solicitudes ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
