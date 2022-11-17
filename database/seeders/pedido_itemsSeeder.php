<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pedido_itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pedido_items')->insert([
            'idPedido_Items' => 1,
            'idPedido' => 1,
            'idProducto' => 1,
            'cantidad' => 10,
            'item_descripcion' => null,
            'giftTipo' => null,
            'dedicatoriaGift' => null,
            'giftTotalValorRecargado' => null,
            'giftDestinatario' => null,
        ]);
    }
}
