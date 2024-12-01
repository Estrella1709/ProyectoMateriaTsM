<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelesSeeder extends Seeder
{
    public function run()
    {
        // Inserta ubicaciones primero, ya que la tabla hoteles depende de esta
        DB::table('ubicaciones')->insert([
            ['nombre' => 'Centro de la ciudad', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Zona turística', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Playa', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Inserta hoteles
        DB::table('hoteles')->insert([
            [
                'nombre_hotel' => 'Hotel Paraíso',
                'calificacion_usuarios' => 4.5,
                'estrellas' => 5,
                'descripcion' => 'Hotel de lujo con vistas al mar',
                'capacidad' => 50,
                'numero_huespedes' => 2,
                'ubicacion' => 1, // ID de Centro de la ciudad
                'precio_noche' => 250.00,
                'disponibilidad_habitaciones' => 10,
                'wifi' => true,
                'piscina' => true,
                'desayuno' => true,
                'distancia_al_centro' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_hotel' => 'Hotel Aventura',
                'calificacion_usuarios' => 4.0,
                'estrellas' => 4,
                'descripcion' => 'Ideal para familias y aventuras al aire libre',
                'capacidad' => 30,
                'numero_huespedes' => 4,
                'ubicacion' => 2, // ID de Zona turística
                'precio_noche' => 150.00,
                'disponibilidad_habitaciones' => 15,
                'wifi' => true,
                'piscina' => false,
                'desayuno' => true,
                'distancia_al_centro' => 2.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_hotel' => 'Hotel Playa Blanca',
                'calificacion_usuarios' => 4.8,
                'estrellas' => 5,
                'descripcion' => 'Relájate frente al mar con servicios exclusivos',
                'capacidad' => 40,
                'numero_huespedes' => 2,
                'ubicacion' => 3, // ID de Playa
                'precio_noche' => 300.00,
                'disponibilidad_habitaciones' => 5,
                'wifi' => true,
                'piscina' => true,
                'desayuno' => false,
                'distancia_al_centro' => 10.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
