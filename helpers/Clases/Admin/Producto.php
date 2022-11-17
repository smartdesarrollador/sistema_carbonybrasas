<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class Producto
{


    public function getProductos()
    {
        $lista = DB::select("SELECT * FROM productos where estado = 'ACTIVO' ORDER BY idProducto ASC");

        return $lista;
    }

    public function getProductosBySearch($param)
    {
        $lista = DB::select("SELECT * FROM productos WHERE nombreProducto LIKE '%$param%' AND estado = 'ACTIVO' ORDER BY idProducto ASC");

        return $lista;
    }

    public function updateStockStatus($id, $stock)
    {
        $actualizacion = DB::update("UPDATE productos set
        stock= '$stock' where idProducto = '$id'");

        return $actualizacion;
    }

    public function getProductoById($id)
    {
        $lista = DB::select("SELECT * FROM productos where idProducto = '$id'");

        return $lista[0];
    }

    public function getProductosArchivados()
    {
        $lista = DB::select("SELECT * FROM productos where estado = 'ARCHIVADO' ORDER BY idProducto ASC");

        return $lista;
    }

    public function changeStatusProduct($id, $status)
    {
        $actualizacion = DB::update("UPDATE productos set
        estado= '$status' where idProducto = '$id'");

        return $actualizacion;
    }
}
