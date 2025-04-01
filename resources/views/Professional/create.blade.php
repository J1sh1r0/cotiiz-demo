@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Encabezado -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-8 py-6 border-b border-gray-200 flex justify-between items-center">
                <div class="flex items-center">
                    <i class="ri-user-add-line text-2xl text-blue-600 mr-3"></i>
                    <h1 class="text-2xl font-bold text-gray-800">Agregar Profesional</h1>
                </div>
                <button onclick="history.back()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition">
                    <i class="ri-arrow-left-line mr-2"></i> Regresar
                </button>
            </div>

            <!-- Formulario -->
            <div class="p-8">
                <form action="{{ route('profesionales.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Generador de Campos -->
                    @php
                        $campos = [
                            'Información Personal' => [
                                ['primer_nombre', 'Primer Nombre', 'text', true],
                                ['segundo_nombre', 'Segundo Nombre', 'text'],
                                ['primer_apellido', 'Primer Apellido', 'text', true],
                                ['segundo_apellido', 'Segundo Apellido', 'text']
                            ],
                            'Información Profesional' => [
                                ['profesion', 'Profesión', 'text', true],
                                ['especialidad', 'Especialidad', 'text']
                            ],
                            'Información de Contacto' => [
                                ['telefono', 'Teléfono', 'tel', true],
                                ['correo', 'Correo', 'email', true]
                            ],
                            'Dirección' => [
                                ['pais', 'País', 'text', true],
                                ['estado', 'Estado', 'text', true],
                                ['ciudad', 'Ciudad', 'text'],
                                ['direccion', 'Dirección', 'text'],
                                ['codigo_postal', 'Código Postal', 'text']
                            ]
                        ];
                    @endphp

                    @foreach($campos as $seccion => $inputs)
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">{{ $seccion }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($inputs as $input)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $input[1] }}</label>
                                        <input type="{{ $input[2] }}" name="{{ $input[0] }}" 
                                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                                               @if(isset($input[3]) && $input[3]) required @endif>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <!-- Redes Sociales -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Redes Sociales</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $red)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ ucfirst($red) }}</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                            https://
                                        </span>
                                        <input type="text" name="{{ $red }}" 
                                               class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="{{ $red }}.com/usuario">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Documentos -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Documentos</h3>
                        @php
                            $documentos = [
                                ['cv', 'Hoja de Vida o CV'],
                                ['titulo_1', 'Título o Carta Pasante (Color) Lado #1'],
                                ['titulo_2', 'Título o Carta Pasante (Color) Lado #2'],
                                ['ine_1', 'Foto INE (Lado #1)'],
                                ['ine_2', 'Foto INE (Lado #2)']
                            ];
                        @endphp
                        @foreach($documentos as $doc)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">{{ $doc[1] }}</label>
                                <div class="mt-1 flex items-center">
                                    <input type="file" name="{{ $doc[0] }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <a href="#" class="ml-4 text-sm text-blue-600 hover:text-blue-500 hover:underline">Descargar</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Botón de enviar -->
                    <div class="pt-6">
                        <button type="submit" class="w-full md:w-auto flex justify-center py-3 px-8 rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            <i class="ri-save-line mr-2"></i> Guardar Profesional
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">