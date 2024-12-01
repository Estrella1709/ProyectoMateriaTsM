<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    public function run()
    {
        DB::table('ubicaciones')->insert([
            ['nombre' => 'Ciudad de México'],
            ['nombre' => 'Guadalajara'],
            ['nombre' => 'Monterrey'],
            ['nombre' => 'Cancún'],
            ['nombre' => 'Tijuana'],
        ]);
    }
}
