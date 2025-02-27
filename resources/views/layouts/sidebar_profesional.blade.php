<div class="bg-gray-900 text-white w-64 min-h-screen p-5">
    <h3 class="text-xl font-bold mb-4">🎓 Profesional</h3>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('profesional.servicios') }}" 
               class="block py-2 px-4 rounded {{ Route::is('profesional.servicios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                ⚙️ Mis Servicios
            </a>
        </li>
    </ul>
</div>
