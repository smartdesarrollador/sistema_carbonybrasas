<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class Pedido
{

    public function getPedidosByDate($fechaPedido)
    {
        $lista = DB::select("SELECT * FROM clientes INNER JOIN pedidos ON clientes.idCliente = pedidos.idCliente
        where fechaPedido = '$fechaPedido' ORDER BY horaPedido DESC");

        return $lista;
    }

    public function getPedidosItemsByidPedido($idPedido)
    {
        $lista = DB::select("select productos.idProducto as codigoProducto,nombreProducto,cantidad,item_descripcion,precioProducto from pedidos INNER JOIN pedido_items ON pedidos.idPedido = pedido_items.idPedido 
        INNER JOIN productos ON pedido_items.idProducto = productos.idProducto WHERE pedidos.idPedido = '$idPedido'");

        return $lista;
    }

    public function getPedidosLimit50()
    {
        $lista = DB::select("SELECT * FROM clientes INNER JOIN pedidos ON clientes.idCliente = pedidos.idCliente
        ORDER BY idPedido DESC LIMIT 50");

        return $lista;
    }

    public function getAllPedidos()
    {
        $lista = DB::select("SELECT * FROM clientes INNER JOIN pedidos ON clientes.idCliente = pedidos.idCliente");

        return $lista;
    }

    public function changeFeedBackStatus($idPedido, $status, $token)
    {
        $actualizacion = DB::update("UPDATE pedidos set
        feedBackEnviado= '$status',feedBackToken='$token' where idPedido = '$idPedido'");

        return $actualizacion;
    }

    public function getCountOfPEdidos()
    {
        $lista = DB::select("SELECT count(idPedido) as total FROM pedidos");

        return $lista[0];
    }

    public function updateOrderStatus($idEstado, $idPedido)
    {
        $actualizacion = DB::update("UPDATE pedidos set
        idEstado= '$idEstado' where idPedido = '$idPedido'");

        return $actualizacion;
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
