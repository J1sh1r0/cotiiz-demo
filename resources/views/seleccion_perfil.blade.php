<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Perfil | Cotiiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        /* Fondo de partículas interactivo */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a192f 0%, #172a45 100%);
            z-index: -1;
        }

        /* Tarjeta profesional */
        .professional-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(10, 25, 47, 0.3);
            padding: 1.5rem;
            width: 100%;
            max-width: 32rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(5px);
            margin: 1rem;
        }
        
        @media (min-width: 640px) {
            .professional-card {
                padding: 2.5rem;
            }
        }

        .professional-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(10, 25, 47, 0.4);
        }

        /* Botones profesionales */
        .pro-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: white;
            text-align: left;
            border: none;
            box-shadow: 0 4px 15px rgba(10, 25, 47, 0.2);
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
            font-size: 0.9rem;
        }
        
        @media (min-width: 640px) {
            .pro-btn {
                padding: 1.25rem 2rem;
                gap: 1rem;
                font-size: 1rem;
            }
        }

        .pro-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255,255,255,0.1), rgba(255,255,255,0.3), rgba(255,255,255,0.1));
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .pro-btn:hover::after {
            transform: translateX(100%);
        }

        .pro-btn i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
            min-width: 1.25rem;
        }
        
        @media (min-width: 640px) {
            .pro-btn i {
                font-size: 1.25rem;
            }
        }

        .pro-btn:hover i {
            transform: scale(1.1);
        }        
        .pro-btn span:last-child {
            font-size: 0.7rem;
            white-space: nowrap;
        }
        
        @media (min-width: 640px) {
            .pro-btn span:last-child {
                font-size: 0.75rem;
            }
        }
        /* Variantes de botones */
        .pro-btn-comprador {
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
        }

        .pro-btn-proveedor {
            background: linear-gradient(135deg, #1a56a1 0%, #2563eb 100%);
        }

        .pro-btn-profesional {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }

        /* Animaciones */
        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .card-entrance {
            animation: cardEntrance 0.8s ease-out forwards;
        }

        /* Efectos de texto */
        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6);
            border-radius: 3px;
        }
        
        /* Ajustes para móviles */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
                align-items: flex-start;
                min-height: 100vh;
                padding-top: 2rem;
            }
            
            .professional-card {
                margin-top: 2rem;
            }
            
            h1 {
                font-size: 1.75rem;
            }
            
            .pro-btn {
                flex-wrap: wrap;
                padding: 0.9rem 1.2rem;
            }
            
            .pro-btn span:last-child {
                margin-left: auto;
                margin-right: 0;
            }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 sm:p-6 font-sans antialiased">

    <!-- Fondo de partículas interactivo -->
    <div id="particles-js"></div>

    <!-- Contenedor principal -->
    <div class="professional-card card-entrance">
        <!-- Logo -->
        <div class="mb-6 sm:mb-8 flex justify-center">
            <img src="{{ asset('images/CotiizNFondo.png') }}" alt="Cotiiz Logo" 
                 class="w-32 sm:w-40 transition-transform duration-300 hover:scale-105">
        </div>

        <h1 class="text-2xl sm:text-3xl font-bold text-center mb-2 text-gray-800">
            <span class="section-title">Selecciona tu perfil</span>
        </h1>

        <p class="text-center text-gray-600 mb-6 sm:mb-8 text-sm sm:text-base">Accede a las herramientas específicas para tu rol</p>

        <form action="{{ route('guardar.perfil') }}" method="POST" class="space-y-3 sm:space-y-4">
            @csrf

            <!-- Botón Comprador -->
            <button type="submit" name="perfil" value="comprador"
                class="pro-btn pro-btn-comprador">
                <i class="fas fa-building"></i>
                <span class="flex-1">Comprador / Empresa</span>
                <span class="text-xs bg-white bg-opacity-20 px-2 py-1 rounded-full">Pruebas de compras</span>
            </button>

            <!-- Botón Empresa prueba -->
            <button type="submit" name="perfil" value="empresa_prueba"
                class="pro-btn pro-btn-profesional">
                <i class="fas fa-user-tie"></i>
                <span class="flex-1">Empresa prueba</span>
                <span class="text-xs bg-white bg-opacity-20 px-2 py-1 rounded-full">Servicios expertos</span>
            </button>

            <!-- Botón Proveedor -->
            <button type="submit" name="perfil" value="proveedor"
                class="pro-btn pro-btn-proveedor">
                <i class="fas fa-boxes"></i>
                <span class="flex-1">Proveedor</span>
                <span class="text-xs bg-white bg-opacity-20 px-2 py-1 rounded-full">Panel de ventas</span>
            </button>

            <!-- Botón Profesional 
            <button type="submit" name="perfil" value="profesional"
                class="pro-btn pro-btn-profesional">
                <i class="fas fa-user-tie"></i>
                <span class="flex-1">Profesional Especializado</span>
                <span class="text-xs bg-white bg-opacity-20 px-2 py-1 rounded-full">Servicios expertos</span>
            </button>-->
        </form>
    </div>

    <script>
        // Configuración de partículas.js
        document.addEventListener("DOMContentLoaded", function() {
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#3b82f6"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 2,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#3b82f6",
                        "opacity": 0.3,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": true,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 0.8
                            }
                        },
                        "push": {
                            "particles_nb": 4
                        }
                    }
                },
                "retina_detect": true
            });
        });
    </script>
</body>
</html>