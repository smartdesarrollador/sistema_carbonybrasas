<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\PedidoItems;

class PedidoItemsTestController extends Controller
{
    //
    public function getPedidoIems()
    {
        $obj = new PedidoItems();

        $idPedido = 1;

        $lista = $obj->getPedidoIems($idPedido);

        dd($lista);
    }
}
