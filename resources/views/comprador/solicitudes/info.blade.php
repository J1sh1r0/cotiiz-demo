<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h4 class="font-semibold text-gray-700">Información Básica</h4>
            <div class="mt-2 space-y-2">
                <p><span class="font-medium">Título:</span> {{ $solicitud->titulo ?? 'Sin título' }}</p>
                <p><span class="font-medium">Descripción:</span> {{ $solicitud->descripcion ?? 'Sin descripción' }}</p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold text-gray-700">Estado</h4>
            <div class="mt-2">
                <span class="px-3 py-1 rounded-full text-white
                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-500' :
                       ($solicitud->estado == 'aprobado' ? 'bg-green-500' : 'bg-red-500') }}">
                    {{ ucfirst($solicitud->estado) }}
                </span>
            </div>
        </div>
    </div>

    <div class="pt-4 border-t">
        <h4 class="font-semibold text-gray-700">Detalles</h4>
        <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
            <p><span class="font-medium">Fecha creación:</span> {{ $solicitud->created_at->format('d/m/Y H:i') }}</p>
            @if($solicitud->updated_at)
                <p><span class="font-medium">Última actualización:</span> {{ $solicitud->updated_at->format('d/m/Y H:i') }}</p>
            @endif
        </div>
    </div>
</div>
