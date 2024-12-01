<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AerolineaSeeder extends Seeder
{
    public function run()
    {
        DB::table('aerolineas')->insert([
            ['nombre' => 'Aeroméxico'],
            ['nombre' => 'Volaris'],
            ['nombre' => 'Viva Aerobus'],
            ['nombre' => 'Interjet'],
            ['nombre' => 'Delta Airlines'],
        ]);
    }
}
