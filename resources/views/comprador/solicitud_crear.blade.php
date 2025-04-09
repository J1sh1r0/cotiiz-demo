@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Tarjeta contenedora -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Encabezado -->
<div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="flex items-center justify-between">
        <!-- Contenido a la izquierda -->
        <div class="flex items-center">
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
            <div id="formulario_solicitud" class="hidden">
                <form action="{{ route('comprador.solicitudes.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Campo oculto para el tipo de solicitud -->
                    <input type="hidden" id="tipo" name="tipo">

                    <!-- Sección común -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Información básica</h3>
                        
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="titulo" class="block text-sm font-medium text-gray-700">Título de la solicitud</label>
                                <input type="text" id="titulo" name="titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción detallada</label>
                                <textarea id="descripcion" name="descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>
                            
                            <div>
                                <label for="link_drive" class="block text-sm font-medium text-gray-700">Enlace a documentos (Google Drive u otro)</label>
                                <input type="text" id="link_drive" name="link_drive" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="archivo" class="block text-sm font-medium text-gray-700">Adjuntar archivos</label>
                                <input type="file" id="archivo" name="archivo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                    </div>

                    <!-- Campos específicos para Producto -->
                    <div id="producto_fields" class="bg-gray-50 p-4 rounded-lg hidden">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Detalles del producto</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del producto</label>
                                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                                <input type="text" id="modelo" name="modelo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                                <input type="text" id="marca" name="marca" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad requerida</label>
                                <input type="number" id="cantidad" name="cantidad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="presupuesto" class="block text-sm font-medium text-gray-700">Presupuesto aproximado</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="text" id="presupuesto" name="presupuesto" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            
                            <div>
                                <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Urgencia</label>
                                <select id="tipo_servicio" name="tipo_servicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">-- Selecciona --</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="normal">Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Campos específicos para Servicio -->
                    <div id="servicio_fields" class="bg-gray-50 p-4 rounded-lg hidden">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Detalles del servicio</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="tipo_solicitudServicio" class="block text-sm font-medium text-gray-700">Tipo de servicio</label>
                                <input type="text" id="tipo_solicitudServicio" name="tipo_solicitudServicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción del servicio</label>
                                <input type="text" id="descripcion_servicio" name="descripcion_servicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="presupuesto_servicio" class="block text-sm font-medium text-gray-700">Presupuesto aproximado</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="text" id="presupuesto_servicio" name="presupuesto_servicio" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            
                            <div>
                                <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Urgencia</label>
                                <select id="tipo_servicio" name="tipo_servicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">-- Selecciona --</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="normal">Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Campos específicos para Profesionista -->
                    <div id="proveedor_fields" class="bg-gray-50 p-4 rounded-lg hidden">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Detalles del profesionista</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="trabajo" class="block text-sm font-medium text-gray-700">Trabajo a realizar</label>
                                <input type="text" id="trabajo" name="trabajo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="detalles" class="block text-sm font-medium text-gray-700">Detalles del trabajo</label>
                                <input type="text" id="detalles" name="detalles" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="conocimientos" class="block text-sm font-medium text-gray-700">Conocimientos requeridos</label>
                                <input type="text" id="conocimientos" name="conocimientos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="cursos" class="block text-sm font-medium text-gray-700">Certificaciones/Cursos</label>
                                <input type="text" id="cursos" name="cursos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="tiempo" class="block text-sm font-medium text-gray-700">Tiempo estimado</label>
                                <input type="text" id="tiempo" name="tiempo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            
                            <div>
                                <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Urgencia</label>
                                <select id="tipo_servicio" name="tipo_servicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">-- Selecciona --</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="normal">Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-save mr-2"></i> Guardar Solicitud
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de éxito -->
    <div id="modal_exito" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-sm w-full">
            <div class="bg-white p-6">
                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mx-auto">
                    <i class="fas fa-check text-green-600"></i>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">¡Solicitud creada!</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">La solicitud fue registrada exitosamente. Te notificaremos cuando recibamos ofertas.</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="cerrar_modal" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar el formulario -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoSolicitud = document.getElementById('tipo_solicitud');
    const formulario = document.getElementById('formulario_solicitud');
    const mensajeEjemplo = document.getElementById('mensaje_ejemplo');
    const productoFields = document.getElementById('producto_fields');
    const servicioFields = document.getElementById('servicio_fields');
    const proveedorFields = document.getElementById('proveedor_fields');
    const tipoHidden = document.getElementById('tipo');
    const modalExito = document.getElementById('modal_exito');
    const cerrarModal = document.getElementById('cerrar_modal');

    // Mostrar campos según tipo de solicitud
    tipoSolicitud.addEventListener('change', function() {
        const tipo = this.value;
        
        if (tipo) {
            formulario.classList.remove('hidden');
            mensajeEjemplo.classList.remove('hidden');
            tipoHidden.value = tipo;
            
            // Ocultar todos los campos específicos primero
            productoFields.classList.add('hidden');
            servicioFields.classList.add('hidden');
            proveedorFields.classList.add('hidden');
            
            // Mostrar solo los campos relevantes
            if (tipo === 'producto') {
                productoFields.classList.remove('hidden');
            } else if (tipo === 'servicio') {
                servicioFields.classList.remove('hidden');
            } else if (tipo === 'proveedor') {
                proveedorFields.classList.remove('hidden');
            }
        } else {
            formulario.classList.add('hidden');
            mensajeEjemplo.classList.add('hidden');
        }
    });

    // Manejar el modal de éxito
    if (cerrarModal) {
        cerrarModal.addEventListener('click', function() {
            modalExito.classList.add('hidden');
        });
    }

    // Aquí puedes agregar más lógica para el envío del formulario
    // y mostrar el modal de éxito cuando sea exitoso
});
</script>
<!-- Incluir el script -->
<script src="{{ asset('js/solicitudes.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection