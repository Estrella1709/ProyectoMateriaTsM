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
            $table->unsignedBigInteger('id_ubicacion');
            $table->unsignedBigInteger('id_aerolinea');
            $table->date('fecha_salida');
            $table->date('fecha_regreso');
            $table->time('horario_salida');
            $table->time('horario_llegada');
            $table->integer('capacidad');
            $table->integer('pasajeros');
            $table->decimal('precio', 10, 2);
            $table->string('escalas', 250)->nullable();
            $table->integer('disponibilidad_asientos');
            $table->timestamps();
        
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones');
            $table->foreign('id_aerolinea')->references('id_aerolinea')->on('aerolineas');
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
