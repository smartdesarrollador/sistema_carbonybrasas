<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\TipoProductoClass;
use Helpers\Clases\Main\ProductoClass;

class CartaController extends Controller
{
    //
    public function index()
    {

        $objTipoProducto = new TipoProductoClass();
        $objProducto = new ProductoClass();
        $lista = $objTipoProducto->getTipoProductosClass();
        $allProductos = $objProducto->getAllProducts();

        return view('main.carta', ['lista' => $lista, 'allProductos' => $allProductos]);
    }
}
