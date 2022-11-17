<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estadopedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('estadopedido')->insert([
            'idEstado' => 1,
            'nombreEstado' => "PENDIENTE",
        ]);

        DB::table('estadopedido')->insert([
            'idEstado' => 2,
            'nombreEstado' => "DESPACHADO",
        ]);

        DB::table('estadopedido')->insert([
            'idEstado' => 3,
            'nombreEstado' => "COMPLETADO",
        ]);

        DB::table('estadopedido')->insert([
            'idEstado' => 4,
            'nombreEstado' => "CANCELADO",
        ]);

        DB::table('estadopedido')->insert([
            'idEstado' => 5,
            'nombreEstado' => "DEVUELTO",
        ]);

        DB::table('estadopedido')->insert([
            'idEstado' => 6,
            'nombreEstado' => "INUBICABLE",
        ]);

        DB::table('estadopedido')->insert([
            'idEstado' => 7,
            'nombreEstado' => "DENEGAR",
        ]);
    }
}
