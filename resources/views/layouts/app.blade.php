<!DOCTYPE html>
<html lang="es">

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotiiz Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Contenedor principal -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-5">
            <div class="text-center mb-5">
                <img src="{{ asset('images/CotiizNFondo.png') }}" alt="Cotiiz Logo" class="w-40 mx-auto">
            </div>

            <!-- Perfil seleccionado -->
            <div class="text-center text-sm bg-gray-800 p-3 rounded mb-4">
                <p class="text-gray-400">Perfil seleccionado:</p>
                <p class="font-bold text-white">
                    {{ ucfirst(session('perfil', 'No seleccionado')) }}
                </p>
                <a href="{{ route('seleccion.perfil') }}" class="block text-blue-300 text-sm hover:underline mt-2">
                    Cambiar perfil
                </a>
            </div>

            <!-- Navegación dinámica -->
            <nav>
                <ul class="space-y-2">

                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="block py-2 px-4 rounded {{ Route::is('dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                            🏠 Dashboard
                        </a>
                    </li>

                    <!-- Menú para Compradores -->
                    @if (session('perfil') === 'comprador')
                        <li>
                            <a href="{{ route('comprador.solicitudes') }}"
                                class="block py-2 px-4 rounded {{ Route::is('comprador.solicitudes') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                📝 Crear Solicitud
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('comprador.usuarios') }}"
                                class="block py-2 px-4 rounded {{ Route::is('comprador.usuarios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                👥 Ver Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('comprador.subcuentas') }}"
                                class="block py-2 px-4 rounded {{ Route::is('comprador.subcuentas') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                🔑 Subcuentas
                            </a>
                        </li>
                    @endif

                    <!-- Menú para Proveedores -->
                    @if (session('perfil') === 'proveedor')
                        <li>
                            <a href="{{ route('proveedor.solicitudes') }}"
                                class="block py-2 px-4 rounded {{ Route::is('proveedor.solicitudes') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                📋 Solicitudes Recibidas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.catalogo.productos') }}"
                                class="block py-2 px-4 rounded {{ Route::is('proveedor.catalogo.productos') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                🛒 Productos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.catalogo.servicios') }}"
                                class="block py-2 px-4 rounded {{ Route::is('proveedor.catalogo.servicios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                ⚙️ Servicios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.catalogo.profesionales') }}"
                                class="block py-2 px-4 rounded {{ Route::is('proveedor.catalogo.profesionales') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                🎓 Profesionales
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.usuarios') }}"
                                class="block py-2 px-4 rounded {{ Route::is('proveedor.usuarios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                👥 Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('proveedor.subcuentas') }}"
                                class="block py-2 px-4 rounded {{ Route::is('proveedor.subcuentas') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                🔑 Subcuentas
                            </a>
                        </li>
                    @endif

                    <!-- Menú para Profesionales -->
                    @if (session('perfil') === 'profesional')
                        <li>
                            <a href="{{ route('profesional.servicios') }}"
                                class="block py-2 px-4 rounded {{ Route::is('profesional.servicios') ? 'bg-blue-500 text-white' : 'hover:bg-gray-700' }}">
                                ⚙️ Servicios
                            </a>
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

            <!-- Contenido dinámico -->
            <div>
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>
