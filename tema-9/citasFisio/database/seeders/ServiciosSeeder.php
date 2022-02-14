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
        DB::table("servicios")->insert(['servicios' => 'Final Feliz']);
        DB::table("servicios")->insert(['servicios' => 'Cuello']);
        DB::table("servicios")->insert(['servicios' => 'Trapecios']);
        DB::table("servicios")->insert(['servicios' => 'Final Triste']);
        DB::table("servicios")->insert(['servicios' => 'Espalda']);
    }
}
