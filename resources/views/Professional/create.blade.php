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
        <!-- Botón Rellenar automáticamente (Demo) -->
        <button type="button" onclick="autofillForm()" 
            class="ml-auto bg-purple-100 text-purple-800 px-4 py-2 rounded-lg border border-purple-300 
            hover:bg-purple-200 transition-colors flex items-center">
            <i class="ri-magic-line mr-2"></i> Rellenar automáticamente (Demo)
        </button>

        <!-- Espacio entre los botones -->
        <div class="my-4"></div>

        <!-- Mensajes de éxito o error -->
        <div class="w-full sm:w-auto mt-3 sm:mt-0">
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
        </div>

        <!-- Botón Regresar -->
        <button onclick="history.back()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition ml-4">
            <i class="ri-arrow-left-line mr-2"></i> Regresar
        </button>
    </div>

            <!-- Formulario -->
            <div class="p-8">
                <form action="{{ route('profesionales.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf 

                     <!-- Componente de carga de imagen con vista previa -->
<div class="mb-4 w-full">
    <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Subir imagen</label>
    
    <div class="mt-1 relative group">
        <!-- Área de carga -->
        <div id="upload-area" class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-blue-400 transition-colors duration-200 cursor-pointer">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" 
                     stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" 
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex flex-wrap justify-center text-sm text-gray-600">
                    <label class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                        <span>Sube un archivo</span>
                        <input id="foto" name="foto" type="file" class="sr-only" accept="image/*">
                    </label>
                    <p class="pl-1">o arrastra y suelta</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 2MB</p>
            </div>
        </div>
        
        <!-- Vista previa de la imagen (inicialmente oculta) -->
        <div id="preview-container" class="hidden mt-4 flex flex-col items-center">
            <div class="relative group">
                <img id="preview-image" src="" alt="Vista previa" 
                     class="w-40 h-40 object-cover rounded-md border border-gray-200 shadow-sm">
                <button type="button" id="remove-image" 
                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <p id="file-name" class="mt-2 text-sm text-gray-600 truncate max-w-xs"></p>
        </div>
    </div>
</div>                 

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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($documentos as $doc)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ $doc[1] }}</label>
                                    <input type="file" name="{{ $doc[0] }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="pt-6 flex justify-end">
                        <button type="submit" class="w-full md:w-auto flex justify-center py-3 px-8 rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            <i class="ri-save-line mr-2"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
    console.log("Función autofillForm ejecutada");

    // Datos aleatorios
    const names = ['Carlos', 'Ana', 'Luis', 'Patricia', 'Jorge', 'María', 'Fernando', 'Lucía'];
    const lastnames = ['Martinez', 'Garcia', 'Rodriguez', 'Hernandez', 'Lopez', 'Perez', 'Gomez', 'Diaz'];
    const professions = ['Médico', 'Ingeniero', 'Abogado', 'Psicólogo', 'Arquitecto', 'Profesor'];
    const specialties = {
        'Médico': ['Cardiología', 'Neurología', 'Pediatría'],
        'Ingeniero': ['Software', 'Civil', 'Eléctrico'],
        'Abogado': ['Familiar', 'Corporativo', 'Penal'],
        'Psicólogo': ['Clínica', 'Educacional', 'Laboral'],
        'Arquitecto': ['Diseño Urbano', 'Restauración', 'Residencial'],
        'Profesor': ['Matemáticas', 'Historia', 'Ciencias']
    };
    const countries = ['México', 'España', 'Colombia', 'Argentina', 'Chile'];
    const states = ['Ciudad de México', 'Jalisco', 'Nuevo León', 'Puebla', 'Veracruz'];
    const cities = ['Monterrey', 'Guadalajara', 'Puebla', 'Xalapa', 'León'];
    const addresses = ['Reforma 123', 'Insurgentes 456', 'Hidalgo 789', 'Juárez 321', 'Madero 654'];

    // Selección aleatoria
    const randomName = names[Math.floor(Math.random() * names.length)];
    const randomSecondName = names[Math.floor(Math.random() * names.length)];
    const randomLastname = lastnames[Math.floor(Math.random() * lastnames.length)];
    const randomSecondLastname = lastnames[Math.floor(Math.random() * lastnames.length)];
    const profession = professions[Math.floor(Math.random() * professions.length)];
    const specialty = specialties[profession][Math.floor(Math.random() * specialties[profession].length)];
    const phone = `55${Math.floor(1000 + Math.random() * 9000)}${Math.floor(1000 + Math.random() * 9000)}`;
    const email = `${randomName.toLowerCase()}.${randomLastname.toLowerCase()}@demo.com`;
    const username = `${randomName.toLowerCase()}${Math.floor(100 + Math.random() * 900)}`;

    // Generar redes sociales
    const facebook = `https://facebook.com/${username}`;
    const twitter = `https://twitter.com/${username}`;
    const instagram = `https://instagram.com/${username}`;
    const linkedin = `https://linkedin.com/in/${username}`;

    // Rellenar los campos
    setValue('input[name="primer_nombre"]', randomName);
    setValue('input[name="segundo_nombre"]', randomSecondName);
    setValue('input[name="primer_apellido"]', randomLastname);
    setValue('input[name="segundo_apellido"]', randomSecondLastname);
    setValue('input[name="profesion"]', profession);
    setValue('input[name="especialidad"]', specialty);
    setValue('input[name="telefono"]', phone);
    setValue('input[name="correo"]', email);
    setValue('input[name="pais"]', countries[Math.floor(Math.random() * countries.length)]);
    setValue('input[name="estado"]', states[Math.floor(Math.random() * states.length)]);
    setValue('input[name="ciudad"]', cities[Math.floor(Math.random() * cities.length)]);
    setValue('input[name="direccion"]', addresses[Math.floor(Math.random() * addresses.length)]);
    setValue('input[name="codigo_postal"]', Math.floor(10000 + Math.random() * 90000));
    setValue('input[name="facebook"]', facebook);
    setValue('input[name="twitter"]', twitter);
    setValue('input[name="instagram"]', instagram);
    setValue('input[name="linkedin"]', linkedin);

    // Notificación de éxito
    Swal.fire({
        icon: 'success',
        title: 'Formulario autorellenado',
        html: `Se han completado los campos con datos de prueba:<br>
               <strong>Correo:</strong> ${email}<br>
               <strong>Teléfono:</strong> ${phone}<br>
               <strong>Facebook:</strong> <a href="${facebook}" target="_blank">Perfil</a>`,
        timer: 3000,
        showConfirmButton: false
    });
}
</script>
<!-- Script para manejar la vista previa -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('foto');
        const uploadArea = document.getElementById('upload-area');
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        const fileNameDisplay = document.getElementById('file-name');
        const removeButton = document.getElementById('remove-image');
    
        // Manejar la selección de archivo
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                
                // Validar tamaño (2MB máximo)
                if (file.size > 2 * 1024 * 1024) {
                    alert('El archivo es demasiado grande (máximo 2MB)');
                    return;
                }
                
                // Validar tipo de archivo
                const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Solo se permiten imágenes (JPEG, PNG, GIF)');
                    return;
                }
                
                // Mostrar vista previa
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    fileNameDisplay.textContent = file.name;
                    uploadArea.classList.add('hidden');
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    
        // Manejar el botón de eliminar
        removeButton.addEventListener('click', function() {
            fileInput.value = '';
            previewImage.src = '';
            previewContainer.classList.add('hidden');
            uploadArea.classList.remove('hidden');
        });
    
        // Manejar drag and drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });
    
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
    
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });
    
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });
    
        function highlight() {
            uploadArea.classList.add('border-blue-500', 'bg-blue-50');
        }
    
        function unhighlight() {
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
        }
    
        uploadArea.addEventListener('drop', handleDrop, false);
    
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        }
    });
    </script>
@endsection
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">