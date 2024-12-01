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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id('id_vuelo');
            $table->unsignedBigInteger('id_origen');
            $table->unsignedBigInteger('id_destino');
            $table->unsignedBigInteger('id_aerolinea');
            $table->date('fecha_salida');
            $table->date('fecha_regreso')->nullable();
            $table->time('horario_salida');
            $table->time('horario_llegada');
            $table->integer('capacidad');
            $table->integer('pasajeros');
            $table->decimal('precio', 10, 2);
            $table->string('escalas', 250)->nullable();
            $table->integer('disponibilidad_asientos');
            $table->timestamps();
        
            // Claves foráneas
            $table->foreign('id_origen')->references('id_ubicacion')->on('ubicaciones')->onDelete('cascade');
            $table->foreign('id_destino')->references('id_ubicacion')->on('ubicaciones')->onDelete('cascade');
            $table->foreign('id_aerolinea')->references('id_aerolinea')->on('aerolineas')->onDelete('cascade');
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
