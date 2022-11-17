<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class PedidoItems
{

    function getPedidoIems($idPedido)
    {
        $lista = DB::select("SELECT * FROM pedido_items INNER JOIN productos on pedido_items.idProducto = productos.idProducto WHERE pedido_items.idPedido = '$idPedido'");

        return $lista;
    }

    function addNewItem($idPedido, $idProducto, $cantidad, $item_descripcion)
    {

        $new_item = DB::insert("INSERT INTO pedido_items (idPedido,idProducto,cantidad,item_descripcion) VALUES('$idPedido','$idProducto','$cantidad','$item_descripcion')");

        return $new_item;
    }
}
