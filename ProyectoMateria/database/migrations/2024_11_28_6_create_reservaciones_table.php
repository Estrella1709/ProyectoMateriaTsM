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
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id('id_reservacion');
            $table->unsignedBigInteger('id_vuelo')->nullable();
            $table->unsignedBigInteger('id_hotel')->nullable();
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->dateTime('fecha_reservacion');
            $table->decimal('total_a_pagar', 10, 2);
            $table->timestamps();
            
            $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos');
            $table->foreign('id_hotel')->references('id_hotel')->on('hoteles');
            $table->foreign('id_estado')->references('id_estado')->on('estado');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
