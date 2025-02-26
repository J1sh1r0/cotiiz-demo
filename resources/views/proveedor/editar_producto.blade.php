@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2">Nombre del Producto:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="w-full p-2 border rounded">

        <label class="block mt-4 mb-2">Descripción:</label>
        <textarea name="descripcion" class="w-full p-2 border rounded">{{ $producto->descripcion }}</textarea>

        <label class="block mt-4 mb-2">Precio:</label>
        <input type="number" name="precio" value="{{ $producto->precio }}" class="w-full p-2 border rounded">

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Producto</button>
        </div>
    </form>
</div>
@endsection
