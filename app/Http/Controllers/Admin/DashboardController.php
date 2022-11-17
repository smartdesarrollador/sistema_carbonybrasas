<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Pedido;
use Helpers\Clases\Admin\EstadoPedido;


class DashboardController extends Controller
{
    //
    public function index($valor = null)
    {
        $objPedido = new Pedido();
        $objEstadoPedido = new EstadoPedido();
        $listaEstadosPedido = $objEstadoPedido->getEstadoPedidos();

        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');

        //dd($valor);


        $selectedDate = null;

        if ($valor == 'date') {
            $selectedDate = $valor;
            $pedidos = $objPedido->getPedidosByDate($selectedDate);
        } elseif ($valor == 'limit50') {
            $pedidos = $objPedido->getPedidosLimit50();
        } else {
            $pedidos = $objPedido->getPedidosByDate($actualDate);
        }



        $totalVentas = 0;
        $numeroDepedidosEnLista = 0;

        foreach ($pedidos as $pedido) {
            $numeroDepedidosEnLista++;
            $totalVentas += $pedido->precioTotal;
        }





        return view('admin.dashboard', ['valor' => $valor, 'selectedDate' => $selectedDate, 'pedidos' => $pedidos, 'totalVentas' => $totalVentas, 'numeroDepedidosEnLista' => $numeroDepedidosEnLista, 'objPedido' => $objPedido, 'listaEstadosPedido' => $listaEstadosPedido]);
    }
}
