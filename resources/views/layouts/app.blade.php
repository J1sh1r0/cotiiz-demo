<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotiiz Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-900 text-white p-5">
            <div class="text-center mb-5">
                <img src="{{ asset('images/CotiizNFondo.png') }}" alt="Cotiiz Logo" class="w-32 mx-auto">
            </div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded bg-blue-500 text-white">🏠 Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('empresas.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">🏢 Empresas</a>
                    </li>
                    <li>
                        <a href="{{ route('proveedores.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">📦 Proveedores</a>
                    </li>
                    <li>
                        <a href="{{ route('solicitudes.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">📝 Solicitudes</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <header class="flex justify-between items-center mb-5">
                <h1 class="text-2xl font-bold">Bienvenido a <span class="text-blue-500">Cotiiz Demo</span></h1>
                <div class="flex items-center gap-3">
                    <span class="text-yellow-500">🔔</span>
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">👤</div>
                </div>
            </header>

            <!-- Aquí se inyectará el contenido de cada vista -->
            <div>
                @yield('content')
            </div>

        </main>
    </div>

</body>
</html>
