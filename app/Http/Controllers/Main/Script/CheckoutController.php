<?php

namespace App\Http\Controllers\Main\Script;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Cart;
use Helpers\Clases\Main\Pedido;
use Helpers\Clases\Main\ClienteClass;
use Helpers\Clases\Main\Delivery;
use Helpers\Clases\Main\TiendaClass;
use Helpers\Clases\Main\Consumo;
use Helpers\Clases\Main\PedidoItems;

//use App\Models\Cliente;



class CheckoutController extends Controller
{
    //
    public function checkout(Request $request)
    {

        $client = metodo_izipay();

        /*     if (empty($_POST)) {
            throw new Exception("no post data received!");
        } */

        $formAnswer = $client->getParsedFormAnswer();

        $cardNumberUser = $formAnswer['kr-answer']['transactions'][0]['transactionDetails']['cardDetails']['pan'];
        $cardBrandUser = $formAnswer['kr-answer']['transactions'][0]['transactionDetails']['cardDetails']['effectiveBrand'];

        $objTienda = new TiendaClass();
        $cart = new Cart;
        $objPedido = new Pedido();

        $objCliente = new ClienteClass();
        $objConsumo = new Consumo();

        $objDelivery = new Delivery();
        $deliveryZone = $objDelivery->getDeliveryZoneById(session('deliveryZoneId'));

        $objPedidoItems = new PedidoItems();

        $cliente = $objCliente->getAllInformationUserById(session('current_customer_idCliente'));
        $saldoBilletera = round($cliente->saldoBilletera);

        $costoEnvio = 0;
        if (session('envio') == 'recojo' || session('solo_gift_cards') == 'true') {
        } else {

            $costoEnvio = $deliveryZone->price;
        }

        $cartItems = $cart->contents();

        //sacar cuantos puntos esta ganando por este pedido
        $puntosGanados = 0;

        foreach ($cartItems as $item) {
            $puntosGanados += $item['subtotalPuntos'];
        }

        $nombre = session('current_customer_nombre');
        $apellido = session('current_customer_apellido');
        $telefono = session('current_customer_telefono');
        $direccion = session('current_customer_direccion');
        $email = session('current_customer_email');
        $observaciones = session('current_customer_mensaje');


        $conPuntos = false;
        $producto_gratis = 'false';
        $descuento = 0;

        //$idTienda = $_GET['store'];
        $idTienda = 1;


        $firstTotal = $cart->total();
        if (strlen($direccion) <= 5) {
            $direccion = '--------';
        }

        if (session('current_customer_puntos') >= 10) {
            $descuento = 20;
            $conPuntos = true;
            $producto_gratis = 'true';
            $firstTotal = $firstTotal - 0;
            $observaciones = $observaciones . " - " . "";
        }

        $consaldo = false;
        if ($saldoBilletera > 0) {
            $firstTotal = $firstTotal - $saldoBilletera;
            $consaldo = true;
            $observaciones = $observaciones . " - " . "(PEDIDO PAGADO PARCIALMENTE CON BILLETERA VIRTUAL)";
        }

        /*
 * si solo hay gift cards, reseteamos todo
 * */
        if (session('solo_gift_cards') === 'true') {
            $firstTotal = $cart->total();
            $consaldo = false;
            $conPuntos = false;
            $producto_gratis = 'false';
        }

        $total = $firstTotal * 100 + ($costoEnvio * 100);

        $customerID = session('current_customer_idCliente');

        /** 2- Izipay */
        $lastFour = $cardNumberUser;
        $brand = $cardBrandUser;
        $card_number = $cardNumberUser;
        /** /2-Izipay */

        $totalPipe = $total / 100;
        date_default_timezone_set('America/Lima');
        $fechaPedido = $cart->fechaCastellano(date('d-m-Y H:i:s'));
        $horaPedido = date('H:i:s');

        if ($conPuntos) {
            $objCliente->reducirPuntosCliente(session('current_customer_idCliente'), 10);
        }

        if ($consaldo) {
            $objCliente->reducirSaldoCliente(session('current_customer_idCliente'), $saldoBilletera);
            $objConsumo->addNewConsumo(session('current_customer_idCliente'), $saldoBilletera, 'WEB');
        }

        //*SI ES BOLETA O FACTURA*/

        $razonSocial = '';
        $direccionFiscal = '';
        $ruc = '';
        if (session('current_customer_tipoDocumento') == 'factura') {
            $razonSocial = session('current_customer_razonSocial');
            $direccionFiscal = session('current_customer_direccionFiscal');
            $ruc = session('current_customer_ruc');
        }

        $distrito = session('current_customer_distrito'); //$_SESSION['$current_customer_distrito'];
        $latitud = session('current_customer_lat');
        $longitud = session('current_customer_lng');

        if (session('envio') == 'recojo' ||  session('solo_gift_cards') == 'true') {

            $pedidoInsertado = $objPedido->addPedido(
                $customerID,
                '-',
                $telefono,
                $observaciones,
                $totalPipe,
                $puntosGanados,
                $lastFour,
                $card_number,
                $horaPedido,
                $brand,
                $saldoBilletera,
                'false',
                '-',
                session('current_customer_tipoDocumento'),
                $razonSocial,
                $direccionFiscal,
                $ruc,
                $latitud,
                $longitud,
                0,
                $idTienda,
                $producto_gratis
            );
        } else {

            $pedidoInsertado = $objPedido->addPedido(
                $customerID,
                $direccion,
                $telefono,
                $observaciones,
                $totalPipe,
                $puntosGanados,
                $lastFour,
                $card_number,
                $horaPedido,
                $brand,
                $saldoBilletera,
                'true',
                $distrito,
                session('current_customer_tipoDocumento'),
                $razonSocial,
                $direccionFiscal,
                $ruc,
                $latitud,
                $longitud,
                $costoEnvio,
                $idTienda,
                $producto_gratis
            );
        }

        //dd($pedidoInsertado);

        $multiquery = '';
        $agregarPuntos = 0;
        $itemsHtml = '';
        $subtotal = 0;

        $idPedido_insertado = $objPedido->getUltimoIdPedido();

        $idPedido_insertado_valor = $idPedido_insertado->idPedido;

        /* ITERAMOS EL CONTENIDO DEL CARRITO E INSERTAMOS EN LA TABLA ITEMS_PEDIDO */


        foreach ($cartItems as $item) {
            $subtotal = $subtotal + $item['subtotal'];
            $itemsHtml .= '<tr>
    <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;text-transform: lowercase"
    class="article">
     ' . $item['name'] . '
      </td>
       <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        align="center">' . $item['qty'] . '
        </td>
        <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        align="right">S/ ' . $item['price'] . '
        </td>
         </tr>';

            $agregarPuntos += $item['subtotalPuntos'];

            if ($item['giftTipo'] == 'personal') {

                /* $multiquery .= "INSERT INTO pedido_items (idPedido,idProducto,cantidad,item_descripcion,giftTipo,giftTotalValorRecargado) VALUES ('" . $pedidoInsertado . "', '" . $item['id'] . "', '" . $item['qty'] . "', '" . $item['productoObservaciones'] . "', '" . $item['giftTipo'] . "', '" . $item['subtotalGiftValor'] . "');";
                $objCliente->updateClienteSaldo($_SESSION['current_customer_idCliente'], $item['subtotalGiftValor']); */
            } /*
             *------------------------------------ GIFT para compra a otro usuario  AGREGADO
             * falta algregar el multiquery
             * */ elseif ($item['giftTipo'] == 'regalo') {

                $countCustomer = count($objCliente->getEmailCustomerByEmail($item['emailGift']));

                $idDestinatario = '';

                if ($countCustomer > 0) {
                    return "Falta codigo enviar Correo";
                } else {
                    return "Falta codigo enviar Correo";
                }

                /* $multiquery .= "INSERT INTO pedido_items (idPedido,idProducto,cantidad,item_descripcion,giftTipo,giftTotalValorRecargado,giftDestinatario) 
VALUES ('" . $pedidoInsertado . "', '" . $item['id'] . "', '" . $item['qty'] . "', '" . $item['productoObservaciones'] . "', '" . $item['giftTipo'] . "', '" . $item['subtotalGiftValor'] . "', '" . $idDestinatario . "');";
                $objCliente->updateClienteSaldo($idDestinatario, $item['subtotalGiftValor']); */
            } else {

                /* $multiquery .= "INSERT INTO pedido_items (idPedido,idProducto,cantidad,item_descripcion) VALUES ('" . $pedidoInsertado . "', '" . $item['id'] . "', '" . $item['qty'] . "', '" . $item['productoIngredientes'] . "');"; */


                $objPedidoItems->addNewItem($idPedido_insertado_valor, $item['id'], $item['qty'], $item['productoIngredientes']);
            }
        }

        $objCliente->aumentarPuntosCliente(session('current_customer_idCliente'), $agregarPuntos);


        $pedidoItems = $objPedido->addItemsPedido($multiquery);

        //ACTUALIZAR PUNTOS EN SESION

        $getUserPunto = $objCliente->getUserPuntos(session('current_customer_idCliente'));

        $getUserPuntos = $getUserPunto->puntos;

        $request->session()->put(session('current_customer_puntos'), $getUserPuntos);

        $cart->destroy();

        return redirect()->route('paymentsuccess', ['orderId' => $idPedido_insertado_valor, 'amount' => $totalPipe]);



        //$resultado = my_simple_crypt($string);

        return "Pago realizado con exito";
    }
}
