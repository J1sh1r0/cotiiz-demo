<div class="w-48 bg-gray-800 text-gray-100 p-2 h-screen flex flex-col">
    <div class="mb-1 border-b border-gray-700 pb-1 text-center">
        <h3 class="text-sm font-bold text-white">Panel</h3>
        <p class="text-[10px] text-gray-400">Gestión completa</p>
    </div>

    <nav class="flex-1 overflow-y-auto">
        <ul>
            <li>
                <a href="{{ route('proveedor.solicitudes') }}" class="flex items-center py-1 px-2 rounded-lg transition-all duration-200 text-[10px] {{ Route::is('proveedor.solicitudes') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-clipboard-list text-blue-400 text-xs w-4"></i>
                    <span class="ml-1">Solicitudes</span>
                    <span class="ml-auto bg-blue-500 text-white text-[9px] px-1 py-0.5 rounded-full">5</span>
                </a>
            </li>

            <li class="mt-1">
                <p class="text-[9px] uppercase text-gray-400 font-semibold px-2">Catálogos</p>
                <ul>
                    <li>
                        <a href="{{ route('productos.index') }}" class="flex items-center py-1 px-2 pl-4 rounded-lg transition-all duration-200 text-[10px] {{ Route::is('productos.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-box-open text-yellow-400 text-xs w-3"></i>
                            <span class="ml-1">Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Servicio.index') }}" class="flex items-center py-1 px-2 pl-4 rounded-lg transition-all duration-200 text-[10px] {{ Route::is('servicios.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-cogs text-green-400 text-xs w-3"></i>
                            <span class="ml-1">Servicios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profesionales.index') }}" class="flex items-center py-1 px-2 pl-4 rounded-lg transition-all duration-200 text-[10px] {{ Route::is('profesionales.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-user-graduate text-purple-400 text-xs w-3"></i>
                            <span class="ml-1">Profesionales</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-1">
                <p class="text-[9px] uppercase text-gray-400 font-semibold px-2">Administración</p>
                <ul>
                    <li>
                        <a href="{{ route('proveedor.subcuentas') }}" class="flex items-center py-1 px-2 pl-4 rounded-lg transition-all duration-200 text-[10px] {{ Route::is('proveedor.subcuentas') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-key text-red-400 text-xs w-3"></i>
                            <span class="ml-1">Subcuentas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('proveedor.usuarios.index') }}" class="flex items-center py-1 px-2 pl-4 rounded-lg transition-all duration-200 text-[10px] {{ Route::is('proveedor.usuarios') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-users text-cyan-400 text-xs w-3"></i>
                            <span class="ml-1">Usuarios</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
