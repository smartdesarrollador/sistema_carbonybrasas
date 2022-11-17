<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class consumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('consumo')->insert([
            'idConsumo' => 1,
            'idCliente' => 1,
            'monto' => 45,
            'fecha' => '2021-10-13',
            'hora' => "17:51:27",
            'descripcion' => "WEB",
        ]);
    }
}
