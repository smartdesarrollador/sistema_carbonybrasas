<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipoproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipoproducto')->insert([
            'idTipoProducto' => 1,
            'nombre' => 'Pollos',
            'imageUrl' => 'categoria-pollos.png',
            'posicion' => 1,
        ]);

        DB::table('tipoproducto')->insert([
            'idTipoProducto' => 2,
            'nombre' => 'Bebidas',
            'imageUrl' => 'categoria-bebidas.png',
            'posicion' => 2,
        ]);

        DB::table('tipoproducto')->insert([
            'idTipoProducto' => 3,
            'nombre' => 'Parrillas',
            'imageUrl' => 'categoria-parrillas.png',
            'posicion' => 3,
        ]);
    }
}
