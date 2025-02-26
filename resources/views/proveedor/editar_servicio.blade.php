@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Servicio</h1>

    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2">Nombre del Servicio:</label>
        <input type="text" name="nombre" value="{{ $servicio->nombre }}" class="w-full p-2 border rounded">

        <label class="block mt-4 mb-2">Descripción:</label>
        <textarea name="descripcion" class="w-full p-2 border rounded">{{ $servicio->descripcion }}</textarea>

        <label class="block mt-4 mb-2">Costo Aproximado:</label>
        <input type="number" name="precio" value="{{ $servicio->precio }}" class="w-full p-2 border rounded">

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Servicio</button>
        </div>
    </form>
</div>
@endsection
