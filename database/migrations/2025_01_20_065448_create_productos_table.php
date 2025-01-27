<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id(); // ID de producto
        $table->string('titulo'); // Título del producto
        $table->string('fotografia')->nullable(); // Ruta de la fotografía (opcional)
        $table->text('descripcion'); // Descripción del producto
        $table->string('categoria'); // Categoría del producto
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Relación con usuarios
        $table->boolean('estado')->default(true); // Estado del producto (disponible o no) con valor predeterminado "true" (disponible)
        $table->timestamps(); // Timestamps de creación y actualización
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
