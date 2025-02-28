<?php

namespace App\Http\Controllers;

use App\Models\Productos;  
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = Productos::query();

        // Filtrar por categoría si se seleccionó alguna
        if ($request->has('categoria') && $request->categoria != '') {
            $productos->where('categoria', $request->categoria);
        }

        // Filtrar por búsqueda si se proporcionó
        if ($request->has('search')) {
            $productos->where('titulo', 'like', '%' . $request->search . '%');
        }

        // Ordenar según el parámetro 'order', por defecto ordena por título
        $order = $request->get('order', 'asc'); // Valor por defecto 'asc'
        $productos->orderBy('created_at', $order); // Ordenar por la fecha de creación


        // Obtener productos con paginación
        $productos = $productos->paginate(10);

        return view('productos.index', compact('productos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fotografia' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp',
            'categoria' => 'required|string|max:255',  // Campo categoría ya como string
            'estado' => 'required|boolean', // Estado del producto (disponible o no)
        ]);

        // Guardar la fotografía si se ha subido
        if ($request->hasFile('fotografia')) {
            $fotografiaPath = $request->file('fotografia')->store('fotografias', 'public');
        } else {
            $fotografiaPath = null;
        }

        // Crear el producto en la base de datos
        Productos::create([  // Asegúrate de usar "Productos" en lugar de "Producto"
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'fotografia' => $fotografiaPath,
            'categoria' => $validated['categoria'],  // Campo categoría
            'estado' => $validated['estado'], // Estado del producto
            'usuario_id' => auth()->id(), // Asume que el usuario está autenticado
        ]);

        // Redirigir al listado de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar un producto específico
        $producto = Productos::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el producto para editarlo
        $producto = Productos::findOrFail($id);

        // Pasar el producto a la vista 'edit'
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los datos del formulario de edición
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fotografia' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp',
            'categoria' => 'required|string|max:255',  // Campo categoría ya como string
            'estado' => 'required|boolean',
        ]);

        // Obtener el producto a editar
        $producto = Productos::findOrFail($id);

        // Si se ha subido una nueva fotografía, guarda la nueva imagen
        if ($request->hasFile('fotografia')) {
            $fotografiaPath = $request->file('fotografia')->store('fotografias', 'public');
        } else {
            $fotografiaPath = $producto->fotografia;
        }

        // Actualiza los datos del producto
        $producto->update([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'fotografia' => $fotografiaPath,
            'categoria' => $validated['categoria'],  // Campo categoría
            'estado' => $validated['estado'], // Estado del producto
        ]);

        // Redirigir al listado de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Toggle the estado (availability) of the product.
     */
    public function toggleEstado($id)
    {
        // Buscar el producto
        $producto = Productos::findOrFail($id);
    
        // Cambiar el estado del producto
        $producto->estado = !$producto->estado;
    
        // Guardar los cambios
        $producto->save();
    
        // Redirigir con mensaje de éxito
        return redirect()->to(url()->previous())->with('success', 'Estado del producto actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimina el producto
        $producto = Productos::findOrFail($id);
        $producto->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
