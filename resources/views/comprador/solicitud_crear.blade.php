@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Encabezado -->
<div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="flex flex-col md:flex-row items-center justify-between">
        <!-- Contenido a la izquierda -->
        <div class="flex items-center mb-4 md:mb-0">
            <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                <i class="fas fa-file-alt text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Crear Nueva Solicitud</h1>
                <p class="text-sm text-gray-600 mt-1">Complete los campos requeridos según el tipo de solicitud</p>
            </div>
        </div>
        
        <!-- Botón Regresar alineado a la derecha -->
        <button onclick="history.back()" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
            <i class="ri-arrow-left-line mr-2"></i> Regresar
        </button>
    </div>
</div>

        <!-- Contenido del formulario -->
        <div class="p-6">
            <!-- Selección de tipo de solicitud -->
            <div class="mb-6">
                <label for="tipo_solicitud" class="block text-sm font-medium text-gray-700 mb-2">Tipo de solicitud</label>
                <select name="tipo" id="tipo_solicitud" class="block w-full pl-3 pr-10 py-3 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm">
                    <option value="">-- Selecciona una opción --</option>
                    <option value="producto">Producto</option>
                    <option value="servicio">Servicio</option>
                    <option value="proveedor">Profesionista</option>
                </select>
            </div>

            <!-- Mensaje de ejemplo -->
            <div id="mensaje_ejemplo" class="hidden p-4 mb-6 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">Este es un ejemplo de cómo se llenaría la solicitud para el tipo seleccionado.</p>
                    </div>
                </div>
            </div>

            <!-- Formulario de solicitud -->
            <div id="formulario_solicitud" class="hidden bg-white p-4 rounded-lg shadow-md">
                <form action="{{ route('comprador.solicitudes.store') }}" method="POST">
                    @csrf
                    <!-- Campo oculto para el tipo de solicitud -->
                    <input type="hidden" id="tipo" name="tipo">

                    <label class="block font-semibold">Título de Solicitud</label>
                    <input type="text" id="titulo" name="titulo" class="border p-2 w-full mb-3">

                    <!-- Campos dinámicos dependiendo del tipo de solicitud -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="producto_fields">
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

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="servicio_fields">
                        <div>
                            <label class="block font-semibold">Tipo de servicio a resolver</label>
                            <input type="text" id="tipo_solicitudServicio" name="tipo_solicitudServicio" class="border p-2 w-full mb-3">
                        </div>
                        <div>
                            <label class="block font-semibold">Descripción del servicio</label>
                            <input type="text" id="descripcion_servicio" name="descripcion_servicio" class="border p-2 w-full mb-3">
                        </div>
                        <div>
                            <label class="block font-semibold">Presupuesto aproximado para invertir</label>
                            <input type="text" id="presupuesto_servicio" name="presupuesto_servicio" class="border p-2 w-full mb-3">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="proveedor_fields">
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
                    </div>

                    <label class="block font-semibold">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="border p-2 w-full mb-3"></textarea>

                    <label class="block font-semibold">Link Drive</label>
                    <input type="text" id="link_drive" name="link_drive" class="border p-2 w-full mb-3">

                    <label class="block font-semibold">Adjunta informacion importante</label>
                    <input type="text" id="archivo" class="border p-2 w-full mb-3">

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3 flex justify-center items-center space-x-2" id="guardar_btn">
                        <i class="fa fa-save"></i><span>Guardar</span>
                    </button>                                     
                </form>
            </div>
        </div>
    </div>

        <!-- Incluir el script -->
        <script src="{{ asset('js/solicitudes.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @endsection
