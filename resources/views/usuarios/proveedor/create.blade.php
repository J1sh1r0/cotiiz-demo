@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <div class="card-header flex flex-col sm:flex-row justify-between items-start sm:items-center py-5 px-8 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
        <div class="flex items-center mb-3 sm:mb-0">
            <i class="ri-user-add-line text-2xl text-blue-600 mr-3"></i>
            <h2 class="text-2xl font-bold text-gray-800">
                Nuevo Usuario
            </h2>
        </div>
        <a href="{{ route('proveedor.usuarios.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
            <i class="ri-arrow-left-line mr-2"></i> Regresar
        </a>
    </div>

    <form action="{{ route('proveedor.usuarios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Sección de Información Básica -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">Información Básica</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo*</label>
                    <input type="text" id="name" name="name" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico*</label>
                    <input type="email" id="email" name="email" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña*</label>
                    <div class="relative">
                        <input type="password" id="passwordshow" name="password" required 
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                        <button type="button" onclick="togglePassword('passwordshow')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 hover:text-gray-800">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Datos Personales -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">Datos Personales</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">Primer Nombre*</label>
                    <input type="text" id="firstname" name="firstname" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('firstname')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="second_name" class="block text-sm font-medium text-gray-700 mb-1">Segundo Nombre</label>
                    <input type="text" id="second_name" name="second_name" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('second_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Primer Apellido*</label>
                    <input type="text" id="lastname" name="lastname" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('lastname')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="second_lastname" class="block text-sm font-medium text-gray-700 mb-1">Segundo Apellido</label>
                    <input type="text" id="second_lastname" name="second_lastname" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('second_lastname')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono*</label>
                    <input type="text" id="phone" name="phone" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Datos Laborales -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">Datos Laborales</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="workstation" class="block text-sm font-medium text-gray-700 mb-1">Puesto de Trabajo*</label>
                    <input type="text" id="workstation" name="workstation" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('workstation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="area_work" class="block text-sm font-medium text-gray-700 mb-1">Área de Trabajo*</label>
                    <input type="text" id="area_work" name="area_work" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('area_work')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Dirección -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">Dirección</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1">País*</label>
                    <input type="text" id="country" name="country" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('country')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Estado*</label>
                    <input type="text" id="state" name="state" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('state')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="municipality" class="block text-sm font-medium text-gray-700 mb-1">Municipio*</label>
                    <input type="text" id="municipality" name="municipality" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('municipality')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="colony" class="block text-sm font-medium text-gray-700 mb-1">Colonia*</label>
                    <input type="text" id="colony" name="colony" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('colony')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="street" class="block text-sm font-medium text-gray-700 mb-1">Calle*</label>
                    <input type="text" id="street" name="street" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('street')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="street_number" class="block text-sm font-medium text-gray-700 mb-1">Número de Calle*</label>
                    <input type="text" id="street_number" name="street_number" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('street_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Código Postal*</label>
                    <input type="text" id="postal_code" name="postal_code" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('postal_code')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Documentos -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">Documentos</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="file_gafete" class="block text-sm font-medium text-gray-700 mb-1">Archivo Gafete</label>
                    <div class="flex items-center">
                        <input type="file" id="file_gafete" name="file_gafete" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_gafete')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="file_gafete2" class="block text-sm font-medium text-gray-700 mb-1">Archivo Gafete 2</label>
                    <div class="flex items-center">
                        <input type="file" id="file_gafete2" name="file_gafete2" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_gafete2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="file_credential" class="block text-sm font-medium text-gray-700 mb-1">INE (Frontal)*</label>
                    <div class="flex items-center">
                        <input type="file" id="file_credential" name="file_credential" required
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_credential')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="file_credential2" class="block text-sm font-medium text-gray-700 mb-1">INE (Trasera)*</label>
                    <div class="flex items-center">
                        <input type="file" id="file_credential2" name="file_credential2" required
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_credential2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center pt-6">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                <i class="fas fa-save mr-2"></i> Guardar Usuario
            </button>
        </div>
    </form>
</div>

<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection