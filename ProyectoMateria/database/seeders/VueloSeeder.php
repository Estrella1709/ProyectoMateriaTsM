<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VueloSeeder extends Seeder
{
    public function run()
    {
        DB::table('vuelos')->insert([
            [
                'capacidad' => 150,
                'disponibilidad_asientos' => 50,
                'escalas' => 'Sin escalas',
                'fecha_regreso' => '2024-12-15',
                'fecha_salida' => '2024-12-01',
                'horario_llegada' => '11:00:00',
                'horario_salida' => '08:30:00',
                'id_aerolinea' => 1,
                'id_origen' => 1, // Cambiado de 'id_ubicacion' a 'id_origen'
                'id_destino' => 2,
                'pasajeros' => 100,
                'precio' => 3500.5,
            ],
            [
                'capacidad' => 180,
                'disponibilidad_asientos' => 10,
                'escalas' => '1 escala',
                'fecha_regreso' => '2024-12-20',
                'fecha_salida' => '2024-12-10',
                'horario_llegada' => '12:30:00',
                'horario_salida' => '10:00:00',
                'id_aerolinea' => 2,
                'id_origen' => 3, // Cambiado de 'id_ubicacion' a 'id_origen'
                'id_destino' => 4,
                'pasajeros' => 170,
                'precio' => 2800.0,
            ],

            [
                'capacidad' => 300,
                'disponibilidad_asientos' => 10,
                'escalas' => '1 escala',
                'fecha_regreso' => '2024-12-23',
                'fecha_salida' => '2024-12-17',
                'horario_llegada' => '19:30:00',
                'horario_salida' => '10:00:00',
                'id_aerolinea' => 2,
                'id_origen' => 1, // Cambiado de 'id_ubicacion' a 'id_origen'
                'id_destino' => 5,
                'pasajeros' => 290,
                'precio' => 4000.0,
            ],
        ]);
    }
}
