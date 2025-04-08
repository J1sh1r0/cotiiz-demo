@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
  <div class="max-w-7xl mx-auto">

    <!-- Card horizontal de bienvenida mejorada -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-xl shadow-lg overflow-hidden mb-8">
      <div class="p-6 md:p-8 flex flex-col md:flex-row items-center justify-between">
        <div class="text-white mb-4 md:mb-0">
          <h2 class="text-2xl md:text-3xl font-bold mb-2">¡Bienvenido a Demo Cotiiz!</h2>
          <p class="opacity-90 text-lg">Gestiona tus cotizaciones, proveedores y solicitudes en un solo lugar</p>
        </div>
        <div class="bg-white bg-opacity-20 rounded-lg px-4 py-3 flex items-center hover:bg-opacity-30 transition">
          <i class="fas fa-rocket text-white text-xl md:text-2xl mr-3"></i>
          <span class="text-white font-medium">Nuevas funciones disponibles</span>
        </div>
      </div>
    </div>

    <!-- Sección de accesos rápidos en una sola línea -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-8">
  <h2 class="text-xl font-semibold text-gray-800 mb-6">Accesos rápidos</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Comprador -->
    <form action="{{ route('guardar.perfil') }}" method="POST" 
          class="group w-full border-2 border-gray-100 rounded-xl hover:border-blue-300 hover:shadow-md transition-all">
      @csrf
      <input type="hidden" name="perfil" value="comprador">
      <button type="submit" class="w-full p-5 flex items-center">
        <div class="text-blue-500 text-3xl mr-4 group-hover:text-blue-600 transition">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="flex-1 text-left">
          <h3 class="text-lg font-medium text-gray-800 mb-1">Comprador</h3>
          <p class="text-gray-500 text-sm">Gestiona solicitudes y usuarios</p>
        </div>
        <div class="text-blue-500 text-sm font-medium opacity-0 group-hover:opacity-100 transition flex items-center">
          Acceder <i class="fas fa-arrow-right ml-1 text-xs"></i>
        </div>
      </button>
    </form>

    <!-- Proveedor -->
    <form action="{{ route('guardar.perfil') }}" method="POST" 
          class="group w-full border-2 border-gray-100 rounded-xl hover:border-purple-300 hover:shadow-md transition-all">
      @csrf
      <input type="hidden" name="perfil" value="proveedor">
      <button type="submit" class="w-full p-5 flex items-center">
        <div class="text-purple-500 text-3xl mr-4 group-hover:text-purple-600 transition">
          <i class="fas fa-box-open"></i>
        </div>
        <div class="flex-1 text-left">
          <h3 class="text-lg font-medium text-gray-800 mb-1">Proveedor</h3>
          <p class="text-gray-500 text-sm">Responde a solicitudes</p>
        </div>
        <div class="text-purple-500 text-sm font-medium opacity-0 group-hover:opacity-100 transition flex items-center">
          Acceder <i class="fas fa-arrow-right ml-1 text-xs"></i>
        </div>
      </button>
    </form>

    <!-- Profesional -->
    <form action="{{ route('guardar.perfil') }}" method="POST" 
          class="group w-full border-2 border-gray-100 rounded-xl hover:border-green-300 hover:shadow-md transition-all">
      @csrf
      <input type="hidden" name="perfil" value="profesional">
      <button type="submit" class="w-full p-5 flex items-center">
        <div class="text-green-500 text-3xl mr-4 group-hover:text-green-600 transition">
          <i class="fas fa-user-tie"></i>
        </div>
        <div class="flex-1 text-left">
          <h3 class="text-lg font-medium text-gray-800 mb-1">Profesional</h3>
          <p class="text-gray-500 text-sm">Servicios especializados</p>
        </div>
        <div class="text-green-500 text-sm font-medium opacity-0 group-hover:opacity-100 transition flex items-center">
          Acceder <i class="fas fa-arrow-right ml-1 text-xs"></i>
        </div>
      </button>
    </form>
  </div>
</div>

    <!-- Sección de tutorial rápido -->
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">¿Cómo empezar?</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="flex items-start space-x-4 p-3 hover:bg-gray-50 rounded-lg transition">
          <div class="flex-shrink-0 bg-blue-100 text-blue-600 p-3 rounded-lg">
            <i class="fas fa-user-plus text-lg"></i>
          </div>
          <div>
            <h3 class="font-semibold text-gray-800 mb-1">1. Selecciona tu perfil</h3>
            <p class="text-gray-600 text-sm">Elige entre Comprador, Proveedor o Profesional para acceder a las funcionalidades.</p>
          </div>
        </div>
        
        <div class="flex items-start space-x-4 p-3 hover:bg-gray-50 rounded-lg transition">
          <div class="flex-shrink-0 bg-yellow-100 text-yellow-600 p-3 rounded-lg">
            <i class="fas fa-compass text-lg"></i>
          </div>
          <div>
            <h3 class="font-semibold text-gray-800 mb-1">2. Explora las funciones</h3>
            <p class="text-gray-600 text-sm">Navega por los diferentes módulos y descubre las herramientas disponibles.</p>
          </div>
        </div>
        
        <div class="flex items-start space-x-4 p-3 hover:bg-gray-50 rounded-lg transition">
          <div class="flex-shrink-0 bg-green-100 text-green-600 p-3 rounded-lg">
            <i class="fas fa-rocket text-lg"></i>
          </div>
          <div>
            <h3 class="font-semibold text-gray-800 mb-1">3. Comienza a usar</h3>
            <p class="text-gray-600 text-sm">Crea tu primera solicitud o cotización según tu perfil.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection