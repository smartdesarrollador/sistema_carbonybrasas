<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\ProductoClass;

class ProductoTestController extends Controller
{
    //
    public function getTipoProductos()
    {
        $obj = new ProductoClass();

        $idTipoProducto = 1;

        $lista = $obj->getTipoProductos($idTipoProducto);

        dd($lista);
    }

    public function getTipoProductosAndOrderByPosicion()
    {
        $obj = new ProductoClass();

        $idTipoProducto = 1;

        $lista = $obj->getTipoProductosAndOrderByPosicion($idTipoProducto);

        dd($lista);
    }

    public function getAdicionales()
    {
        $obj = new ProductoClass();

        $lista = $obj->getAdicionales();

        dd($lista);
    }

    public function addNewProducto()
    {
        $obj = new ProductoClass();

        $nombreProducto = "Nuevo Producto";
        $descripcionProducto = "descripcion";
        $imagenProducto = "default.jpg";
        $idTipoProducto = 1;
        $precioProducto = 40;
        $puntos = 1;
        $storeId = 1;

        $lista = $obj->addNewProducto($nombreProducto, $descripcionProducto, $imagenProducto, $idTipoProducto, $precioProducto, $puntos, $storeId = 1);

        dd($lista);
    }

    public function updateProductWithoutPhoto()
    {
        $obj = new ProductoClass();

        $idProducto = 1;
        $nombreProducto = "Producto Editado";
        $descripcionProducto = "descripcion";
        $idTipoProducto = 1;
        $precioProducto = 10;
        $puntos = 40;
        $storeId = 1;

        $actualizacion = $obj->updateProductWithoutPhoto($idProducto, $nombreProducto, $descripcionProducto, $idTipoProducto, $precioProducto, $puntos, $storeId = 1);

        dd($actualizacion);
    }

    public function getProductoById()
    {
        $obj = new ProductoClass();

        $idProducto = 1;

        $lista = $obj->getProductoById($idProducto);

        dd($lista);
    }

    public function updateProductWithPhoto()
    {
        $obj = new ProductoClass();

        $idProducto = 1;
        $nombreProducto = "Producto Actualizado";
        $descripcionProducto = "descripcion";
        $imageProducto = "default.jpg";
        $idTipoProducto = 1;
        $precioProducto = 10;
        $puntos = 40;
        $storeId = 1;

        $actualizacion = $obj->updateProductWithPhoto($idProducto, $nombreProducto, $descripcionProducto, $imageProducto, $idTipoProducto, $precioProducto, $puntos, $storeId = 1);

        dd($actualizacion);
    }

    public function getRandomProducts()
    {
        $obj = new ProductoClass();

        $limit = 1;

        $lista = $obj->getRandomProducts($limit);

        dd($lista);
    }

    public function getProductsByTipoProducto()
    {
        $obj = new ProductoClass();

        $idTipoProducto = 1;
        $limit = 1;

        $lista = $obj->getProductsByTipoProducto($idTipoProducto, $limit);

        dd($lista);
    }

    public function getTipoProductoById()
    {
        $obj = new ProductoClass();

        $idTipoProducto = 1;

        $lista = $obj->getTipoProductoById($idTipoProducto);

        dd($lista);
    }

    public function getAllProducts()
    {
        $obj = new ProductoClass();

        $lista = $obj->getAllProducts();

        dd($lista);
    }
}
