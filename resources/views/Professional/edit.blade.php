@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Encabezado -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-8 py-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <i class="ri-user-edit-line text-2xl text-blue-600 mr-3"></i>
                        <h1 class="text-2xl font-bold text-gray-800">Editar Profesional</h1>
                    </div>
                    <a href="{{ route('profesionales.index') }}" class="flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 transition duration-200">
                        <i class="ri-arrow-left-line mr-2"></i> Regresar
                    </a>
                </div>
            </div>

            <!-- Formulario -->
            <div class="p-8">
                <form action="{{ route('profesionales.update', $profesional->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Sección de Información Personal -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Información Personal</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Primer Nombre -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primer Nombre *</label>
                                <input type="text" name="primer_nombre" value="{{ old('primer_nombre', $profesional->primer_nombre) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Segundo Nombre -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Segundo Nombre</label>
                                <input type="text" name="segundo_nombre" value="{{ old('segundo_nombre', $profesional->segundo_nombre) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Primer Apellido -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primer Apellido *</label>
                                <input type="text" name="primer_apellido" value="{{ old('primer_apellido', $profesional->primer_apellido) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Segundo Apellido -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Segundo Apellido</label>
                                <input type="text" name="segundo_apellido" value="{{ old('segundo_apellido', $profesional->segundo_apellido) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Información Profesional -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Información Profesional</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Profesión -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Profesión *</label>
                                <input type="text" name="profesion" value="{{ old('profesion', $profesional->profesion) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Especialidad -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                                <input type="text" name="especialidad" value="{{ old('especialidad', $profesional->especialidad) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Contacto -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Información de Contacto</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Teléfono -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono *</label>
                                <input type="tel" name="telefono" value="{{ old('telefono', $profesional->telefono) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Correo -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Correo *</label>
                                <input type="email" name="correo" value="{{ old('correo', $profesional->correo) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Dirección -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Dirección</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- País -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">País *</label>
                                <input type="text" name="pais" value="{{ old('pais', $profesional->pais) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Estado -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
                                <input type="text" name="estado" value="{{ old('estado', $profesional->estado) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Ciudad -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad *</label>
                                <input type="text" name="ciudad" value="{{ old('ciudad', $profesional->ciudad) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Dirección -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección *</label>
                                <input type="text" name="direccion" value="{{ old('direccion', $profesional->direccion) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <!-- Código Postal -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Código Postal *</label>
                                <input type="text" name="codigo_postal" value="{{ old('codigo_postal', $profesional->codigo_postal) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Redes Sociales -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Redes Sociales</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Facebook -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                        https://
                                    </span>
                                    <input type="text" name="facebook" value="{{ old('facebook', str_replace('https://', '', $profesional->facebook)) }}" class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="facebook.com/usuario">
                                </div>
                            </div>

                            <!-- Twitter -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Twitter</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                        https://
                                    </span>
                                    <input type="text" name="twitter" value="{{ old('twitter', str_replace('https://', '', $profesional->twitter)) }}" class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="twitter.com/usuario">
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                        https://
                                    </span>
                                    <input type="text" name="instagram" value="{{ old('instagram', str_replace('https://', '', $profesional->instagram)) }}" class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="instagram.com/usuario">
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                        https://
                                    </span>
                                    <input type="text" name="linkedin" value="{{ old('linkedin', str_replace('https://', '', $profesional->linkedin)) }}" class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="linkedin.com/in/usuario">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Documentos -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Documentos</h3>
                        
                        <!-- Hoja de Vida -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hoja de Vida o CV</label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="cv" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @if($profesional->cv)
                                <a href="{{ asset($profesional->cv) }}" target="_blank" class="ml-4 text-sm text-blue-600 hover:text-blue-500 hover:underline">Ver documento actual</a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Título Lado #1 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Título o Carta Pasante (Color) Lado #1</label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="titulo_1" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @if($profesional->titulo_1)
                                <a href="{{ asset($profesional->titulo_1) }}" target="_blank" class="ml-4 text-sm text-blue-600 hover:text-blue-500 hover:underline">Ver documento actual</a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Título Lado #2 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Título o Carta Pasante (Color) Lado #2</label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="titulo_2" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @if($profesional->titulo_2)
                                <a href="{{ asset($profesional->titulo_2) }}" target="_blank" class="ml-4 text-sm text-blue-600 hover:text-blue-500 hover:underline">Ver documento actual</a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- INE Lado #1 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto INE (Lado #1)</label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="ine_1" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @if($profesional->ine_1)
                                <a href="{{ asset($profesional->ine_1) }}" target="_blank" class="ml-4 text-sm text-blue-600 hover:text-blue-500 hover:underline">Ver documento actual</a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- INE Lado #2 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto INE (Lado #2)</label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="ine_2" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @if($profesional->ine_2)
                                <a href="{{ asset($profesional->ine_2) }}" target="_blank" class="ml-4 text-sm text-blue-600 hover:text-blue-500 hover:underline">Ver documento actual</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="pt-6">
                        <button type="submit" class="w-full md:w-auto flex justify-center py-3 px-8 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            <i class="ri-save-line mr-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">