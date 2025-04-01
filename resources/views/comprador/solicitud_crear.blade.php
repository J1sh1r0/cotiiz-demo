@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Crear Solicitud</h1>

        <!-- Selección de tipo de solicitud -->
        <label for="tipo_solicitud" class="block font-semibold mb-2">Selecciona el tipo de solicitud:</label>
        <select name="tipo" id="tipo_solicitud" class="border p-2 w-full mb-4">
            <option value="">-- Selecciona --</option>
            <option value="producto">Producto</option>
            <option value="servicio">Servicio</option>
            <option value="proveedor">Profesionista</option>
        </select>

        <!-- Mensaje de ejemplo -->
        <div id="mensaje_ejemplo" class="hidden text-blue-600 font-semibold mb-4">
            Este es un ejemplo de cómo se llenaría la solicitud.
        </div>

        <!-- Formulario de solicitud -->
        <div id="formulario_solicitud" class="hidden bg-white p-4 rounded-lg shadow-md">
            <form action="{{ route('comprador.solicitudes.store') }}" method="POST">
                @csrf
                <!-- Campo oculto para el tipo de solicitud -->
                <input type="hidden" id="tipo" name="tipo">

                <label class="block font-semibold">Título de Solicitud</label>
                <input type="text" id="titulo" name="titulo" class="border p-2 w-full mb-3">

                <div class="grid grid-cols-3 gap-4" id="producto_fields">
                    <div>
                        <label class="block font-semibold">Nombre del producto / servicio</label>
                        <input type="text" id="nombre" name="nombre" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Modelo / Tipo</label>
                        <input type="text" id="modelo" name="modelo" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Marca</label>
                        <input type="text" id="marca" name="marca" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Cantidad</label>
                        <input type="text" id="cantidad" name="cantidad" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Presupuesto aproximado para invertir</label>
                        <input type="text" id="presupuesto" name="presupuesto" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label for="tipo_servicio" class="block font-semibold">Tipo de servicio:</label>
                        <select id="tipo_servicio" class="border p-2 w-full mb-3">
                            <option value="">-- Selecciona --</option>
                            <option value="urgente">Urgente</option>
                            <option value="normal">Normal</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4" id="servicio_fields">
                    <div>
                        <label class="block font-semibold">Tipo de servicio a resolver</label>
                        <input type="text" id="tipo_solicitudServicio" name="tipo_solicitudServicio"
                            class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Descripción del servicio</label>
                        <input type="text" id="descripcion_servicio" name="descripcion_servicio"
                            class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Presupuesto aproximado para invertir</label>
                        <input type="text" id="presupuesto_servicio" name="presupuesto_servicio"
                            class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label for="tipo_servicio" class="block font-semibold">Tipo de servicio:</label>
                        <select id="tipo_servicio" class="border p-2 w-full mb-3">
                            <option value="">-- Selecciona --</option>
                            <option value="urgente">Urgente</option>
                            <option value="normal">Normal</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4" id="proveedor_fields">
                    <div>
                        <label class="block font-semibold">Trabajo a realizar</label>
                        <input type="text" id="trabajo" name="trabajo" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Detalles del trabajo</label>
                        <input type="text" id="detalles" name="detalles" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Conocimientos deseados para el trabajo</label>
                        <input type="text" id="conocimientos" name="conocimientos" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Certificaciones / Cursos requeridos</label>
                        <input type="text" id="cursos" name="cursos" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label class="block font-semibold">Tiempo para implementar el trabajo</label>
                        <input type="text" id="tiempo" name="tiempo" class="border p-2 w-full mb-3">
                    </div>
                    <div>
                        <label for="tipo_servicio" class="block font-semibold">Tipo de servicio:</label>
                        <select id="tipo_servicio" class="border p-2 w-full mb-3">
                            <option value="">-- Selecciona --</option>
                            <option value="urgente">Urgente</option>
                            <option value="normal">Normal</option>
                        </select>
                    </div>
                </div>

                <label class="block font-semibold">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="border p-2 w-full mb-3"></textarea>

                <label class="block font-semibold">Link Drive</label>
                <input type="text" id="link_drive" name="link_drive" class="border p-2 w-full mb-3">

                <label class="block font-semibold">Adjunta informacion importante</label>
                <input type="text" id="archivo" class="border p-2 w-full mb-3">

                <form action="{{ route('guardar.solicitud') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded mt-3"
                        id="guardar_btn">Guardar</button>
                </form>
                <!-- Modal de éxito (inicialmente oculto) -->
                <div id="modal_exito"
                    class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm w-full">
                        <h2 class="text-xl font-semibold text-green-500">¡Éxito!</h2>
                        <p class="text-lg text-gray-700">La solicitud fue creada con éxito. 🎉</p>
                        <button id="cerrar_modal" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Cerrar</button>
                    </div>
                </div>
        </div>

        <!-- Incluir el script -->
        <script src="{{ asset('js/solicitudes.js') }}"></script>
    @endsection
