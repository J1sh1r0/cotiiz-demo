<div class="bg-gray-900 text-white w-64 min-h-screen p-5">
    <h3 class="text-xl font-bold mb-4">🧪 Empresa Prueba</h3>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('empresa_prueba.dashboard') }}"
               class="block py-2 px-4 rounded {{ Route::is('empresa_prueba.dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                🏠 Dashboard
            </a>
        </li>
        <li>
            <a href="#"
               class="block py-2 px-4 rounded hover:bg-gray-700">
                🧪 Funcionalidades Demo
            </a>
        </li>
        <li>
            <a href="#"
               class="block py-2 px-4 rounded hover:bg-gray-700">
                📊 Estadísticas
            </a>
        </li>
        <li>
            <a href="#"
               class="block py-2 px-4 rounded hover:bg-gray-700">
                ⚙️ Configuración
            </a>
        </li>
    </ul>
</div>
