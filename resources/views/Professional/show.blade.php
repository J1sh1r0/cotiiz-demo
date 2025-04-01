@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 bg-blue-100 px-6 py-4 rounded-lg border border-blue-200">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                @if($profesional->foto)
                <img src="{{ asset('storage/' . $profesional->foto) }}" 
                     alt="{{ $profesional->primer_nombre }}" 
                     class="w-16 h-16 object-cover rounded-full border-4 border-white shadow-md">
                @endif
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        {{ $profesional->primer_nombre }} 
                        @if($profesional->segundo_nombre) {{ $profesional->segundo_nombre }} @endif
                        {{ $profesional->primer_apellido }}
                        @if($profesional->segundo_apellido) {{ $profesional->segundo_apellido }} @endif
                    </h1>
                    <div class="flex flex-wrap items-center gap-2 mt-1">
                        <span class="text-lg text-blue-600">{{ $profesional->profesion }}</span>
                        @if($profesional->especialidad)
                            <span class="text-sm bg-blue-200 text-blue-800 px-2 py-1 rounded-full">{{ $profesional->especialidad }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{ route('profesionales.index') }}" 
               class="px-5 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition duration-300 flex items-center border border-blue-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Regresar
            </a>
        </div>

        <!-- Primera fila de tarjetas horizontales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Información de contacto -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    Información de Contacto
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mt-0.5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Correo electrónico</p>
                            <p class="font-medium text-gray-800">{{ $profesional->correo }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mt-0.5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Teléfono</p>
                            <p class="font-medium text-gray-800">{{ $profesional->telefono }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dirección -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Dirección
                </h3>
                <div class="space-y-2">
                    <p class="font-medium text-gray-800">{{ $profesional->direccion }}</p>
                    <p class="text-gray-700">{{ $profesional->ciudad }}, {{ $profesional->estado }}</p>
                    <p class="text-gray-700">{{ $profesional->pais }}. CP: {{ $profesional->codigo_postal }}</p>
                </div>
            </div>
        </div>

        <!-- Segunda fila de tarjetas horizontales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Redes sociales -->
            @if($profesional->facebook || $profesional->twitter || $profesional->instagram || $profesional->linkedin)
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    Redes Sociales
                </h3>
                <div class="flex flex-wrap gap-3">
                    @if($profesional->facebook)
                    <a href="{{ $profesional->facebook }}" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm flex items-center hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                    </a>
                    @endif
                    @if($profesional->twitter)
                    <a href="{{ $profesional->twitter }}" target="_blank" class="px-4 py-2 bg-blue-400 text-white rounded-lg text-sm flex items-center hover:bg-blue-500 transition">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    @endif
                    @if($profesional->instagram)
                    <a href="{{ $profesional->instagram }}" target="_blank" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg text-sm flex items-center hover:opacity-90 transition">
                        <i class="fab fa-instagram mr-2"></i> Instagram
                    </a>
                    @endif
                    @if($profesional->linkedin)
                    <a href="{{ $profesional->linkedin }}" target="_blank" class="px-4 py-2 bg-blue-700 text-white rounded-lg text-sm flex items-center hover:bg-blue-800 transition">
                        <i class="fab fa-linkedin-in mr-2"></i> LinkedIn
                    </a>
                    @endif
                </div>
            </div>
            @endif

            <!-- Foto profesional -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mb-4">Foto Profesional</h3>
                <div class="flex justify-center">
                    @if($profesional->foto)
                    <img src="{{ asset('storage/' . $profesional->foto) }}" 
                         alt="{{ $profesional->primer_nombre }}" 
                         class="w-48 h-48 object-cover rounded-lg shadow-md">
                    @else
                    <div class="w-48 h-48 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tercera fila - Documentos (ocupa todo el ancho) -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Documentos
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- CV -->
                @if($profesional->cv)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 hover:bg-gray-100 transition">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium">Curriculum Vitae</span>
                    </div>
                    <a href="{{ asset('storage/' . $profesional->cv) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver documento
                    </a>
                </div>
                @endif

                <!-- Títulos -->
                @if($profesional->titulo_1)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 hover:bg-gray-100 transition">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="font-medium">Título Profesional 1</span>
                    </div>
                    <a href="{{ asset('storage/' . $profesional->titulo_1) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver documento
                    </a>
                </div>
                @endif

                @if($profesional->titulo_2)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 hover:bg-gray-100 transition">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="font-medium">Título Profesional 2</span>
                    </div>
                    <a href="{{ asset('storage/' . $profesional->titulo_2) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver documento
                    </a>
                </div>
                @endif

                <!-- INE -->
                @if($profesional->ine_1)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 hover:bg-gray-100 transition">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="font-medium">INE (Frente)</span>
                    </div>
                    <a href="{{ asset('storage/' . $profesional->ine_1) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver documento
                    </a>
                </div>
                @endif

                @if($profesional->ine_2)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 hover:bg-gray-100 transition">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="font-medium">INE (Reverso)</span>
                    </div>
                    <a href="{{ asset('storage/' . $profesional->ine_2) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver documento
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-2px);
        }
    </style>
@endpush