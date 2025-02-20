@extends('layouts.app')

@section('title', 'Nueva Solicitud')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Registrar Nueva Solicitud</h1>

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

        <form action="{{ route('solicitudes.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Proveedor -->
            <div>
                <label for="proveedor_id" class="block text-gray-700 font-semibold">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled selected>Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Empresa -->
            <div>
                <label for="empresa_id" class="block text-gray-700 font-semibold">Empresa</label>
                <select name="empresa_id" id="empresa_id" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled selected>Seleccione una empresa</option>
                    @foreach($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Servicio Técnico -->
            <div>
                <label for="servicio_id" class="block text-gray-700 font-semibold">Servicio Técnico</label>
                <select name="servicio_id" id="servicio_id" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled selected>Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-gray-700 font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
            </div>

            <!-- Estado -->
            <div>
                <label for="estado" class="block text-gray-700 font-semibold">Estado</label>
                <select name="estado" id="estado" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="pendiente">Pendiente</option>
                    <option value="aprobado">Aprobado</option>
                    <option value="rechazado">Rechazado</option>
                </select>
            </div>

            <!-- Botón -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">
                    Guardar Solicitud
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
