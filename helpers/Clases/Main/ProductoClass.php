<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class ProductoClass
{

    function getTipoProductos($idTipoProducto)
    {
        $lista = DB::select("SELECT * FROM productos where idTipoProducto = '$idTipoProducto' AND estado = 'ACTIVO'");

        return $lista;
    }

    function getTipoProductosAndOrderByPosicion($idTipoProducto)
    {
        $lista = DB::select("SELECT * FROM productos where idTipoProducto = '$idTipoProducto' AND estado = 'ACTIVO' ORDER BY posicion ASC");

        return $lista;
    }

    function getAdicionales()
    {
        $lista = DB::select("SELECT * FROM productos where  estado = 'ACTIVO' AND productoObservaciones='ADICIONAL' ORDER BY posicion ASC");

        return $lista;
    }

    function addNewProducto($nombreProducto, $descripcionProducto, $imagenProducto, $idTipoProducto, $precioProducto, $stock, $estado, $puntos, $storeId = 1)
    {
        $nuevo_producto = DB::insert("INSERT INTO 
    productos(nombreProducto,descripcionProducto,imagenProducto,idTipoProducto,precioProducto,stock,estado,acumulaNPuntos,store_id) 
                VALUES('$nombreProducto','$descripcionProducto','$imagenProducto','$idTipoProducto','$precioProducto','$stock','$estado','$puntos','$storeId')");

        return $nuevo_producto;
    }

    function updateProductWithoutPhoto($idProducto, $nombreProducto, $descripcionProducto, $idTipoProducto, $precioProducto, $puntos, $storeId = 1)
    {
        $actualizacion = DB::update("UPDATE productos set  
    nombreProducto = '$nombreProducto',
    descripcionProducto = '$descripcionProducto',
    idTipoProducto = '$idTipoProducto',
    precioProducto = '$precioProducto',
    acumulaNPuntos = '$puntos',
    store_id = '$storeId'
WHERE idProducto = $idProducto");

        return $actualizacion;
    }

    function getProductoById($id)
    {
        $lista = DB::select("SELECT * FROM productos where idProducto = '$id'");

        return $lista[0];
    }

    function updateProductWithPhoto($idProducto, $nombreProducto, $descripcionProducto, $imageProducto, $idTipoProducto, $precioProducto, $puntos, $storeId = 1)
    {
        $actualizacion = DB::update("UPDATE productos set  
        nombreProducto = '$nombreProducto',
        descripcionProducto = '$descripcionProducto',
        imagenProducto = '$imageProducto',
        idTipoProducto = '$idTipoProducto',
        precioProducto = '$precioProducto',
        acumulaNPuntos = '$puntos',
         store_id = '$storeId'
    WHERE idProducto = $idProducto");

        return $actualizacion;
    }

    function getRandomProducts($limit)
    {
        $lista = DB::select("SELECT * FROM productos where imagenProducto not LIKE 'default.jpg' AND estado = 'ACTIVO' ORDER BY RAND() LIMIT $limit");

        return $lista;
    }

    function getProductsByTipoProducto($idTipoProducto, $limit)
    {
        $lista = DB::select("SELECT * FROM productos where imagenProducto not LIKE 'default.jpg' and estado = 'ACTIVO' and idTipoProducto = '$idTipoProducto' ORDER BY RAND() LIMIT $limit");

        return $lista;
    }

    function getTipoProductoById($idTipoProducto)
    {
        $lista = DB::select("SELECT * FROM tipoproducto where idTipoProducto = $idTipoProducto");

        return $lista;
    }

    function getAllProducts()
    {
        $lista = DB::select("SELECT * FROM productos where estado = 'ACTIVO'");

        return $lista;
    }
}
