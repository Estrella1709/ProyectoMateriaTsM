<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class reservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservaciones')->insert([
            [
                'id_usuario' => 1,
                'id_vuelo' => 1,
                'id_hotel' => 1,
                'fecha_reservacion' => Carbon::now(),
                'total_a_pagar' => 4400,
                
            ],

            [
                'id_usuario' => 2,
                'id_vuelo' => 2,
                'id_hotel' => 2,
                'fecha_reservacion' => Carbon::now(),
                'total_a_pagar' => 2200,
                
            ],
        ]);

    }
}
