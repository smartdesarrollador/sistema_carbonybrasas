<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\EstadoPedido;

class EstadoPedidoTestController extends Controller
{
    //

    public function getEstadoPedidos()
    {
        $obj = new EstadoPedido();

        $lista = $obj->getEstadoPedidos();

        dd($lista);
    }
}
