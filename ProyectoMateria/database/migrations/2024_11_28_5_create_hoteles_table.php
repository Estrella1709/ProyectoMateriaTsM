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
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id('id_hotel');
            $table->string('nombre_hotel', 100);
            $table->decimal('calificacion_usuarios',5,2);
            $table->integer('estrellas');
            $table->string('descripcion', 255);
            $table->integer('capacidad');
            $table->integer('numero_huespedes')->nullable();
            $table->unsignedBigInteger('ubicacion');
            $table->decimal('precio_noche', 10, 2);
            $table->integer('disponibilidad_habitaciones');
            $table->boolean('wifi');
            $table->boolean('piscina');
            $table->boolean('desayuno');
            $table->decimal('distancia_al_centro', 5, 2);
            $table->date('fecha_desde')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->integer('numero_habitaciones')->nullable();
            $table->timestamps();
        
            $table->foreign('ubicacion')->references('id_ubicacion')->on('ubicaciones');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteles');
    }
};
