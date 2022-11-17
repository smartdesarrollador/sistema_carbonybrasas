<?php

namespace App\Http\Controllers\Main\Script;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Cart;
use Helpers\Clases\Main\TiendaClass;
use Helpers\Clases\Main\ProductoClass;


class CartActionController extends Controller
{
    //
    public function cartAction(REQUEST $request)
    {

        /* $valor = $request->input('gaseosa');
        dd($valor); */

        /*   $input = $request->all();
        dd($input); */

        $cart = new Cart;
        $objTienda = new TiendaClass();

        $costoEnvio = $objTienda->getCostoEnvio()['costoDelivery'];

        $cart->setCostoEnvio($costoEnvio);


        if ($request->has('gaseosa')) {
            $idP =  $request->input('id');
            if ($idP == 1 || $idP == 4  || $idP == 6) {
                $gaseosa = $request->input('gaseosa');;
                $opciones_seleccionadas = $gaseosa;
            }
        }

        if ($request->has('parte_pollo')) {
            $idP =  $request->input('id');
            if ($idP == 1 || $idP == 3 || $idP == 4 || $idP == 5 || $idP == 6  || $idP == 8 || $idP == 9) {
                $parte_pollo = $request->input('parte_pollo');;
                $opciones_seleccionadas = $opciones_seleccionadas . " - " . $parte_pollo;
            }
        }

        if ($request->has('ensalada')) {
            $idP =  $request->input('id');
            if ($idP == 1 || $idP == 2 || $idP == 3 || $idP == 4 || $idP == 5  || $idP == 6) {
                $ensalada = $request->input('ensalada');;
                $opciones_seleccionadas = $opciones_seleccionadas . " + " . $ensalada;
            }
        }


        if ($request->has('todas_las_salsas') || $request->has('mayonesa') || $request->has('ketchup') || $request->has('aji') || $request->has('vinagreta')) {

            if ($request->has('todas_las_salsas')) {
                $todas_las_salsas = $request->input('todas_las_salsas');;
                $opciones_seleccionadas = $opciones_seleccionadas . " + " . $todas_las_salsas;
            }

            if ($request->has('mayonesa')) {
                $mayonesa = $request->input('mayonesa');;
                $opciones_seleccionadas = $opciones_seleccionadas . " + " . $mayonesa;
            }

            if ($request->has('ketchup')) {
                $ketchup = $request->input('ketchup');;
                $opciones_seleccionadas = $opciones_seleccionadas . " + " . $ketchup;
            }

            if ($request->has('aji')) {
                $aji = $request->input('aji');;
                $opciones_seleccionadas = $opciones_seleccionadas . " + " . $aji;
            }

            if ($request->has('vinagreta')) {
                $vinagreta = $request->input('vinagreta');;
                $opciones_seleccionadas = $opciones_seleccionadas . " + " . $vinagreta;
            }
        } else {
            $todas_las_salsas = $request->input('todas_las_salsas');;
            $opciones_seleccionadas = $opciones_seleccionadas . " + " . $todas_las_salsas;
        }

        if ($request->has('action')) {
            if ($request->has('action') == 'addToCart' && $request->has('id')) {
                $productID = $request->input('id');
                $cantidad = $request->input('cantidad');


                if ($cantidad > 0) {
                    $obj = new ProductoClass();
                    $row = $obj->getProductoById($productID);

                    //get product ingredientes ( BOWL,Shawarma premium y falafel premium )
                    $productoIngredientes = '';
                    if ($request->has('productoIngredientes')) {
                        $productoIngredientes = $request->input('productoIngredientes');
                    }

                    //get
                    $giftTipo = '';
                    $emailGift = '';
                    $dedicatoriaGift = '';

                    if ($request->has('dirigidoA')) {
                        $giftTipo = $request->input('dirigidoA');
                        $emailGift = $request->input('emailGift');
                        $dedicatoriaGift = $request->input('dedicatoriaGift');
                    }

                    $itemData = array(
                        'id' => $row->idProducto,
                        'nombreProducto' => $row->nombreProducto,
                        'name' => str_replace(" + ensalada", "", $row->descripcionProducto),
                        'price' => $row->precioProducto,
                        'imagenProducto' => $row->imagenProducto,
                        'qty' => $cantidad,
                        /* 'acumulaPuntos' => $acumulaNPuntos, */
                        'acumulaPuntos' => $row->acumulaNPuntos,
                        'productoObservaciones' => $row->productoObservaciones,
                        'productoIngredientes' => $opciones_seleccionadas,
                        'giftTipo' => $giftTipo,
                        'emailGift' => $emailGift,
                        'dedicatoriaGift' => $dedicatoriaGift,
                        'giftValor' => $row->giftValor
                    );

                    $insertItem = $cart->insert($itemData);



                    /* $redirectLoc = $insertItem ? '../pago.php' : '../index.php';
            header("Location: " . $redirectLoc); */

                    if ($insertItem) {
                        return redirect()->route('carrito');
                    } else {
                        return redirect()->route('inicio');
                    }

                    //dd($insertItem);
                } else {
                    return redirect()->route('inicio');
                }
            } elseif ($request->has('action') == 'updateCartItem' && $request->has('id')) {
            } elseif ($request->has('action') == 'removeCartItem' && $request->has('id')) {
            } elseif ($request->has('action') == 'destroyCart') {
            } elseif ($request->has('action') == 'placeOrder' && $cart->total_items() > 0 && $request->session()->has('current_customer_idCliente')) {
            } else {
                return redirect()->route('inicio');
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    public function updateCartItem($action, $id, $qty)
    {
        //dd("actualizar Item");
        $cart = new Cart;

        if (isset($action) && !empty($id)) {
            if ($qty == 0) {

                $deleteItem = $cart->remove($id);
                return redirect()->route('carrito');
            }
        } else {
            return redirect()->route('inicio');
        }

        $itemData = array(
            'rowid' => $id,
            'qty' => $qty
        );

        $updateItem = $cart->update($itemData);

        if ($updateItem) {
            return redirect()->route('carrito');
        } else {
            return redirect()->route('inicio');
        }
    }

    public function removeCartItem($id)
    {

        $cart = new Cart;

        $deleteItem = $cart->remove($id);

        return redirect()->route('carrito');


        //dd($action);


    }

    public function destroyCart($action)
    {
        $cart = new Cart;

        if ($action == 'destroyCart') {
            $cart->destroy();
            return redirect()->route('carrito');
        } else {
            return redirect()->route('inicio');
        }
    }

    public function placeOrder(Request $request)
    {
    }
}
