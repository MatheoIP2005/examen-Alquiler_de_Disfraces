<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->string('disfraz', 50);
            $table->string('talla', 20);
            $table->string('cliente', 50);
            $table->string('telefono', 20);
            // Fecha de alquiler automática
            $table->timestamp('fecha_alquiler')->useCurrent();
            // Fecha que el cliente debe devolver
            $table->date('fecha_devolucion')->nullable();
            // Estado: alquilado | devuelto | atrasado
            $table->enum('estado', ['alquilado', 'devuelto', 'atrasado'])->default('alquilado');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};
