@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Detalle de la Solicitud</h1>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <p><strong>Título:</strong> {{ $solicitud->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $solicitud->descripcion }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($solicitud->estado) }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $solicitud->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('comprador.solicitudes') }}" class="text-blue-500 hover:underline">Volver a Solicitudes</a>
        </div>
    </div>
@endsection
