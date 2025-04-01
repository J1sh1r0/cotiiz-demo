@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Encabezado del Chat -->
    <div class="bg-white rounded-lg shadow-sm mb-4 p-6 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Solicitud de prueba</h1>
            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                Pendiente
            </span>
        </div>
        <button onclick="openModal()" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">Ver Detalles</button>
    </div>

    <!-- Área de Mensajes -->
    <div class="bg-gray-100 rounded-lg shadow-sm p-6 h-96 overflow-y-auto space-y-4">
        <!-- Mensaje de prueba 1 -->
        <div class="flex justify-start">
            <div class="bg-white p-3 rounded-lg shadow-md max-w-xs">
                <p class="text-sm text-gray-700">Este es un mensaje de prueba.</p>
                <span class="text-xs text-gray-400 block mt-2">12:00</span>
            </div>
        </div>
        <!-- Mensaje de prueba 2 -->
        <div class="flex justify-end">
            <div class="bg-white p-3 rounded-lg shadow-md max-w-xs">
                <p class="text-sm text-gray-700">Otro mensaje de prueba.</p>
                <span class="text-xs text-gray-400 block mt-2">12:30</span>
            </div>
        </div>
    </div>

    <!-- Entrada de Mensaje -->
    <form action="#" method="POST" class="mt-4">
        @csrf
        <div class="flex items-center space-x-2">
            <input type="text" name="mensaje" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Escribe un mensaje..." required>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                <i class="ri-send-plane-2-line"></i>
            </button>
        </div>
    </form>
</div>

<!-- Modal de Detalles -->
<div id="modalDetalles" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Detalles de la Solicitud</h2>
        <p><strong>Proveedor:</strong> Proveedor de prueba</p>
        <p><strong>Título:</strong> Título de prueba</p>
        <p><strong>Descripción:</strong> Descripción de prueba de la solicitud.</p>
        <p><strong>Archivo adjunto:</strong> No hay archivo adjunto.</p>
        <div class="mt-4 flex justify-end">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Cerrar</button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modalDetalles').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalDetalles').classList.add('hidden');
    }
</script>
@endsection
