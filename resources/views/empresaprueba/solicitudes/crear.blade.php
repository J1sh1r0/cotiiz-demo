@extends('layouts.app')

@section('title', 'Crear Solicitud de ' . ucfirst($tipo))

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Nueva Solicitud: {{ ucfirst($tipo) }}</h1>

        <form id="formSolicitud" action="{{ route('empresa_prueba.solicitudes.guardar', $tipo) }}" method="POST">
            @csrf

            <!-- Campos comunes -->
            <div class="grid grid-cols-1 gap-6 mb-6">
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título *</label>
                    <input type="text" name="titulo" id="titulo" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>

            <!-- Campos específicos por tipo -->
            @if($tipo === 'producto')
                @include('empresaprueba.solicitudes.partials.campos-producto')
            @elseif($tipo === 'servicio')
                @include('empresaprueba.solicitudes.partials.campos-servicio')
            @elseif($tipo === 'profesionista')
                @include('empresaprueba.solicitudes.partials.campos-profesionista')
            @endif

            <div class="flex justify-between pt-6 border-t">
                <button type="button" onclick="rellenarDatosPrueba()"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Rellenar con datos de prueba
                </button>

                <div class="space-x-2">
                    <a href="{{ route('empresa_prueba.solicitudes') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Guardar Solicitud
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
            // Rellenar campos comunes
            document.getElementById('titulo').value = data.titulo || '';
            document.getElementById('descripcion').value = data.descripcion || '';

            // Rellenar campos específicos
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
            if (data.presupuesto_servicio) document.querySelector('[name= "presupuesto_servicio"]').value = data.presupuesto_servicio;
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
        });
}
</script>
@endsection
