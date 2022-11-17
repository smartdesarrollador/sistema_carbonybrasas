<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\ProductoClass;
use Helpers\Clases\Main\TiendaClass;

class PromocionesController extends Controller
{
    //
    public function index()
    {
        $objProducto = new ProductoClass();
        $objTienda = new TiendaClass();

        $lista = $objProducto->getTipoProductos(1);

        //$lista = response()->json($lista, 200, []);

        //dd($lista);

        $estadoTienda = $objTienda->getEstadoTienda();

        /* foreach ($estadoTienda as $estado_tienda) {
            $estado_t[0] = $estado_tienda;
        } */

        //dd($estado_t[0]);

        $estadoTienda = $estadoTienda->estado;

        //dd($estadoTienda);

        $url_img_produc = asset("");

        //dd($url_img_produc);

        return view("main.promocion", [
            'lista' => $lista,
            'estadoTienda' => $estadoTienda,
            'url_img_produc' => $url_img_produc
        ]);
    }
}
