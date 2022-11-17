<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tienda')->insert([
            'idTienda' => 1,
            'CostoDelivery' => 5,
            'estado' => "ABIERTO",
            'acepta_pedidos' => 'TRUE',
            'direccion_tienda' => "Brigadier Pumacahua 2321",
        ]);
    }
}
