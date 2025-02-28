@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Crear Solicitud</h1>

    <!-- Selección de tipo de solicitud -->
    <label for="tipo_solicitud" class="block font-semibold mb-2">Selecciona el tipo de solicitud:</label>
    <select id="tipo_solicitud" class="border p-2 w-full mb-4">
        <option value="">-- Selecciona --</option>
        <option value="producto">Producto</option>
        <option value="servicio">Servicio</option>
        <option value="proveedor">Proveedor</option>
    </select>

    <!-- Mensaje de ejemplo -->
    <div id="mensaje_ejemplo" class="hidden text-blue-600 font-semibold mb-4">
        Este es un ejemplo de cómo se llenaría la solicitud.
    </div>

    <!-- Formulario de solicitud -->
    <div id="formulario_solicitud" class="hidden bg-white p-4 rounded-lg shadow-md">
        <label class="block font-semibold">Título de Solicitud</label>
        <input type="text" id="titulo" class="border p-2 w-full mb-3" readonly>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block font-semibold">Nombre del producto / servicio</label>
                <input type="text" id="nombre" class="border p-2 w-full mb-3" readonly>
            </div>
            <div>
                <label class="block font-semibold">Modelo / Tipo</label>
                <input type="text" id="modelo" class="border p-2 w-full mb-3" readonly>
            </div>
            <div>
                <label class="block font-semibold">Marca</label>
                <input type="text" id="marca" class="border p-2 w-full mb-3" readonly>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Cantidad</label>
                <input type="text" id="cantidad" class="border p-2 w-full mb-3" readonly>
            </div>
            <div>
                <label class="block font-semibold">Presupuesto Aproximado</label>
                <input type="text" id="presupuesto" class="border p-2 w-full mb-3" readonly>
            </div>
        </div>

        <label class="block font-semibold">Descripción</label>
        <textarea id="descripcion" class="border p-2 w-full mb-3" readonly></textarea>

        <label class="block font-semibold">Link Drive</label>
        <input type="text" id="link_drive" class="border p-2 w-full mb-3" readonly>

        <button class="bg-gray-500 text-white px-4 py-2 rounded mt-3" disabled>Guardar</button>
    </div>
</div>

<!-- Incluir el script -->
<script src="{{ asset('js/solicitudes.js') }}"></script>
@endsection
