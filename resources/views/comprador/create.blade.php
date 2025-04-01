@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Agregar Nuevo Usuario</h1>
            <button type="button" onclick="autofillForm()"
                class="bg-purple-100 text-purple-800 px-4 py-2 rounded-lg border border-purple-300
                   hover:bg-purple-200 transition-colors flex items-center">
                <i class="ri-magic-line mr-2"></i> Rellenar automáticamente (Demo)
            </button>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comprador.usuarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Sección de Información Personal -->
            <div class="card mb-6">
                <div class="card-header bg-gray-200 p-3 font-bold">
                    <i class="ri-user-line mr-2"></i>Información Personal
                </div>
                <div class="card-body p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="mb-4">
                            <label class="block font-medium">Primer Nombre</label>
                            <input type="text" name="firstname" class="border p-2 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Segundo Nombre</label>
                            <input type="text" name="second_name" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Apellido Paterno</label>
                            <input type="text" name="lastname" class="border p-2 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Apellido Materno</label>
                            <input type="text" name="second_lastname" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Teléfono</label>
                            <input type="tel" name="phone" class="border p-2 w-full" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Información de Usuario -->
            <div class="card mb-6">
                <div class="card-header bg-gray-200 p-3 font-bold">
                    <i class="ri-user-settings-line mr-2"></i>Información de Usuario
                </div>
                <div class="card-body p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block font-medium">Nombre de Usuario</label>
                            <input type="text" name="name" class="border p-2 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Correo Electrónico</label>
                            <input type="email" name="email" class="border p-2 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Contraseña</label>
                            <input type="password" name="password" class="border p-2 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="border p-2 w-full" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Información Laboral -->
            <div class="card mb-6">
                <div class="card-header bg-gray-200 p-3 font-bold">
                    <i class="ri-briefcase-line mr-2"></i>Información Laboral
                </div>
                <div class="card-body p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block font-medium">Puesto</label>
                            <input type="text" name="workstation" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Área</label>
                            <input type="text" name="area_work" class="border p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Dirección -->
            <div class="card mb-6">
                <div class="card-header bg-gray-200 p-3 font-bold">
                    <i class="ri-map-pin-line mr-2"></i>Dirección
                </div>
                <div class="card-body p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label class="block font-medium">País</label>
                            <input type="text" name="country" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Estado</label>
                            <input type="text" name="state" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Municipio</label>
                            <input type="text" name="municipality" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Colonia</label>
                            <input type="text" name="colony" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Calle</label>
                            <input type="text" name="street" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Número</label>
                            <input type="text" name="street_number" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Código Postal</label>
                            <input type="text" name="postal_code" class="border p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Documentación -->
            <div class="card mb-6">
                <div class="card-header bg-gray-200 p-3 font-bold">
                    <i class="ri-file-text-line mr-2"></i>Documentación
                </div>
                <div class="card-body p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block font-medium">Gafete (Lado 1)</label>
                            <input type="file" name="file_gafete" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">Gafete (Lado 2)</label>
                            <input type="file" name="file_gafete2" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">INE (Lado 1)</label>
                            <input type="file" name="file_credential" class="border p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium">INE (Lado 2)</label>
                            <input type="file" name="file_credential2" class="border p-2 w-full">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Guardar Usuario
                </button>
            </div>
        </form>
    </div>

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
@endsection
