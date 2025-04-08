<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 p-4 bg-gray-50 rounded-lg">
    <h3 class="md:col-span-2 text-lg font-medium text-gray-700">Información del Profesionista</h3>

    <div>
        <label for="trabajo" class="block text-sm font-medium text-gray-700">Tipo de trabajo *</label>
        <select name="trabajo" id="trabajo"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                required>
            <option value="">Seleccione un tipo</option>
            <option value="desarrollo">Desarrollo</option>
            <option value="diseno">Diseño</option>
            <option value="marketing">Marketing</option>
            <option value="consultoria">Consultoría</option>
        </select>
    </div>

    <div>
        <label for="tiempo" class="block text-sm font-medium text-gray-700">Tiempo requerido *</label>
        <select name="tiempo" id="tiempo"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                required>
            <option value="">Seleccione duración</option>
            <option value="temporal">Temporal</option>
            <option value="indefinido">Indefinido</option>
            <option value="proyecto">Por proyecto</option>
        </select>
    </div>

    <div class="md:col-span-2">
        <label for="detalles" class="block text-sm font-medium text-gray-700">Detalles del trabajo *</label>
        <textarea name="detalles" id="detalles" rows="3" placeholder="Describa los detalles del trabajo requerido"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  required></textarea>
    </div>

    <div class="md:col-span-2">
        <label for="conocimientos" class="block text-sm font-medium text-gray-700">Conocimientos requeridos *</label>
        <textarea name="conocimientos" id="conocimientos" rows="3" placeholder="Liste los conocimientos técnicos necesarios"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  required></textarea>
    </div>

    <div class="md:col-span-2">
        <label for="cursos" class="block text-sm font-medium text-gray-700">Certificaciones o cursos deseables</label>
        <textarea name="cursos" id="cursos" rows="2" placeholder="Especifique certificaciones deseadas"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
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
                   class="hidden">
            <label for="archivo_adjunto" id="file-label"
                   class="cursor-pointer bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 flex-1 truncate">Seleccionar archivo...</label>
            <button type="button" onclick="document.getElementById('archivo_adjunto').click()"
                    class="ml-2 inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Examinar
            </button>
        </div>
        <p class="mt-1 text-sm text-gray-500">Formatos aceptados: PDF, DOC, XLS (Max. 5MB)</p>
    </div>
</div>

<div class="flex justify-between items-center mb-6">
    <div class="p-4 bg-blue-50 rounded-lg">
        <p class="text-sm text-blue-700"><span class="font-medium">Nota:</span> Los campos marcados con * son obligatorios.</p>
    </div>
</div>

