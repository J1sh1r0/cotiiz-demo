@extends('layouts.app')

@section('title', 'Crear Solicitud de ' . ucfirst($tipo))

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Encabezado con gradiente -->
        <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-file-alt text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">Nueva Solicitud: {{ ucfirst($tipo) }}</h1>
                    </div>
                </div>
                <button onclick="history.back()" 
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                    <i class="ri-arrow-left-line mr-2"></i> Regresar
                </button>
            </div>
        </div>

        <!-- Formulario principal -->
        <form id="formSolicitud" action="{{ route('empresa_prueba.solicitudes.guardar', $tipo) }}" method="POST" class="p-6">
            @csrf

            <!-- Sección de campos comunes -->
            <div class="space-y-6 mb-8">
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                    <input type="text" name="titulo" id="titulo" required
                           class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4"
                              class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>

            <!-- Sección de campos específicos -->
            <div class="mb-8">
                @if($tipo === 'producto')
                    @include('empresaprueba.solicitudes.partials.campos-producto')
                @elseif($tipo === 'servicio')
                    @include('empresaprueba.solicitudes.partials.campos-servicio')
                @elseif($tipo === 'profesionista')
                    @include('empresaprueba.solicitudes.partials.campos-profesionista')
                @endif
            </div>

            <!-- Pie de formulario con botones - Versión Responsive -->
<div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gray-200">
    <!-- Botón Rellenar datos (siempre visible) -->
    <button type="button" onclick="rellenarDatosPrueba()"
            class="w-full sm:w-auto flex items-center justify-center px-4 py-2 bg-purple-100 text-purple-800 rounded-lg border border-purple-300 hover:bg-purple-200 transition-colors">
        <i class="ri-magic-line mr-2"></i> 
        <span class="whitespace-nowrap">Rellenar con datos de prueba</span>
    </button>

    <!-- Contenedor de botones secundarios (se ajusta en móvil) -->
    <div class="w-full sm:w-auto flex flex-col-reverse sm:flex-row gap-3 sm:space-x-3">
        <!-- Botón Cancelar -->
        <a href="{{ route('empresa_prueba.solicitudes') }}"
           class="w-full sm:w-auto px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors text-center">
            Cancelar
        </a>
        
        <!-- Botón Guardar -->
        <button type="submit"
                class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center space-x-2">
            <i class="fa fa-save"></i> 
            <span class="whitespace-nowrap">Guardar Solicitud</span>
        </button>
    </div>
</div>
        </form>
    </div>
</div>

<script>
function rellenarDatosPrueba() {
    fetch(`/empresa-prueba/solicitudes/{{ $tipo }}/rellenar-datos-prueba`)
        .then(response => response.json())
        .then(data => {
            // Campos comunes
            document.getElementById('titulo').value = data.titulo || '';
            document.getElementById('descripcion').value = data.descripcion || '';

            // Campos específicos
            @if($tipo === 'producto')
                if (data.modelo) document.querySelector('[name="modelo"]').value = data.modelo;
                if (data.nombre) document.querySelector('[name="nombre"]').value = data.nombre;
                if (data.marca) document.querySelector('[name="marca"]').value = data.marca;
                if (data.cantidad) document.querySelector('[name="cantidad"]').value = data.cantidad;
                if (data.presupuesto) document.querySelector('[name="presupuesto"]').value = data.presupuesto;
                if (data.link_drive) document.querySelector('[name="link_drive"]').value = data.link_drive;
            @elseif($tipo === 'servicio')
                if (data.tipo_solicitudServicio) document.querySelector('[name="tipo_solicitudServicio"]').value = data.tipo_solicitudServicio;
                if (data.descripcion_servicio) document.querySelector('[name="descripcion_servicio"]').value = data.descripcion_servicio;
                if (data.presupuesto_servicio) document.querySelector('[name="presupuesto_servicio"]').value = data.presupuesto_servicio;
                if (data.link_drive) document.querySelector('[name="link_drive"]').value = data.link_drive;
            @elseif($tipo === 'profesionista')
                if (data.trabajo) document.querySelector('[name="trabajo"]').value = data.trabajo;
                if (data.detalles) document.querySelector('[name="detalles"]').value = data.detalles;
                if (data.conocimientos) document.querySelector('[name="conocimientos"]').value = data.conocimientos;
                if (data.cursos) document.querySelector('[name="cursos"]').value = data.cursos;
                if (data.tiempo) document.querySelector('[name="tiempo"]').value = data.tiempo;
                if (data.link_drive) document.querySelector('[name="link_drive"]').value = data.link_drive;
            @endif

            alert('Datos de prueba cargados. Puedes modificarlos antes de enviar.');
        })
        .catch(error => console.error('Error:', error));
}
</script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection