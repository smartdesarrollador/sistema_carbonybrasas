<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productoIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('producto_ingrediente')->insert([
            'idProducto' => 1,
            'idIngrediente' => 1,
        ]);
    }
}
