<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\ProductoClass;
use Helpers\Clases\Main\TiendaClass;

class ProductosController extends Controller
{
    //
    public function index($tipo)
    {

        $objTienda = new TiendaClass();
        $objProducto = new ProductoClass();
        $idProducto = trim($tipo);
        $lista = $objProducto->getTipoProductosAndOrderByPosicion($idProducto);




        $getEstadoTienda = $objTienda->getEstadoTienda();

        $estadoTienda = trim($getEstadoTienda->estado);

        //dd($estadoTienda);

        //GENERANDO LOS META TAGS
        $nombres = '';
        foreach ($lista as $item) {
            $nombres = $nombres . ', ' . $item->nombreProducto;
        }

        $url_img_produc = asset("");

        return view('main.producto', ['lista' => $lista, 'estadoTienda' => $estadoTienda, 'url_img_produc' => $url_img_produc]);
    }
}
