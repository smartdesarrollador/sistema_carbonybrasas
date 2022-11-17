<?php

namespace App\Http\Controllers\Admin\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Pedido;

class UpdatePedidosAdminController extends Controller
{
    //
    public function index()
    {
        $objPedido = new Pedido();

        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');

        $pedidos = $objPedido->getCountOfPEdidos();

        return $pedidos->total;
    }
}
