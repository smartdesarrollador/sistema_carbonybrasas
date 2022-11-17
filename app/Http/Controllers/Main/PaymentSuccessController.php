<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Pedido;
use Helpers\Clases\Main\PedidoItems;

class PaymentSuccessController extends Controller
{
    //
    public function index($orderId, $amount)
    {
        $objPedido = new Pedido();
        $objPedidoItems = new PedidoItems();

        $idPedido = $orderId;
        $pedido = $objPedido->getPedidoByIdPedido($idPedido);
        $pedidoItems = $objPedidoItems->getPedidoIems(trim($orderId));

        $id_Pedido = str_pad($pedido->idPedido, 8, "0", STR_PAD_LEFT);

        return view("main.paymentsuccess", ['pedido' => $pedido, 'pedidoItems' => $pedidoItems, 'id_Pedido' => $id_Pedido]);
    }
}
