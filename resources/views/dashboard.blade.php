@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">👋 Bienvenido a <span class="text-blue-600">Cotiiz Demo</span></h2>
        <p class="text-gray-600">Explora las funcionalidades de la plataforma desde la perspectiva de un Comprador, Proveedor o Profesional.</p>
    </div>

    <!-- Sección de Selección de Perfil -->
    <div class="grid grid-cols-3 gap-6 mt-6">
        <!-- Tarjeta de Comprador -->
        <a href="{{ route('comprador.solicitudes') }}" class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center space-y-3 hover:bg-gray-100 transition">
            <div class="text-blue-600 text-4xl">🛒</div>
            <h3 class="text-lg font-semibold text-gray-800">Comprador / Empresa</h3>
            <p class="text-gray-600 text-center">Gestiona solicitudes, subcuentas y usuarios.</p>
        </a>

        <!-- Tarjeta de Proveedor -->
        <a href="{{ route('proveedor.solicitudes') }}" class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center space-y-3 hover:bg-gray-100 transition">
            <div class="text-yellow-500 text-4xl">📦</div>
            <h3 class="text-lg font-semibold text-gray-800">Proveedor</h3>
            <p class="text-gray-600 text-center">Responde a solicitudes y administra tu catálogo.</p>
        </a>

        <!-- Tarjeta de Profesional -->
        <a href="{{ route('profesional.servicios') }}" class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center space-y-3 hover:bg-gray-100 transition">
            <div class="text-green-500 text-4xl">👨‍🔧</div>
            <h3 class="text-lg font-semibold text-gray-800">Profesionales Especializados</h3>
            <p class="text-gray-600 text-center">Explora servicios técnicos y más.</p>
        </a>
    </div>

    <!-- Sección de Métricas -->
    <div class="grid grid-cols-3 gap-6 mt-8">
        <!-- Empresas -->
        <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
            <div class="text-blue-600 text-3xl">🏢</div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Empresas</h3>
                <p class="text-2xl font-bold text-gray-600">{{ $empresas ?? 0 }}</p>
            </div>
        </div>

        <!-- Proveedores -->
        <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
            <div class="text-yellow-500 text-3xl">📦</div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Proveedores</h3>
                <p class="text-2xl font-bold text-gray-600">{{ $proveedores ?? 0 }}</p>
            </div>
        </div>

        <!-- Solicitudes -->
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
