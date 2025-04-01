@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Tarjeta contenedora con sombra y bordes suavizados -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Encabezado azul claro con borde inferior -->
            <div class="bg-blue-100 px-8 py-6 border-b border-blue-200">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $producto->nombre }}</h1>
                    <a href="{{ route('productos.index') }}" 
                       class="mt-3 md:mt-0 px-5 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition duration-300 flex items-center border border-blue-200">
                        <i class="ri-arrow-left-line mr-2"></i>
                        Regresar
                    </a>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Sección de imagen -->
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $producto->foto) }}" 
                             alt="{{ $producto->nombre }}" 
                             class="w-full h-80 md:h-96 object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-lg opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-4">
                            <span class="text-white font-medium">Imagen del producto</span>
                        </div>
                    </div>

                    <!-- Sección de detalles -->
                    <div class="space-y-6">
                        <!-- Precio con estilo destacado -->
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <h3 class="text-sm font-semibold text-blue-800 uppercase tracking-wider mb-1">Precio</h3>
                            <p class="text-3xl font-bold text-gray-900">${{ number_format($producto->precio, 2) }}</p>
                            <p class="text-sm text-gray-500 mt-1">Precio actual del producto</p>
                        </div>

                        <!-- Descripción -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Descripción del producto</h3>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $producto->descripcion }}</p>
                        </div>

                        <!-- Estado y metadatos -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Estatus</h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mt-1 
                                    {{ $producto->estatus == 'Pendiente' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                    @if($producto->estatus == 'Pendiente')
                                        <i class="ri-time-line mr-1.5"></i>
                                    @else
                                        <i class="ri-checkbox-circle-line mr-1.5"></i>
                                    @endif
                                    {{ $producto->estatus }}
                                </span>
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Última actualización</h3>
                                <p class="text-gray-700 mt-1">{{ $producto->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">