@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">{{ $solicitud->titulo }}</h1>
                <p class="text-gray-600">Creada el {{ $solicitud->created_at->format('d/m/Y') }}</p>
            </div>
            <a href="{{ route('comprador.solicitudes') }}" class="text-blue-500 hover:text-blue-700">
                ← Volver a solicitudes
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Encabezado del chat -->
            <div class="bg-gray-50 px-6 py-4 border-b">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold">Chat de la solicitud</h2>
                    <span
                        class="px-3 py-1 rounded-full text-sm font-medium
                    {{ $solicitud->estado == 'pendiente'
                        ? 'bg-yellow-100 text-yellow-800'
                        : ($solicitud->estado == 'aprobado'
                            ? 'bg-green-100 text-green-800'
                            : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($solicitud->estado) }}
                    </span>
                </div>
            </div>

            <!-- Cuerpo del chat -->
            <div class="p-6 space-y-6">
                <!-- Historial de mensajes -->
                <div class="space-y-4">
                    <!-- Ejemplo de mensaje de proveedor -->
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="ri-user-3-line text-blue-500"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <p class="font-medium">Proveedor B</p>
                                    <span class="text-xs text-gray-500">Hace 2 días</span>
                                </div>
                                <p class="mt-1">Precio por unidad: $35,000 MXN</p>
                                <p class="mt-1">Tiempo de entrega: 3 semanas</p>
                                <div class="mt-2">
                                    <a href="#" class="text-blue-500 text-sm flex items-center">
                                        <i class="ri-file-text-line mr-1"></i> Cotización 2.pdf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ejemplo de mensaje del usuario -->
                    <div class="flex items-start gap-3 flex-row-reverse">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="ri-user-3-line text-green-500"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-blue-50 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <p class="font-medium">Tú</p>
                                    <span class="text-xs text-gray-500">Hace 1 día</span>
                                </div>
                                <p class="mt-1">¿Podrían incluir el software de desarrollo en el precio?</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ejemplo de otro proveedor -->
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                            <i class="ri-user-3-line text-purple-500"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <p class="font-medium">Proveedor C</p>
                                    <span class="text-xs text-gray-500">Hace 1 hora</span>
                                </div>
                                <p class="mt-1">Precio por unidad: $33,800 MXN</p>
                                <p class="mt-1">Tiempo de entrega: 4 semanas</p>
                                <div class="mt-2">
                                    <a href="#" class="text-blue-500 text-sm flex items-center">
                                        <i class="ri-file-text-line mr-1"></i> Cotización 3.pdf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario para nuevo mensaje -->
                <div class="border-t pt-4">
                    <form action="#" method="POST">
                        @csrf
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="ri-user-3-line text-green-500"></i>
                            </div>
                            <div class="flex-1 space-y-3">
                                <textarea name="mensaje" rows="3"
                                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                    placeholder="Escribe tu mensaje..."></textarea>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="file" class="hidden" id="file-upload">
                                            <span class="text-gray-500 hover:text-gray-700">
                                                <i class="ri-attachment-line mr-1"></i> Adjuntar archivo
                                            </span>
                                        </label>
                                    </div>
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center">
                                        <i class="ri-send-plane-line mr-2"></i> Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sección de cotizaciones -->
        <div class="mt-8 bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b">
                <h2 class="text-lg font-semibold">Cotizaciones recibidas</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Cotización 1 -->
                    <div class="border rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-medium">Proveedor B</p>
                                <p class="text-sm text-gray-500">Enviada el 15/03/2023</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">
                                    <i class="ri-download-line"></i>
                                </a>
                                <a href="#" class="text-green-500 hover:text-green-700">
                                    <i class="ri-chat-3-line"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mt-2 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Precio unitario</p>
                                <p class="font-medium">$35,000 MXN</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tiempo de entrega</p>
                                <p class="font-medium">3 semanas</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cotización 2 -->
                    <div class="border rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-medium">Proveedor C</p>
                                <p class="text-sm text-gray-500">Enviada el 16/03/2023</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">
                                    <i class="ri-download-line"></i>
                                </a>
                                <a href="#" class="text-green-500 hover:text-green-700">
                                    <i class="ri-chat-3-line"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mt-2 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Precio unitario</p>
                                <p class="font-medium">$33,800 MXN</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tiempo de entrega</p>
                                <p class="font-medium">4 semanas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
