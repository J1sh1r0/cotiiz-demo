@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Solicitud</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($solicitud) ? route('solicitudes.update', $solicitud->id) : '#' }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Proveedor:</label>
                <select name="proveedor_id" class="w-full p-2 rounded border">
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}"
                            {{ $solicitud->proveedor_id == $proveedor->id ? 'selected' : '' }}>
                            {{ $proveedor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Empresa:</label>
                <select name="empresa_id" class="w-full p-2 rounded border">
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}" {{ $solicitud->empresa_id == $empresa->id ? 'selected' : '' }}>
                            {{ $empresa->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Servicio:</label>
                <select name="servicio_id" class="w-full p-2 rounded border">
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}"
                            {{ $solicitud->servicio_id == $servicio->id ? 'selected' : '' }}>
                            {{ $servicio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Estado:</label>
                <select name="estado" class="w-full p-2 rounded border">
                    <option value="pendiente" {{ $solicitud->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aprobado" {{ $solicitud->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                    <option value="rechazado" {{ $solicitud->estado == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Solicitud</button>
            </div>
        </form>
    </div>
@endsection
