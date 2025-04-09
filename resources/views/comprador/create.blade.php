@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <!-- Encabezado mejorado -->
    <div class="card-header flex flex-col sm:flex-row justify-between items-start sm:items-center py-5 px-8 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
        <!-- Título y botón de autocompletar -->
        <div class="flex items-center gap-4 mb-3 sm:mb-0">
            <i class="ri-user-add-line text-2xl text-blue-600"></i>
            <h2 class="text-2xl font-bold text-gray-800">
                Agregar Nuevo Usuario
            </h2>
        </div>
    
        <!-- Botón de autocompletar -->
        <button type="button" onclick="autofillForm()" 
            class="bg-purple-100 text-purple-800 px-4 py-2 rounded-lg border border-purple-300 
            hover:bg-purple-200 transition-colors flex items-center ml-auto mr-4">
            <i class="ri-magic-line mr-2"></i> Rellenar automáticamente (Demo)
        </button>

        <!-- Botón de regresar -->
        <a href="{{ route('comprador.usuarios') }}" 
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md 
            font-medium text-gray-700 hover:bg-gray-50 focus:outline-none 
            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
            <i class="ri-arrow-left-line mr-2"></i> Regresar
        </a>
    </div>

    <!-- Mensajes de éxito o error -->
    <div class="px-8 pt-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any()))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form action="{{ route('comprador.usuarios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 px-8 pb-8">
        @csrf

        <!-- Sección de Información Personal -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <i class="ri-user-line mr-2"></i>Información Personal
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">Primer Nombre</label>
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
                    <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Apellido Paterno</label>
                    <input type="text" id="lastname" name="lastname" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('lastname')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="second_lastname" class="block text-sm font-medium text-gray-700 mb-1">Apellido Materno</label>
                    <input type="text" id="second_lastname" name="second_lastname" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('second_lastname')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="tel" id="phone" name="phone" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Información de Usuario -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <i class="ri-user-settings-line mr-2"></i>Información de Usuario
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre de Usuario</label>
                    <input type="text" id="name" name="name" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
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
                
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>
            </div>
        </div>

        <!-- Sección de Información Laboral -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <i class="ri-briefcase-line mr-2"></i>Información Laboral
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="workstation" class="block text-sm font-medium text-gray-700 mb-1">Puesto</label>
                    <input type="text" id="workstation" name="workstation" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('workstation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="area_work" class="block text-sm font-medium text-gray-700 mb-1">Área</label>
                    <input type="text" id="area_work" name="area_work" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('area_work')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Dirección -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <i class="ri-map-pin-line mr-2"></i>Dirección
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1">País</label>
                    <input type="text" id="country" name="country" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('country')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <input type="text" id="state" name="state" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('state')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="municipality" class="block text-sm font-medium text-gray-700 mb-1">Municipio</label>
                    <input type="text" id="municipality" name="municipality" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('municipality')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="colony" class="block text-sm font-medium text-gray-700 mb-1">Colonia</label>
                    <input type="text" id="colony" name="colony" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('colony')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="street" class="block text-sm font-medium text-gray-700 mb-1">Calle</label>
                    <input type="text" id="street" name="street" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('street')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="street_number" class="block text-sm font-medium text-gray-700 mb-1">Número</label>
                    <input type="text" id="street_number" name="street_number" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('street_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Código Postal</label>
                    <input type="text" id="postal_code" name="postal_code" 
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('postal_code')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Sección de Documentación -->
        <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <i class="ri-file-text-line mr-2"></i>Documentación
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="file_gafete" class="block text-sm font-medium text-gray-700 mb-1">Gafete (Lado 1)</label>
                    <div class="flex items-center">
                        <input type="file" id="file_gafete" name="file_gafete" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_gafete')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="file_gafete2" class="block text-sm font-medium text-gray-700 mb-1">Gafete (Lado 2)</label>
                    <div class="flex items-center">
                        <input type="file" id="file_gafete2" name="file_gafete2" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_gafete2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="file_credential" class="block text-sm font-medium text-gray-700 mb-1">INE (Lado 1)</label>
                    <div class="flex items-center">
                        <input type="file" id="file_credential" name="file_credential" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_credential')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="file_credential2" class="block text-sm font-medium text-gray-700 mb-1">INE (Lado 2)</label>
                    <div class="flex items-center">
                        <input type="file" id="file_credential2" name="file_credential2" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    @error('file_credential2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Botón de envío -->
        <div class="flex justify-end pt-6">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                <i class="fas fa-save mr-2"></i> Guardar Usuario
            </button>
        </div>
    </form>
</div>

<!-- Script para mostrar/ocultar contraseña -->
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

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function setValue(selector, value) {
        const element = document.querySelector(selector);
        if (element) element.value = value;
        else console.warn(`Elemento no encontrado: ${selector}`);
    }

    function autofillForm() {
        console.log("Función autofillForm ejecutada"); // Para depuración

        // Arrays de datos aleatorios
        const names = ['Carlos', 'Ana', 'Luis', 'Patricia', 'Jorge', 'María', 'Fernando', 'Lucía'];
        const lastnames = ['Martinez', 'Garcia', 'Rodriguez', 'Hernandez', 'Lopez', 'Perez', 'Gomez', 'Diaz'];
        const secondNames = ['Alejandro', 'Isabel', 'Gabriel', 'Carmen', 'Miguel', 'Sofía', 'Ricardo', 'Elena'];
        const jobs = ['Gerente', 'Desarrollador', 'Diseñador', 'Analista', 'Asistente', 'Consultor'];
        const areas = ['TI', 'Ventas', 'Marketing', 'RH', 'Finanzas', 'Operaciones'];
        const countries = ['México', 'España', 'Colombia', 'Argentina', 'Chile'];
        const states = ['Ciudad de México', 'Jalisco', 'Nuevo León', 'Puebla', 'Veracruz'];
        const municipalities = ['Benito Juárez', 'Guadalajara', 'Monterrey', 'Puebla', 'Xalapa'];
        const colonies = ['Centro', 'Del Valle', 'Nápoles', 'Condesa', 'Roma'];
        const streets = ['Reforma', 'Insurgentes', 'Hidalgo', 'Juárez', 'Madero'];

        // Selección aleatoria de datos
        const randomName = names[Math.floor(Math.random() * names.length)];
        const randomSecondName = secondNames[Math.floor(Math.random() * secondNames.length)];
        const randomLastname = lastnames[Math.floor(Math.random() * lastnames.length)];
        const randomSecondLastname = lastnames[Math.floor(Math.random() * lastnames.length)];
        const username = `${randomName.toLowerCase().charAt(0)}${randomLastname.toLowerCase()}`;
        const email = `${username}@cotiizdemo.com`;
        const phone = `55${Math.floor(1000 + Math.random() * 9000)}${Math.floor(1000 + Math.random() * 9000)}`;
        const password = 'Demo1234!';

        // Rellenar campos con la función segura
        setValue('input[name="firstname"]', randomName);
        setValue('input[name="second_name"]', randomSecondName);
        setValue('input[name="lastname"]', randomLastname);
        setValue('input[name="second_lastname"]', randomSecondLastname);
        setValue('input[name="name"]', username);
        setValue('input[name="email"]', email);
        setValue('input[name="phone"]', phone);
        setValue('input[name="password"]', password);
        setValue('input[name="password_confirmation"]', password);

        // Información laboral
        setValue('input[name="workstation"]', jobs[Math.floor(Math.random() * jobs.length)]);
        setValue('input[name="area_work"]', areas[Math.floor(Math.random() * areas.length)]);

        // Dirección
        setValue('input[name="country"]', countries[Math.floor(Math.random() * countries.length)]);
        setValue('input[name="state"]', states[Math.floor(Math.random() * states.length)]);
        setValue('input[name="municipality"]', municipalities[Math.floor(Math.random() * municipalities.length)]);
        setValue('input[name="colony"]', colonies[Math.floor(Math.random() * colonies.length)]);
        setValue('input[name="street"]', streets[Math.floor(Math.random() * streets.length)]);
        setValue('input[name="street_number"]', Math.floor(10 + Math.random() * 500));
        setValue('input[name="postal_code"]', Math.floor(10000 + Math.random() * 90000));

        // Notificación de éxito
        Swal.fire({
            icon: 'success',
            title: 'Formulario autorellenado',
            html: `Se han completado los campos con datos de prueba:<br>
                   <strong>Usuario:</strong> ${username}<br>
                   <strong>Contraseña:</strong> ${password}`,
            timer: 3000,
            showConfirmButton: false
        });
    }
</script>

<!-- Incluir Font Awesome y Remix Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection