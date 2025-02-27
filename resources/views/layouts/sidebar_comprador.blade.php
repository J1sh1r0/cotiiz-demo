<div class="bg-gray-900 text-white w-64 min-h-screen p-5">
    <h3 class="text-xl font-bold mb-4">📌 Comprador</h3>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('comprador.solicitudes') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                📝 Crear Solicitud
            </a>
        </li>
        <li>
            <a href="{{ route('comprador.solicitudes') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                💬 Contestaciones
            </a>
        </li>
        <li>
            <a href="{{ route('comprador.usuarios') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                👥 Usuarios
            </a>
        </li>
        <li>
            <a href="{{ route('comprador.subcuentas') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                🔑 Subcuentas
            </a>
        </li>
    </ul>
</div>
