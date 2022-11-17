<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ingredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ingrediente')->insert([
            'idIngrediente' => 1,
            'nombre' => 'PAN INTEGRAL',
            'estado' => 'ACTIVO',
            'posicion' => 0,
            'tipo' => "PAN",
            'observaciones' => null,
            'imageUrl' => 'default.jpg',
            'store_id' => 1,
        ]);
    }
}
