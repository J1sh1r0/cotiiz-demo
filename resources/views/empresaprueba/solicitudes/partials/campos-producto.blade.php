<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 p-4 bg-gray-50 rounded-lg">
    <h3 class="md:col-span-2 text-lg font-medium text-gray-700">Información del Producto</h3>

    <div>
        <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
        <input type="text" name="modelo" id="modelo"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="nombre" id="nombre"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
        <input type="text" name="marca" id="marca"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" min="1"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="presupuesto" class="block text-sm font-medium text-gray-700">Presupuesto ($)</label>
        <input type="number" name="presupuesto" id="presupuesto" step="0.01" min="0"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="md:col-span-2">
        <label for="link_drive" class="block text-sm font-medium text-gray-700">Link de Drive</label>
        <input type="url" name="link_drive" id="link_drive"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
    </div>
</div>
