@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 md:p-6 max-w-6xl">
        <!-- Encabezado premium -->
<div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex-1 min-w-0">
            <!-- Título con efecto gradiente -->
            <div class="flex flex-wrap items-center gap-3 mb-2">
                <h1 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-black">
                    {{ $solicitud->titulo }}
                </h1>
                <!-- Badge de estado mejorado -->
                <span class="px-3 py-1 rounded-full text-xs md:text-sm font-semibold shadow-inner
                    {{ $solicitud->estado == 'pendiente'
                        ? 'bg-yellow-50 text-yellow-800 border border-yellow-200'
                        : ($solicitud->estado == 'aprobado'
                            ? 'bg-green-50 text-green-800 border border-green-200'
                            : 'bg-red-50 text-red-800 border border-red-200') }}">
                    {{ ucfirst($solicitud->estado) }}
                </span>
            </div>
            
            <!-- Información meta -->
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-gray-600">
                <div class="flex items-center">
                    <i class="ri-calendar-line mr-1.5 text-gray-400"></i>
                    <span>Creada el {{ $solicitud->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="flex items-center">
                    <i class="ri-time-line mr-1.5 text-gray-400"></i>
                    <span>{{ $solicitud->created_at->format('h:i A') }}</span>
                </div>
            </div>
        </div>
        
        <!-- Botón de regreso mejorado -->
        <button onclick="history.back()" 
                class="group inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
            <i class="ri-arrow-left-line mr-2 transition-transform duration-200 group-hover:-translate-x-0.5"></i>
            Regresar
        </button>
    </div>
</div>

        <!-- Contenedor principal con diseño de pestañas -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Pestañas -->
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <button id="chat-tab" class="tab-button active py-4 px-6 text-center border-b-2 font-medium text-sm border-blue-500 text-blue-600">
                        <i class="ri-chat-3-line mr-2"></i>Chat
                    </button>
                    <button id="quotations-tab" class="tab-button py-4 px-6 text-center border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        <i class="ri-file-list-2-line mr-2"></i>Cotizaciones (2)
                    </button>
                </nav>
            </div>

            <!-- Contenido de pestañas -->
            <div class="p-4 md:p-6">
                <!-- Contenido del Chat (activo por defecto) -->
                <div id="chat-content" class="tab-content active">
                    <!-- Historial de mensajes mejorado -->
                    <div class="space-y-5 max-h-[500px] overflow-y-auto pr-2 pb-4 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                        <!-- Mensaje de proveedor B -->
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="ri-user-3-line text-blue-500"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="bg-gray-50 rounded-xl p-4 shadow-sm">
                                    <div class="flex justify-between items-start">
                                        <p class="font-medium text-gray-800">Proveedor B</p>
                                        <span class="text-xs text-gray-500">Hace 2 días</span>
                                    </div>
                                    <div class="mt-2 space-y-2">
                                        <p class="text-gray-700">Precio por unidad: <span class="font-semibold">$35,000 MXN</span></p>
                                        <p class="text-gray-700">Tiempo de entrega: <span class="font-semibold">3 semanas</span></p>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 transition-colors">
                                            <i class="ri-file-text-line mr-2"></i> Cotización 2.pdf
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mensaje del usuario -->
                        <div class="flex items-start gap-4 flex-row-reverse">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                    <i class="ri-user-3-line text-green-500"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="bg-blue-50 rounded-xl p-4 shadow-sm">
                                    <div class="flex justify-between items-start">
                                        <p class="font-medium text-gray-800">Tú</p>
                                        <span class="text-xs text-gray-500">Hace 1 día</span>
                                    </div>
                                    <p class="mt-2 text-gray-700">¿Podrían incluir el software de desarrollo en el precio?</p>
                                </div>
                            </div>
                        </div>

                        <!-- Mensaje de proveedor C -->
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                                    <i class="ri-user-3-line text-purple-500"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="bg-gray-50 rounded-xl p-4 shadow-sm">
                                    <div class="flex justify-between items-start">
                                        <p class="font-medium text-gray-800">Proveedor C</p>
                                        <span class="text-xs text-gray-500">Hace 1 hora</span>
                                    </div>
                                    <div class="mt-2 space-y-2">
                                        <p class="text-gray-700">Precio por unidad: <span class="font-semibold">$33,800 MXN</span></p>
                                        <p class="text-gray-700">Tiempo de entrega: <span class="font-semibold">4 semanas</span></p>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 transition-colors">
                                            <i class="ri-file-text-line mr-2"></i> Cotización 3.pdf
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario para nuevo mensaje mejorado -->
                    <div class="border-t border-gray-200 pt-5 mt-6">
                        <form action="#" method="POST">
                            @csrf
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="ri-user-3-line text-green-500"></i>
                                    </div>
                                </div>
                                <div class="flex-1 space-y-3">
                                    <textarea name="mensaje" rows="3"
                                        class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all"
                                        placeholder="Escribe tu mensaje..."></textarea>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <label class="inline-flex items-center cursor-pointer text-gray-500 hover:text-gray-700 transition-colors">
                                                <input type="file" class="hidden" id="file-upload">
                                                <i class="ri-attachment-line mr-2"></i> Adjuntar archivo
                                            </label>
                                        </div>
                                        <button type="submit"
                                            class="bg-blue-600 text-white px-5 py-2.5 rounded-xl hover:bg-blue-700 transition-colors flex items-center shadow-sm">
                                            <i class="ri-send-plane-line mr-2"></i> Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contenido de Cotizaciones (oculto por defecto) -->
                <div id="quotations-content" class="tab-content hidden">
                    <div class="space-y-4">
                        <!-- Cotización 1 mejorada -->
                        <div class="border border-gray-200 rounded-xl p-5 hover:bg-gray-50 transition-colors shadow-sm">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
                                <div>
                                    <p class="font-medium text-gray-800">Proveedor B</p>
                                    <p class="text-sm text-gray-500">Enviada el 15/03/2023</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors p-2 rounded-full hover:bg-blue-50">
                                        <i class="ri-download-line"></i>
                                        <span class="sr-only">Descargar</span>
                                    </a>
                                    <a href="#" class="text-green-600 hover:text-green-800 transition-colors p-2 rounded-full hover:bg-green-50">
                                        <i class="ri-chat-3-line"></i>
                                        <span class="sr-only">Chat</span>
                                    </a>
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                        Aceptar cotización
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Precio unitario</p>
                                    <p class="font-medium text-lg text-gray-800">$35,000 MXN</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Tiempo de entrega</p>
                                    <p class="font-medium text-lg text-gray-800">3 semanas</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Garantía</p>
                                    <p class="font-medium text-lg text-gray-800">1 año</p>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Detalles adicionales</h4>
                                <p class="text-gray-700">Incluye instalación y capacitación básica. Pago 50% al confirmar y 50% al recibir.</p>
                            </div>
                        </div>

                        <!-- Cotización 2 mejorada -->
                        <div class="border border-gray-200 rounded-xl p-5 hover:bg-gray-50 transition-colors shadow-sm">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
                                <div>
                                    <p class="font-medium text-gray-800">Proveedor C</p>
                                    <p class="text-sm text-gray-500">Enviada el 16/03/2023</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors p-2 rounded-full hover:bg-blue-50">
                                        <i class="ri-download-line"></i>
                                        <span class="sr-only">Descargar</span>
                                    </a>
                                    <a href="#" class="text-green-600 hover:text-green-800 transition-colors p-2 rounded-full hover:bg-green-50">
                                        <i class="ri-chat-3-line"></i>
                                        <span class="sr-only">Chat</span>
                                    </a>
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                        Aceptar cotización
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Precio unitario</p>
                                    <p class="font-medium text-lg text-gray-800">$33,800 MXN</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Tiempo de entrega</p>
                                    <p class="font-medium text-lg text-gray-800">4 semanas</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Garantía</p>
                                    <p class="font-medium text-lg text-gray-800">2 años</p>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Detalles adicionales</h4>
                                <p class="text-gray-700">Incluye software de desarrollo y soporte técnico por 6 meses. Pago 30% al confirmar y 70% al recibir.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos adicionales para mejor experiencia */
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #cbd5e0;
            border-radius: 2px;
        }
        .scrollbar-thin::-webkit-scrollbar-track {
            background-color: #f1f5f9;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .tab-button.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }
    </style>

    <script>
        // Funcionalidad de pestañas
        document.addEventListener('DOMContentLoaded', function() {
            const chatTab = document.getElementById('chat-tab');
            const quotationsTab = document.getElementById('quotations-tab');
            const chatContent = document.getElementById('chat-content');
            const quotationsContent = document.getElementById('quotations-content');

            chatTab.addEventListener('click', function() {
                chatTab.classList.add('active');
                quotationsTab.classList.remove('active');
                chatContent.classList.add('active');
                chatContent.classList.remove('hidden');
                quotationsContent.classList.add('hidden');
                quotationsContent.classList.remove('active');
            });

            quotationsTab.addEventListener('click', function() {
                quotationsTab.classList.add('active');
                chatTab.classList.remove('active');
                quotationsContent.classList.add('active');
                quotationsContent.classList.remove('hidden');
                chatContent.classList.add('hidden');
                chatContent.classList.remove('active');
            });
        });
    </script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
@endsection