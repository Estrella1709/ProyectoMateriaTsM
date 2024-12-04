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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('id_reporte');
            $table->unsignedBigInteger('id_usuario');
            $table->enum('tipo_reporte', ['vuelos', 'hoteles', 'clientes']);
            $table->enum('estado_reporte', ['pendiente', 'resuelto']);
            $table->string('titulo_reporte');
            $table->text('contenido_reporte');
            $table->timestamps();
            
            $table->foreign('id_usuario')->references('id_usuarios')->on('usuarios')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
