<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Helpers\Clases\Main\Cart;
use Helpers\Clases\Main\TiendaClass;
use Helpers\Clases\Main\ProductoClass;

class DetalleController extends Controller
{
    //
    public function index($idProducto)
    {
        $objTienda = new TiendaClass();
        $objProducto = new ProductoClass();

        $lista = $objProducto->getTipoProductos($idProducto);
        //dd($lista);
        $producto = $objProducto->getProductoById($idProducto);
        //dd($producto);
        $estadoTienda = $objTienda->getEstadoTienda();
        //dd($estadoTienda);

        $url_img = asset("assets/images/carta/categorias/default.jpg");

        $uniqid1 = uniqid();
        $uniqid2 = uniqid();
        $uniqid3 = uniqid();
        $uniqid4 = uniqid();
        $uniqid5 = uniqid();

        return view("main.detalle", [
            'lista' => $lista,
            'producto' => $producto,
            'estadoTienda' => $estadoTienda,
            'url_img' => $url_img,
            'uniqid1' => $uniqid1,
            'uniqid2' => $uniqid2,
            'uniqid3' => $uniqid3,
            'uniqid4' => $uniqid4,
            'uniqid5' => $uniqid5
        ]);
    }
}
