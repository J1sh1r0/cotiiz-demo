@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Detalle de la Solicitud</h1>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <p><strong>Título:</strong> {{ $solicitud->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $solicitud->descripcion }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($solicitud->estado) }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $solicitud->created_at->format('d/m/Y') }}</p>

            {{-- Mostrar datos según el tipo de solicitud --}}
            @if ($solicitud->tipo === 'producto')
                <h2 class="text-xl font-semibold mt-4">Detalles del Producto</h2>
                <p><strong>Nombre:</strong> {{ $solicitud->nombre }}</p>
                <p><strong>Modelo:</strong> {{ $solicitud->modelo }}</p>
                <p><strong>Marca:</strong> {{ $solicitud->marca }}</p>
                <p><strong>Cantidad:</strong> {{ $solicitud->cantidad }}</p>
                <p><strong>Presupuesto:</strong> ${{ number_format((float) $solicitud->presupuesto, 2) }}</p>
                <p><strong>Link de drive:</strong> {{ $solicitud->link_drive }}</p>
                @elseif ($solicitud->tipo === 'servicio')
                <h2 class="text-xl font-semibold mt-4">Detalles del Servicio</h2>
                <p><strong>Tipo de Servicio:</strong> {{ $solicitud->tipo_solicitudServicio }}</p>
                <p><strong>Descripción del Servicio:</strong> {{ $solicitud->descripcion_servicio }}</p>
                <p><strong>Presupuesto Servicio:</strong> ${{ number_format($solicitud->presupuesto_servicio, 2) }}</p>
            @elseif ($solicitud->tipo === 'empleo')
                <h2 class="text-xl font-semibold mt-4">Detalles del Empleo</h2>
                <p><strong>Trabajo:</strong> {{ $solicitud->trabajo }}</p>
                <p><strong>Detalles:</strong> {{ $solicitud->detalles }}</p>
                <p><strong>Conocimientos:</strong> {{ $solicitud->conocimientos }}</p>
                <p><strong>Cursos:</strong> {{ $solicitud->cursos }}</p>
                <p><strong>Tiempo:</strong> {{ $solicitud->tiempo }}</p>
                <p><strong>Link de Drive:</strong> <a href="{{ $solicitud->link_drive }}" class="text-blue-500 hover:underline" target="_blank">Ver Documentos</a></p>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('comprador.solicitudes') }}" class="text-blue-500 hover:underline">Volver a Solicitudes</a>
        </div>
    </div>
@endsection
