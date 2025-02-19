<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotiiz Demo - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col p-5">
            <div class="flex items-center justify-center mb-6">
                <img src="{{ asset('images/CotizNFondo.png') }}" alt="Cotiiz Logo">
            </div>
            <nav class="flex-1">
                <ul class="space-y-2">
                    <li class="p-3 rounded-md flex items-center gap-2 {{ request()->is('/') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                        <span>🏠</span>
                        <a href="{{ route('dashboard') }}" class="w-full">Dashboard</a>
                    </li>
                    <li class="p-3 rounded-md flex items-center gap-2 {{ request()->is('empresas*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                        <span>🏢</span>
                        <a href="{{ route('empresas.index') }}" class="w-full">Empresas</a>
                    </li>
                    <li class="p-3 rounded-md flex items-center gap-2 {{ request()->is('proveedores*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                        <span>📦</span>
                        <a href="{{ route('proveedores.index') }}" class="w-full">Proveedores</a>
                    </li>
                    <li class="p-3 rounded-md flex items-center gap-2 {{ request()->is('solicitudes*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                        <span>📝</span>
                        <a href="{{ route('solicitudes.index') }}" class="w-full">Solicitudes</a>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <header class="flex justify-between items-center bg-white p-4 shadow-md rounded-lg">
                <h1 class="text-2xl font-bold text-gray-800">Bienvenido a <span class="text-blue-600">Cotiiz Demo</span></h1>
                <div class="flex items-center gap-4">
                    <span class="text-yellow-500 text-2xl">🔔</span>
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-700 text-xl">👤</div>
                </div>
            </header>

            <section class="grid grid-cols-3 gap-6 mt-6">
                <!-- Tarjeta Empresas -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
                    <span class="text-green-500 text-4xl">🏢</span>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Empresas</h3>
                        <p class="text-2xl font-bold text-gray-600">{{ $empresas ?? 0 }}</p>
                    </div>
                </div>

                <!-- Tarjeta Proveedores -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
                    <span class="text-blue-500 text-4xl">📦</span>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Proveedores</h3>
                        <p class="text-2xl font-bold text-gray-600">{{ $proveedores ?? 0 }}</p>
                    </div>
                </div>

                <!-- Tarjeta Solicitudes -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4">
                    <span class="text-yellow-500 text-4xl">📝</span>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Solicitudes</h3>
                        <p class="text-2xl font-bold text-gray-600">{{ $solicitudes ?? 0 }}</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
