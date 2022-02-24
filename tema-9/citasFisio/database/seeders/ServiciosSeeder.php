<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("servicios")->insert(['servicios' => 'Final Feliz', 'imagen' => $this->faker->imageUrl(640, 480, 'products')]);
        DB::table("servicios")->insert(['servicios' => 'Cuello', 'imagen' => $this->faker->imageUrl(640, 480, 'products')]);
        DB::table("servicios")->insert(['servicios' => 'Trapecios', 'imagen' => $this->faker->imageUrl(640, 480, 'products')]);
        DB::table("servicios")->insert(['servicios' => 'Final Triste', 'imagen' => $this->faker->imageUrl(640, 480, 'products')]);
        DB::table("servicios")->insert(['servicios' => 'Espalda', 'imagen' => $this->faker->imageUrl(640, 480, 'products')]);
    }
}
