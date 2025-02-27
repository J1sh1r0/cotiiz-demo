<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu Perfil | Cotiiz Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #e94560);
            background-size: 400% 400%;
            animation: gradientBG 8s ease infinite;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center text-white">
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md fade-in">
        <h2 class="text-2xl font-bold text-center mb-4">Selecciona tu perfil</h2>
        <form action="{{ route('guardar.perfil') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid gap-4">
                <button type="submit" name="perfil" value="comprador" 
                    class="card bg-blue-600 text-white py-3 px-5 rounded-lg w-full text-lg font-semibold hover:bg-blue-700">
                    🛒 Comprador / Empresa
                </button>
                <button type="submit" name="perfil" value="proveedor" 
                    class="card bg-yellow-500 text-white py-3 px-5 rounded-lg w-full text-lg font-semibold hover:bg-yellow-600">
                    📦 Proveedor
                </button>
                <button type="submit" name="perfil" value="profesional" 
                    class="card bg-green-500 text-white py-3 px-5 rounded-lg w-full text-lg font-semibold hover:bg-green-600">
                    👨‍🔧 Profesional Especializado
                </button>
            </div>
        </form>
    </div>
</body>
</html>
