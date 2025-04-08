<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 p-4 bg-gray-50 rounded-lg">
    <h3 class="md:col-span-2 text-lg font-medium text-gray-700">Información del Servicio</h3>

    <div>
        <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Tipo de servicio a resolver *</label>
        <select name="tipo_solicitudServicio" id="tipo_solicitudServicio"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                required>
            <option value="">Seleccione un tipo</option>
            <option value="mantenimiento">Mantenimiento</option>
            <option value="consultoria">Consultoría</option>
            <option value="desarrollo">Desarrollo</option>
            <option value="soporte">Soporte Técnico</option>
        </select>
    </div>

    <div>
        <label for="presupuesto" class="block text-sm font-medium text-gray-700">Presupuesto aproximado (USD) *</label>
        <input type="number" name="presupuesto_servicio" id="presupuesto_servicio" placeholder="Ej: 1500"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
               required>
    </div>

    <div class="md:col-span-2">
        <label for="descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción del servicio *</label>
        <textarea name="descripcion_servicio" id="descripcion_servicio" rows="4" placeholder="Describa el servicio requerido"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  required></textarea>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 p-4 bg-gray-50 rounded-lg">
    <h3 class="md:col-span-2 text-lg font-medium text-gray-700">Documentación Adjunta</h3>

    <div>
        <label for="link_drive" class="block text-sm font-medium text-gray-700">Link Drive</label>
        <input type="url" name="link_drive" id="link_drive" placeholder="https://drive.google.com/..."
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="archivo_adjunto" class="block text-sm font-medium text-gray-700">Adjunta información importante</label>
        <div class="mt-1 flex items-center">
            <input type="file" name="archivo_adjunto" id="archivo_adjunto"
                   class="hidden"
                   @change="fileName = $event.target.files[0] ? $event.target.files[0].name : 'Ningún archivo seleccionado'">
            <label for="archivo_adjunto" class="cursor-pointer bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 flex-1 truncate"
                   x-text="fileName || 'Seleccionar archivo...'"></label>
            <button type="button" @click="document.getElementById('archivo_adjunto').click()"
                    class="ml-2 inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Examinar
            </button>
        </div>
        <p class="mt-1 text-sm text-gray-500">Formatos aceptados: PDF, DOC, XLS (Max. 5MB)</p>
    </div>
</div>

<div class="mb-6 p-4 bg-blue-50 rounded-lg">
    <p class="text-sm text-blue-700"><span class="font-medium">Nota:</span> Los campos marcados con * son obligatorios.</p>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('fileInput', () => ({
            fileName: 'Ningún archivo seleccionado'
        }));
    });
</script>
