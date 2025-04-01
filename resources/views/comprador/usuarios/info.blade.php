<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h4 class="font-semibold text-gray-700">Información Personal</h4>
            <div class="mt-2 space-y-2">
                <p><span class="font-medium">Nombre:</span> {{ $usuario->firstname }} {{ $usuario->lastname }}</p>
                <p><span class="font-medium">Email:</span> {{ $usuario->email }}</p>
                <p><span class="font-medium">Teléfono:</span> {{ $usuario->phone }}</p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold text-gray-700">Tipo de Usuario</h4>
            <div class="mt-2">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                    {{ $usuario->user_type ?? 'Secundario' }}
                </span>
            </div>
        </div>
    </div>

    @if($usuario->created_at)
    <div class="pt-4 border-t">
        <p class="text-sm text-gray-500">Registrado el: {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
    </div>
    @endif
</div>
