<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // Importa el controlador de productos

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Agrupando rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index'); // Listar productos
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create'); // Crear producto
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store'); // Guardar producto
    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit'); // Editar producto
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update'); // Actualizar producto
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy'); // Eliminar producto
    Route::patch('/productos/{id}/estado', [ProductoController::class, 'toggleEstado'])->name('productos.toggleEstado');//Botón para cambio de estado
});
