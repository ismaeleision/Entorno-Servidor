<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use  Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('incidencias')->insert([
            'latitud' => $faker->latitude,
            'longitud' => $faker->longitude,
            'ciudad' => $faker->city,
            'direccion' => $faker->streetAddress,
            'etiqueta' => Str::random(3),
            'descripcion' => $faker->text($maxNbChars = 200),
            'estado' => 'abierta'
        ]);
    }
}
