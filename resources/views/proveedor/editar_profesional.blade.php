@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Profesional</h1>

    <form action="{{ route('profesionales.update', $profesional->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2">Nombre:</label>
        <input type="text" name="nombre" value="{{ $profesional->nombre }}" class="w-full p-2 border rounded">

        <label class="block mt-4 mb-2">Especialidad:</label>
        <input type="text" name="especialidad" value="{{ $profesional->especialidad }}" class="w-full p-2 border rounded">

        <label class="block mt-4 mb-2">Experiencia (Años):</label>
        <input type="number" name="experiencia" value="{{ $profesional->experiencia }}" class="w-full p-2 border rounded">

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Profesional</button>
        </div>
    </form>
</div>
@endsection
