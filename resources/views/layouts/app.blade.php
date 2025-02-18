<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cotiiz Demo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Cotiiz Demo</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/empresas') }}">Empresas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/proveedores') }}">Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/servicios') }}">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/solicitudes') }}">Solicitudes</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center mt-4">
        <p>&copy; {{ date('Y') }} Cotiiz Demo - Todos los derechos reservados</p>
    </footer>
</body>
</html>
