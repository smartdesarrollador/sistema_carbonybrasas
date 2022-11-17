<?php

namespace App\Http\Controllers\Test\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Cart;

class CartTestController extends Controller
{
    //
    public function carta()
    {
        return view("test.cart.carta");
    }

    public function cartAction($id)
    {
        /* return $codifica->encodePicture(aqui_el_valor_a_pasar); */

        $cart = new Cart();

        /* $valor = $obj->test_cart();

        dd($valor); */

        $itemData = array(
            'id' => 1,
            'name' => 'descripcion',
            'price' => 10,
            'imagenProducto' => 'foto.jpg',
            'qty' => 50,
            /* 'acumulaPuntos' => $acumulaNPuntos, */
            'acumulaPuntos' => 10,
            'productoObservaciones' => 'mis observaciones',
            'productoIngredientes' => 'opciones',
            'giftTipo' => 'tipo Gift Cart',
            'emailGift' => 'email gift',
            'dedicatoriaGift' => 'dedicatoria gift',
            'giftValor' => 'Gift Valor'
        );


        //dd($itemData);

        $insertItem = $cart->insert($itemData);

        //dd($insertItem);
        if ($insertItem) {
            return redirect()->route('test.cart.pago');
        } else {
            return redirect()->route('test.cart.carta');
        }
    }

    public function pago()
    {

        $cart = new Cart();

        $cartItems = $cart->contents();

        dd($cartItems);

        //return view("test.cart.pago", ['cart_items' => $cartItems]);
    }
}
