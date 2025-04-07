@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card shadow-lg border-0 rounded-xl overflow-hidden mb-8 bg-white">
           <!-- Encabezado de la tarjeta -->
<div class="card-header flex flex-col sm:flex-row justify-between items-start sm:items-center py-5 px-8 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
    <div class="flex items-center mb-3 sm:mb-0">
        <i class="ri-service-line text-2xl text-blue-600 mr-3"></i>
        <h2 class="text-2xl font-bold text-gray-800">
            Agregar Servicio
        </h2>
    </div>
    <!-- Botón Rellenar automáticamente (Demo) alineado a la derecha -->
    <button type="button" onclick="autofillForm()" 
        class="ml-auto bg-purple-100 text-purple-800 px-4 py-2 rounded-lg border border-purple-300 
        hover:bg-purple-200 transition-colors flex items-center">
        <i class="ri-magic-line mr-2"></i> Rellenar automáticamente (Demo)
    </button>

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
    <button onclick="history.back()" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out ml-4">
        <i class="ri-arrow-left-line mr-2"></i> Regresar
    </button>
</div>
        
            <!-- Cuerpo del formulario -->
            <div class="card-body p-8">
                <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Imagen del Servicio -->
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

                    <!-- Sección de Información Básica -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Información Básica</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del servicio</label>
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

                    <!-- Descripción -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Descripción</h3>
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Detalles del servicio</label>
                            <textarea id="descripcion" name="descripcion" rows="6" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Describe el servicio, procesos, y beneficios" required></textarea>
                        </div>
                    </div>

                    <!-- Acciones del formulario -->
                    <div class="pt-8">
                        <div class="flex justify-end space-x-4">
                            <button type="reset" class="bg-white py-3 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="ri-eraser-line mr-2"></i> Limpiar
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                <i class="ri-save-2-line mr-2"></i> Guardar Servicio
                            </button>
                        </div>
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
    
            // Datos de servicios con descripciones y precios asociados
            const services = [
                { name: 'Consultoría en TI', description: 'Optimización de procesos tecnológicos para empresas.', price: 150.00 },
                { name: 'Desarrollo Web', description: 'Creación de sitios web personalizados y responsivos.', price: 250.00 },
                { name: 'Mantenimiento de Computadoras', description: 'Reparación y optimización de equipos de cómputo.', price: 75.00 },
                { name: 'Gestión de Redes Sociales', description: 'Estrategias para aumentar la presencia en redes sociales.', price: 100.00 },
                { name: 'Asesoría Financiera', description: 'Análisis financiero y planificación estratégica.', price: 200.00 },
                { name: 'Diseño Gráfico', description: 'Diseño de logotipos, branding y materiales publicitarios.', price: 120.00 },
                { name: 'Marketing Digital', description: 'Publicidad en línea para potenciar tu negocio.', price: 180.00 },
                { name: 'Soporte Técnico Remoto', description: 'Asistencia remota para resolver problemas técnicos.', price: 90.00 }
            ];
    
            // Selección aleatoria de un servicio
            const randomService = services[Math.floor(Math.random() * services.length)];
    
            // Rellenar los campos con datos coherentes
            setValue('input[name="nombre"]', randomService.name);
            setValue('input[name="precio"]', randomService.price);
            setValue('textarea[name="descripcion"]', randomService.description);
    
            // Notificación de éxito
            Swal.fire({
                icon: 'success',
                title: 'Formulario autorellenado',
                html: `Se han completado los campos con datos de prueba:<br>
                       <strong>Servicio:</strong> ${randomService.name}<br>
                       <strong>Precio:</strong> $${randomService.price.toFixed(2)}`,
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