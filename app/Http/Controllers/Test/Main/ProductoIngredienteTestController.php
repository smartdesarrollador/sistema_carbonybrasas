<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Producto_ingrediente;

class ProductoIngredienteTestController extends Controller
{
    //
    public function getIngredientesByIdProducto()
    {
        $obj = new Producto_ingrediente();

        $idProducto = 1;

        $lista = $obj->getIngredientesByIdProducto($idProducto);

        dd($lista);
    }

    public function getIngredientesByIdProductoAndTipo($idProducto, $tipo, $orden)
    {
        //Implementar
    }

    public function getAllIngredientes()
    {
        //Implementar
    }
}
