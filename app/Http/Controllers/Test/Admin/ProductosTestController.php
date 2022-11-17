<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Producto;

class ProductosTestController extends Controller
{
    //

    public function getProductos()
    {
        $obj = new Producto();

        $lista = $obj->getProductos();

        dd($lista);
    }

    public function getProductosBySearch()
    {
        $obj = new Producto();

        $param = "5";

        $lista = $obj->getProductosBySearch($param);

        dd($lista);
    }

    public function updateStockStatus()
    {
        $obj = new Producto();

        $id = 1;
        $stock = "YES";

        $actualizado = $obj->updateStockStatus($id, $stock);

        dd($actualizado);
    }

    public function getProductoById()
    {
        $obj = new Producto();

        $id = 3;

        $lista = $obj->getProductoById($id);

        dd($lista);
    }

    public function getProductosArchivados()
    {
        $obj = new Producto();

        $lista = $obj->getProductosArchivados();

        dd($lista);
    }

    public function changeStatusProduct()
    {
        $obj = new Producto();

        $id = 2;
        $status = "ARCHIVADO";

        $lista = $obj->changeStatusProduct($id, $status);

        dd($lista);
    }
}
