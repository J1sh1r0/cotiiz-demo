@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
  <div class="max-w-7xl mx-auto">
    
    <!-- Encabezado compacto -->
    <div class="flex justify-between items-center mb-8">
      <div>
        <h1 class="text-2xl font-semibold text-gray-800">
          <span class="text-blue-600">Cotiiz</span> Dashboard
        </h1>
        <p class="text-gray-500 text-sm">Panel de control principal</p>
      </div>
      <div class="text-sm text-gray-500">
        Versión 2.1.0
      </div>
    </div>

    <!-- Sección horizontal principal -->
    <div class="flex flex-col lg:flex-row gap-6">
      
      <!-- Tarjetas de acceso rápido -->
      <div class="lg:w-1/3">
        <div class="bg-white rounded-xl shadow-sm p-6 h-full">
          <h2 class="font-medium text-gray-700 mb-4">Accesos rápidos</h2>
          
          <div class="grid grid-cols-2 gap-4">
            <!-- Comprador -->
            <a href="{{ route('comprador.solicitudes') }}" 
               class="p-4 border rounded-lg hover:border-blue-300 hover:bg-blue-50 transition flex flex-col items-center">
              <div class="text-blue-500 mb-2">
                <i class="fas fa-shopping-cart text-2xl"></i>
              </div>
              <span class="text-sm font-medium">Comprador</span>
            </a>
            
            <!-- Proveedor -->
            <a href="{{ route('proveedor.solicitudes') }}" 
               class="p-4 border rounded-lg hover:border-purple-300 hover:bg-purple-50 transition flex flex-col items-center">
              <div class="text-purple-500 mb-2">
                <i class="fas fa-box-open text-2xl"></i>
              </div>
              <span class="text-sm font-medium">Proveedor</span>
            </a>
            
            <!-- Profesional -->
            <a href="{{ route('profesional.servicios') }}" 
               class="p-4 border rounded-lg hover:border-green-300 hover:bg-green-50 transition flex flex-col items-center">
              <div class="text-green-500 mb-2">
                <i class="fas fa-user-tie text-2xl"></i>
              </div>
              <span class="text-sm font-medium">Profesional</span>
            </a>
            
            <!-- Configuración -->
            <a href="#" 
               class="p-4 border rounded-lg hover:border-gray-300 hover:bg-gray-50 transition flex flex-col items-center">
              <div class="text-gray-500 mb-2">
                <i class="fas fa-cog text-2xl"></i>
              </div>
              <span class="text-sm font-medium">Configuración</span>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Métricas -->
      <div class="lg:w-2/3">
        <div class="bg-white rounded-xl shadow-sm p-6 h-full">
          <h2 class="font-medium text-gray-700 mb-4">Métricas clave</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Empresas -->
            <div class="border rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-500">Empresas</p>
                  <p class="text-2xl font-semibold mt-1">{{ $empresas ?? 0 }}</p>
                </div>
                <div class="text-blue-500 bg-blue-50 p-3 rounded-full">
                  <i class="fas fa-building"></i>
                </div>
              </div>
              <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-blue-500 rounded-full" style="width: 70%"></div>
              </div>
            </div>
            
            <!-- Proveedores -->
            <div class="border rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-500">Proveedores</p>
                  <p class="text-2xl font-semibold mt-1">{{ $proveedores ?? 0 }}</p>
                </div>
                <div class="text-purple-500 bg-purple-50 p-3 rounded-full">
                  <i class="fas fa-truck"></i>
                </div>
              </div>
              <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-purple-500 rounded-full" style="width: 55%"></div>
              </div>
            </div>
            
            <!-- Solicitudes -->
            <div class="border rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-500">Solicitudes</p>
                  <p class="text-2xl font-semibold mt-1">{{ $solicitudes ?? 0 }}</p>
                </div>
                <div class="text-green-500 bg-green-50 p-3 rounded-full">
                  <i class="fas fa-file-alt"></i>
                </div>
              </div>
              <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-green-500 rounded-full" style="width: 40%"></div>
              </div>
            </div>
          </div>
          
          <!-- Gráfico simple (placeholder) -->
          <div class="mt-6 border rounded-lg p-4 bg-gray-50">
            <div class="flex justify-between items-center mb-3">
              <h3 class="text-sm font-medium text-gray-700">Actividad reciente</h3>
              <span class="text-xs text-gray-500">Últimos 7 días</span>
            </div>
            <div class="h-40 flex items-end space-x-1">
              <div class="w-full bg-blue-200 rounded-t" style="height: 30%"></div>
              <div class="w-full bg-blue-300 rounded-t" style="height: 50%"></div>
              <div class="w-full bg-blue-400 rounded-t" style="height: 70%"></div>
              <div class="w-full bg-blue-500 rounded-t" style="height: 90%"></div>
              <div class="w-full bg-blue-400 rounded-t" style="height: 60%"></div>
              <div class="w-full bg-blue-300 rounded-t" style="height: 40%"></div>
              <div class="w-full bg-blue-200 rounded-t" style="height: 20%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection