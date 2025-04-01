@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card shadow-lg border-0 rounded-xl overflow-hidden mb-8 bg-white">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header flex flex-col sm:flex-row justify-between items-start sm:items-center py-5 px-8 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
                <div class="flex items-center mb-3 sm:mb-0">
                    <i class="ri-service-line text-2xl text-blue-600 mr-3"></i>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Editar Servicio
                    </h2>
                </div>
                <button onclick="history.back()" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                    <i class="ri-arrow-left-line mr-2"></i> Regresar
                </button>
            </div>

            <!-- Cuerpo del formulario -->
            <div class="card-body p-8">
                <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Imagen del Servicio - Componente Mejorado -->
<div class="space-y-4">
    <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Imagen del Servicio</h3>
    
    <div class="mb-4 w-full">
        <!-- Etiqueta mejorada con foco accesible -->
        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
            Imagen del servicio
            <span class="text-xs text-gray-500">(Formatos: PNG, JPG, GIF - Máx. 2MB)</span>
        </label>
        
        <!-- Contenedor de carga de archivos con estados interactivos -->
        <div class="mt-1 relative">
            <!-- Vista previa de la imagen actual -->
            @if($servicio->foto)
                <div class="mb-4 flex items-center space-x-4">
                    <img src="{{ asset('storage/' . $servicio->foto) }}" 
                         alt="Imagen actual del servicio {{ $servicio->nombre }}"
                         class="w-32 h-32 object-cover rounded-md border border-gray-200">
                    <div>
                        <p class="text-sm text-gray-600">Imagen actual</p>
                        <button type="button" 
                                class="mt-2 text-xs text-red-600 hover:text-red-800"
                                wire:click="removeImage"
                                aria-label="Eliminar imagen actual">
                            Eliminar imagen
                        </button>
                    </div>
                </div>
            @endif
            
            <!-- Área de arrastrar y soltar mejorada -->
            <div id="dropzone" 
                 class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center transition-all duration-200 
                        hover:border-blue-400 hover:bg-blue-50
                        focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-400">
                <div class="space-y-2">
                    <!-- Icono dinámico -->
                    <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    
                    <!-- Texto interactivo -->
                    <div class="flex flex-col sm:flex-row justify-center items-center text-sm text-gray-600">
                        <label for="foto" class="relative cursor-pointer font-medium text-blue-600 hover:text-blue-500">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Sube un archivo
                            </span>
                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/png, image/jpeg, image/gif">
                        </label>
                        <span class="sm:ml-1 mt-1 sm:mt-0">o arrastra y suelta aquí</span>
                    </div>
                    
                    <!-- Información de formatos -->
                    <p class="text-xs text-gray-500">
                        Dimensiones recomendadas: 800×600px
                    </p>
                </div>
            </div>
            
            <!-- Mensaje de error (opcional) -->
            @error('foto')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

                    <!-- Sección de Información Básica -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Información Básica</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del servicio</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input type="text" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 pr-10 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="Ej. Camiseta de algodón" required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="ri-product-hunt-line text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Precio -->
                            <div>
                                <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="precio" value="{{ old('precio', $servicio->precio) }}" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01" min="0" required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">MXN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Descripción</h3>
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Detalles del servicio</label>
                            <textarea id="descripcion" name="descripcion" rows="6" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Describe el servicio, procesos, y beneficios" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
                        </div>
                    </div>

                    <!-- Acciones del formulario -->
                    <div class="pt-8">
                        <div class="flex justify-end space-x-4">
                            <button type="reset" class="bg-white py-3 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="ri-eraser-line mr-2"></i> Limpiar
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                <i class="ri-save-2-line mr-2"></i> Actualizar Servicio
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('foto');
        
        if (dropzone && fileInput) {
            // Cambiar estilo al arrastrar sobre el dropzone
            ['dragenter', 'dragover'].forEach(eventName => {
                dropzone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropzone.classList.add('border-blue-500', 'bg-blue-100');
                });
            });
            
            // Restaurar estilo al salir del dropzone
            ['dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropzone.classList.remove('border-blue-500', 'bg-blue-100');
                });
            });
            
            // Manejar archivos soltados
            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    // Opcional: disparar evento change para procesamiento inmediato
                    const event = new Event('change');
                    fileInput.dispatchEvent(event);
                }
            });
        }
    });
</script>
@endsection