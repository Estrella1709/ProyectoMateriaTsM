<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cliente_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("cliente")->insert([
            [
                "nombre"=> "Juan",
                "apellido"=> "Mendez Garaiz",
                "email"=> "juan@gmail.com",
                "telefono"=> "4271238273",
                "contra"=> "caracalla",
                "two_factor"=> 1,
            ],
            [
                "nombre"=> "Jimena",
                "apellido"=> "Landeros Lugo",
                "email"=> "jim1904@gmail.com",
                "telefono"=> "4272837492",
                "contra"=> "aaaaaaaa",
                "two_factor"=> 1,
            ],
            [
                "nombre"=> "Martin",
                "apellido"=> "Odegaard",
                "email"=> "martinod@gmail.com",
                "telefono"=> "4428377492",
                "contra"=> "goonercaptain",
                "two_factor"=> 0,
            ]
        ]);
    }
}
