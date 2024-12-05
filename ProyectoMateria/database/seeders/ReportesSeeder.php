<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportesSeeder extends Seeder
{
    public function run()
    {
        DB::table('reportes')->insert([
            [
                'tipo_reporte' => 'vuelos',
                'estado_reporte' => 'pendiente',
                'titulo_reporte' => 'Problema con vuelo retrasado',
                'contenido_reporte' => 'El vuelo con número 123 se retrasó más de 3 horas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_reporte' => 'hoteles',
                'estado_reporte' => 'resuelto',
                'titulo_reporte' => 'Habitación no estaba lista',
                'contenido_reporte' => 'La habitación reservada no estaba lista a la hora indicada.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_reporte' => 'clientes',
                'estado_reporte' => 'pendiente',
                'titulo_reporte' => 'Cliente con problemas de pago',
                'contenido_reporte' => 'El cliente con ID 456 tuvo problemas al procesar su pago.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
