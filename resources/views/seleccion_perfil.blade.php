@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Selecciona tu perfil</h1>

    <form action="{{ route('guardar.perfil') }}" method="POST">
        @csrf
        <div class="flex flex-col items-center space-y-4">
            <button type="submit" name="perfil" value="comprador" class="bg-blue-500 text-white p-4 rounded-lg w-64">
                🛒 Comprador / Empresa
            </button>
            <button type="submit" name="perfil" value="proveedor" class="bg-green-500 text-white p-4 rounded-lg w-64">
                🏭 Proveedor
            </button>
            <button type="submit" name="perfil" value="profesional" class="bg-yellow-500 text-white p-4 rounded-lg w-64">
                🎓 Profesional Especializado
            </button>
        </div>
    </form>
</div>
@endsection
