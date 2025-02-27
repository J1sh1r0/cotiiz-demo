<div class="w-64 bg-gray-900 text-white p-5 h-full"> 
    <h3 class="text-xl font-bold text-center mb-4">Proveedor</h3>

    <ul class="space-y-2">
        <li>
            <a href="{{ route('proveedor.solicitudes') }}"
                class="flex items-center py-2 px-4 rounded {{ Route::is('proveedor.solicitudes') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                📋 <span class="ml-2">Solicitudes</span>
            </a>
        </li>

        <li>
            <a href="{{ route('proveedor.catalogo.productos') }}"
                class="flex items-center py-2 px-4 rounded {{ Route::is('proveedor.catalogo.productos') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                🛒 <span class="ml-2">Catálogo - Productos</span>
            </a>
        </li>

        <li>
            <a href="{{ route('proveedor.catalogo.servicios') }}"
                class="flex items-center py-2 px-4 rounded {{ Route::is('proveedor.catalogo.servicios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                ⚙️ <span class="ml-2">Catálogo - Servicios</span>
            </a>
        </li>

        <li>
            <a href="{{ route('proveedor.catalogo.profesionales') }}"
                class="flex items-center py-2 px-4 rounded {{ Route::is('proveedor.catalogo.profesionales') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                🎓 <span class="ml-2">Catálogo - Profesionales</span>
            </a>
        </li>

        <li>
            <a href="{{ route('proveedor.usuarios') }}"
                class="flex items-center py-2 px-4 rounded {{ Route::is('proveedor.usuarios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                👥 <span class="ml-2">Usuarios</span>
            </a>
        </li>

        <li>
            <a href="{{ route('proveedor.subcuentas') }}"
                class="flex items-center py-2 px-4 rounded {{ Route::is('proveedor.subcuentas') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                🔑 <span class="ml-2">Subcuentas</span>
            </a>
        </li>
    </ul>
</div>
