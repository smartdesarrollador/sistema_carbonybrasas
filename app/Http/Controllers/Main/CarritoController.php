<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Helpers\Clases\Main\Cart;
use Helpers\Clases\Main\TiendaClass;
use Helpers\Clases\Main\ProductoClass;

class CarritoController extends Controller
{
    //
    public function index(Request $request)
    {
        $cart = new Cart;
        $objTienda = new TiendaClass();
        $objProducto = new ProductoClass();

        $estadoTienda = trim($objTienda->getEstadoTienda()->estado);
        $costoEnvio = trim($objTienda->getCostoEnvio()['costoDelivery']);
        $adicionales = $objProducto->getAdicionales();

        $relatedProducts = $objProducto->getRandomProducts(10);

        /*DESCUENTO POR PUNTOS*/
        $descuento = 0;


        if (session('current_customer_puntos') >= 90) {
            $descuento = 20;
        }

        //dd(session('current_customer_puntos'));


        $subtotal = 0;
        $puntosAacumular = 0;

        $total_items = $cart->total_items();


        /* ------ Cart Contents ---- */
        $cartItems = $cart->contents();


        /* $collection = collect($cartItems);

        $arr = array();

        $i = 0;

        foreach ($collection as $cart) {
            $arr[$i] = $cart;
            $i++;
        } */
        /* ------ /Cart Contents ---- */

        $total = number_format($cart->total(), 2, '.', '');

        //dd($total);

        if ($request->session()->has('current_customer_idCliente', 'current_customer_email')) {
            session(['estado_cliente' => "true"]);
        } else {
            session(['estado_cliente' => "false"]);
        }


        return view("main.carrito", [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'puntosAacumular' => $puntosAacumular,
            'total_items' => $total_items,
            'total' => $total
        ]);
    }
}
