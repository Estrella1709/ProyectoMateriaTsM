<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("usuarios")->insert([
            [
                "nombre"=> "Juan",
                "apellido"=> "Mendez Garaiz",
                "email"=> "juan@gmail.com",
                "telefono"=> "4271238273",
                "password"=> "caracalla",
                "id_rol"=>1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),

            ],
            [
                "nombre"=> "Jimena",
                "apellido"=> "Landeros Lugo",
                "email"=> "jim1904@gmail.com",
                "telefono"=> "4272837492",
                "password"=> "aaaaaaaa",
                "id_rol"=>1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nombre"=> "Martin",
                "apellido"=> "Odegaard",
                "email"=> "martinod@gmail.com",
                "telefono"=> "4428377492",
                "password"=> "goonercaptain",
                "id_rol"=>2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
