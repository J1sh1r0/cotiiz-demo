<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Usando paginación para mejorar la carga de productos
        $productos = Producto::paginate(10); // 10 productos por página
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create'); // Vista para crear el producto
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,bmp,tiff|max:2048',
        ]);

        // Crear un nuevo producto
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->estatus = 'Pendiente'; // Establecer estatus predeterminado

        // Manejo de la imagen (subida y almacenamiento con nombre único)
        if ($request->hasFile('foto')) {
            $producto->foto = $request->file('foto')->storeAs(
                'productos', 
                uniqid() . '.' . $request->file('foto')->extension(), // nombre único para evitar conflictos
                'public'
            );
        }

        // Guardar el producto en la base de datos
        $producto->save();

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

        // Ver un producto en detalle
        public function show($id)
        {
            $producto = Producto::findOrFail($id);
            return view('productos.show', compact('producto'));
        }
    
        // Editar un producto
        public function edit($id)
        {
            $producto = Producto::findOrFail($id);
            return view('productos.edit', compact('producto'));
        }
    
        // Actualizar un producto
        public function update(Request $request, $id)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'precio' => 'required|numeric',
                'descripcion' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,bmp,tiff|max:2048',
            ]);
    
            $producto = Producto::findOrFail($id);
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->descripcion = $request->descripcion;
    
            // Actualizar la foto
            if ($request->hasFile('foto')) {
                $producto->foto = $request->file('foto')->storeAs('productos', uniqid() . '.' . $request->file('foto')->extension(), 'public');
            }
    
            $producto->save();
    
            return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
        }
    
        // Eliminar un producto
        public function destroy($id)
        {
            $producto = Producto::findOrFail($id);
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
        }
}