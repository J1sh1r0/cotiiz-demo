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
            
            <!-- Mostrar perfil actual -->
            <div class="text-center text-sm bg-gray-800 p-3 rounded mb-4">
                <p class="text-gray-400">Perfil seleccionado:</p>
                <p class="font-bold text-white">
                    {{ ucfirst(session('perfil', 'No seleccionado')) }}
                </p>
                <a href="{{ route('seleccion.perfil') }}" class="block text-blue-300 text-sm hover:underline mt-2">
                    Cambiar perfil
                </a>
            </div>

            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded bg-blue-500 text-white">🏠 Dashboard</a>
                    </li>

                    @if(session('perfil') === 'comprador')
                        <li>
                            <a href="{{ route('comprador.solicitudes') }}" class="block py-2 px-4 rounded hover:bg-gray-700">📝 Crear Solicitud</a>
                        </li>
                        <li>
                            <a href="{{ route('comprador.usuarios') }}" class="block py-2 px-4 rounded hover:bg-gray-700">👥 Ver Usuarios</a>
                        </li>
                        <li>
                            <a href="{{ route('comprador.subcuentas') }}" class="block py-2 px-4 rounded hover:bg-gray-700">🔑 Subcuentas</a>
                        </li>
                    @endif

                    @if(session('perfil') === 'proveedor')
                        <li>
                            <a href="{{ route('proveedor.solicitudes') }}" class="block py-2 px-4 rounded hover:bg-gray-700">📋 Solicitudes Recibidas</a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.catalogo_productos') }}" class="block py-2 px-4 rounded hover:bg-gray-700">🛒 Productos</a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.catalogo_servicios') }}" class="block py-2 px-4 rounded hover:bg-gray-700">⚙️ Servicios</a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.catalogo_profesionales') }}" class="block py-2 px-4 rounded hover:bg-gray-700">🎓 Profesionales</a>
                        </li>
                    @endif

                    @if(session('perfil') === 'profesional')
                        <li>
                            <a href="{{ route('profesional.servicios') }}" class="block py-2 px-4 rounded hover:bg-gray-700">⚙️ Servicios</a>
                        </li>
                    @endif
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
