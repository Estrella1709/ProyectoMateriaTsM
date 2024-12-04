<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


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
            politicasSeeder::class,
            EstadoSeeder::class
        ]);
    }
}    