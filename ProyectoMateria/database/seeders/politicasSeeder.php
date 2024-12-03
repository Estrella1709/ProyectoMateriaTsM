<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class politicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('politicas')->insert([
            [
                'descripcion'=>'Una vez superado el período de 48 horas, 
                no se aceptarán solicitudes de cancelación ni reembolsos, 
                salvo que la aerolínea o el proveedor de alojamiento ofrezca 
                condiciones específicas diferentes, las cuales se detallarán en 
                la confirmación de tu reserva.'
            ]
            ]);
    }
}
