@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen text-center">
    <h1 class="text-6xl font-bold text-gray-800">404</h1>
    <p class="text-xl text-gray-600 mt-2">Página no encontrada</p>
    <p class="text-gray-500 mt-1">Lo sentimos, la página que buscas no existe o ha sido eliminada.</p>
    <a href="{{ route('dashboard') }}" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Volver al inicio</a>
</div>
@endsection
