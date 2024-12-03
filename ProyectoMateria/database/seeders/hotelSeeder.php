<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class hotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hoteles')->insert([
            [
                'nombre_hotel'=>'Hotel La misión',
                'calificacion_usuarios' => 8.2,
                'estrellas' => 4,
                'descripcion' => 'Hotal de la famliia hotel la mision',
                'capacidad' => 1500,
                'numero_huespedes' => 1100,
                'ubicacion' => 1,
                'precio_noche' => 900,
                'disponibilidad_habitaciones' => 400,
                'wifi' => 1,
                'piscina' => 1,
                'desayuno' => 0,
                'distancia_al_centro' => 5.3
            ],

            [
                'nombre_hotel' => 'Hotel Paraíso',
                'calificacion_usuarios' => 9.0,
                'estrellas' => 5,
                'descripcion' => 'Un hotel de lujo con vistas al mar.',
                'capacidad' => 500,
                'numero_huespedes' => 400,
                'ubicacion' => 2,
                'precio_noche' => 1500,
                'disponibilidad_habitaciones' => 50,
                'wifi' => 1,
                'piscina' => 0,
                'desayuno' => 1,
                'distancia_al_centro' => 2.0
            ],
            [
                'nombre_hotel' => 'Hotel El Descanso',
                'calificacion_usuarios' => 7.5,
                'estrellas' => 3,
                'descripcion' => 'Hotel acogedor ideal para familias.',
                'capacidad' => 300,
                'numero_huespedes' => 250,
                'ubicacion' => 3,
                'precio_noche' => 600,
                'disponibilidad_habitaciones' => 50,
                'wifi' => 0,
                'piscina' => 1,
                'desayuno' => 1,
                'distancia_al_centro' => 1.9
            ],
            [
                'nombre_hotel' => 'Hotel Sol y Luna',
                'calificacion_usuarios' => 8.7,
                'estrellas' => 4,
                'descripcion' => 'Un lugar perfecto para disfrutar de la naturaleza.',
                'capacidad' => 400,
                'numero_huespedes' => 300,
                'ubicacion' => 4,
                'precio_noche' => 800,
                'disponibilidad_habitaciones' => 100,
                'wifi' => 1,
                'piscina' => 1,
                'desayuno' => 0,
                'distancia_al_centro' => 8.5
            ],
            [
                'nombre_hotel' => 'Hotel Ciudad Real',
                'calificacion_usuarios' => 8.0,
                'estrellas' => 3,
                'descripcion' => 'Hotel moderno en el corazón de la ciudad.',
                'capacidad' => 600,
                'numero_huespedes' => 500,
                'ubicacion' => 5,
                'precio_noche' => 700,
                'disponibilidad_habitaciones' => 100,
                'wifi' => 1,
                'piscina' => 0,
                'desayuno' => 1,
                'distancia_al_centro' => 4.0
            ],
            [
                'nombre_hotel' => 'Hotel Montaña Verde',
                'calificacion_usuarios' => 9.5,
                'estrellas' => 5,
                'descripcion' => 'Un refugio exclusivo en las montañas.',
                'capacidad' => 20,
                'numero_huespedes' => 15,
                'ubicacion' => 5,
                'precio_noche' => 10000,
                'disponibilidad_habitaciones' => 5,
                'wifi' => 1,
                'piscina' => 1,
                'desayuno' => 1,
                'distancia_al_centro' => 150.0
            ],
        ]);
    }
}
