<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        $this->call([
            rolesSeeder::class,
            usuarioSeeder::class,
            UbicacionSeeder::class,
            AerolineaSeeder::class,
            VueloSeeder::class,
            HotelesSeeder::class,
            ReportesSeeder::class,
            politicasSeeder::class,
            EstadoSeeder::class

        ]);
    }
}    