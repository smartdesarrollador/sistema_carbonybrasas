<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Pedido;

class PedidosTestController extends Controller
{
    //

    public function getPedidosByDate()
    {
        $obj = new Pedido();

        $fechaPedido = '2022-06-12';

        $lista = $obj->getPedidosByDate($fechaPedido);

        dd($lista);
    }

    public function getPedidosItemsByidPedido()
    {
        $obj = new Pedido();

        $idPedido = 1;

        $lista = $obj->getPedidosItemsByidPedido($idPedido);

        dd($lista);
    }

    public function getPedidosLimit50()
    {
        $obj = new Pedido();

        $lista = $obj->getPedidosLimit50();

        dd($lista);
    }

    public function getAllPedidos()
    {
        $obj = new Pedido();

        $lista = $obj->getAllPedidos();

        dd($lista);
    }

    public function changeFeedBackStatus()
    {

        $obj = new Pedido();

        $idPedido = 1;
        $status = "true";
        $token = "62a637c9a0914fxxxxxx";

        $actualizacion = $obj->changeFeedBackStatus($idPedido, $status, $token);

        dd($actualizacion); //1



    }

    public function getCountOfPEdidos()
    {
        $obj = new Pedido();

        $lista = $obj->getCountOfPEdidos();

        dd($lista);
    }

    public function updateOrderStatus()
    {
        $obj = new Pedido();

        $idEstado = 1;
        $idPedido = 1;

        $actualizacion = $obj->updateOrderStatus($idEstado, $idPedido);

        dd($actualizacion);
    }

    public function reporteVentasUltimos6Meses()
    {
        //Falta Implementar
    }

    public function generarExcelPrimerReporte($monthAndYear)
    {
        //Falta Implementar
    }
}
