@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card shadow-lg border-0 rounded-xl overflow-hidden mb-8 bg-white">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header flex flex-col sm:flex-row justify-between items-start sm:items-center py-5 px-8 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
                <div class="flex items-center mb-3 sm:mb-0">
                    <i class="ri-box-2-line text-2xl text-blue-600 mr-3"></i>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Nuevo Producto
                    </h2>
                </div>
                <a href="{{ route('productos.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                    <i class="ri-arrow-left-line mr-2"></i> Regresar
                </a>
            </div>
        
            <!-- Cuerpo del formulario -->
            <div class="card-body p-8">
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Sección de Imagen -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Imagen del Producto</h3>
                        <div class="flex flex-col items-start">
                            <div class="mb-4 w-full">
                                <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Subir imagen</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="foto" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Sube un archivo</span>
                                                <input id="foto" name="foto" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">o arrastra y suelta</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 2MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Información Básica -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Información Básica</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del producto</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input type="text" name="nombre" id="nombre" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 pr-10 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="Ej. Camiseta de algodón" required>
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
                                    <input type="number" name="precio" id="precio" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01" min="0" required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">MXN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Descripción -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Descripción</h3>
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Detalles del producto</label>
                            <div class="mt-1">
                                <textarea id="descripcion" name="descripcion" rows="6" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Describe las características, materiales, tallas disponibles, etc." required></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Escribe una descripción detallada que ayude a los clientes a entender el producto.</p>
                        </div>
                    </div>

                    <!-- Acciones del formulario -->
                    <div class="pt-8">
                        <div class="flex justify-end space-x-4">
                            <button type="reset" class="bg-white py-3 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="ri-eraser-line mr-2"></i> Limpiar
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                <i class="ri-save-2-line mr-2"></i> Guardar Producto
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">