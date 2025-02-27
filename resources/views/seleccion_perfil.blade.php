<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu Perfil | Cotiiz Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilos generales */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
            font-family: 'Arial', sans-serif;
        }

        /* Fondo animado */
        .animated-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #e94560);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
            filter: brightness(0.9);
            z-index: -2;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Partículas flotantes */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: moveParticles linear infinite;
        }

        @keyframes moveParticles {
            0% { transform: translateY(0) scale(1); opacity: 1; }
            50% { transform: translateY(-50px) scale(1.1); opacity: 0.5; }
            100% { transform: translateY(-100px) scale(1.2); opacity: 0; }
        }

        /* Tarjeta en blanco */
        .card {
            background: #ffffff; /* Blanco sólido */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border: 2px solid rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        /* Logo centrado */
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo {
            width: 140px;
            height: auto;
        }

        /* Botones con efectos dinámicos */
        .btn {
            font-size: 1.2rem;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            width: 100%;
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
            color: white;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.15);
            transition: all 0.5s ease;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
        }

        .btn:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }

        /* Botón morado oscuro */
        .btn-morado {
            background-color: #6a0dad; /* Morado oscuro */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-morado:hover {
            background-color: #5a0c99;
            transform: scale(1.05);
        }

        /* Animación de entrada */
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Fondo animado -->
    <div class="animated-bg"></div>

    <!-- Partículas flotantes -->
    <div class="particles"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const particleContainer = document.querySelector('.particles');
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                let size = Math.random() * 6 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.top = `${Math.random() * 100}vh`;
                particle.style.left = `${Math.random() * 100}vw`;
                particle.style.animationDuration = `${Math.random() * 8 + 5}s`;
                particle.classList.add('particle');
                particleContainer.appendChild(particle);
            }
        });
    </script>

    <!-- Contenedor principal -->
    <div class="card fade-in text-center w-full max-w-md">
        
        <!-- Logo de Cotiiz centrado -->
        <div class="logo-container">
            <img src="{{ asset('images/CotiizNFondo.png') }}" alt="Cotiiz Logo" class="logo">
        </div>

        <h2 class="text-3xl font-bold mb-6 text-gray-800">Selecciona tu perfil</h2>
        <form action="{{ route('guardar.perfil') }}" method="POST" class="space-y-4">
            @csrf
            <button type="submit" name="perfil" value="comprador" 
                class="btn bg-blue-500 hover:bg-blue-600 transition-all duration-300 flex items-center justify-center gap-2">
                🛒 Comprador / Empresa
            </button>
            <button type="submit" name="perfil" value="proveedor" 
                class="btn bg-yellow-500 hover:bg-yellow-600 transition-all duration-300 flex items-center justify-center gap-2">
                📦 Proveedor
            </button>
            <button type="submit" name="perfil" value="profesional" 
                class="btn btn-morado transition-all duration-300 flex items-center justify-center gap-2">
                👨‍🔧 Profesional Especializado
            </button>
        </form>
    </div>

</body>
</html>
