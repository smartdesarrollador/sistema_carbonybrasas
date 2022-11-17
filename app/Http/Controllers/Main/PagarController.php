<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Cart;
use Helpers\Clases\Main\ClienteClass;
use Helpers\Clases\Main\TiendaClass;
use Helpers\Clases\Main\Delivery;

class PagarController extends Controller
{
    //
    public function index(Request $request)
    {
        $objtienda = new TiendaClass();
        $objCliente = new ClienteClass();
        $objDelivery = new Delivery();

        $cliente = $objCliente->getAllInformationUserById(session('current_customer_idCliente'));



        $cart = new Cart();
        $cartItems = $cart->contents();
        $cartTotal = $cart->total();



        $page = 'pagar';
        $faltanNPuntos = 10 - session('current_customer_puntos');



        $descuento = 0;
        if (session('current_customer_puntos') >= 10) {
            $descuento = 20;
        }



        if ($request->session()->has('current_customer_idCliente')) {
        } else {
            return redirect()->route('inicio');
        }

        if (count($cartItems) <= 0) {
            return redirect()->route('carta');
        }

        $saldoBilletera = round($cliente->saldoBilletera);

        $deliveryZone = $objDelivery->getDeliveryZoneById(session('deliveryZoneId'));
        $costoEnvio = 0;

        if (session('envio') == 'recojo' || session('solo_gift_cards') == 'true') {
            $costoEnvio = 0;
        } else {
            $costoEnvio = $deliveryZone->price;
        }

        /*------------- Calcular valor total -----------*/

        $total_izi = 1;

        if ($descuento == 20) {
            $total_izi = $cartTotal - 0;
        } else {
            $total_izi = $cartTotal;
        }

        if (session('solo_gift_cards') == 'true') {
            $total_izi = $cartTotal;
        } else {

            if ($saldoBilletera < $total_izi) {
                $total_izi = $total_izi - $saldoBilletera;
            } elseif ($saldoBilletera >= $total_izi) {
                $total_izi = 1;
            }
        }

        if ($total_izi == 0) {
            $total_izi = 1;
        }

        if ($total_izi == 1) {
            $total_izi = 1;
        } else {
        }


        /*-------------/Calcular valor total ----------- */

        /** ------------- 1  Izipay ----------- */

        $client = metodo_izipay();

        $email_pedido = session('current_customer_email');
        $nombre_pedido = session('current_customer_nombre');
        $apellido_pedido = session('current_customer_apellido');

        $store = array(
            "amount" => $total_izi . "00",
            "currency" => "EUR",
            "orderId" => uniqid("MyOrderId"),
            "customer" => array(
                "email" => $email_pedido,
                "billingDetails" => array(
                    "lastName" => $nombre_pedido,
                    "firstName" => $nombre_pedido
                )
            )
        );

        $response = $client->post("V4/Charge/CreatePayment", $store);

        /* I check if there are some errors */
        if ($response['status'] != 'SUCCESS') {
            /* an error occurs, I throw an exception */
            display_error($response);
            $error = $response['answer'];
            //throw new Exception("error " . $error['errorCode'] . ": " . $error['errorMessage']);
        }

        /* everything is fine, I extract the formToken */
        $formToken = $response["answer"]["formToken"];

        $path = "http://localhost/laravel/liveware_test_laravel/helpers/izipay/paid.php";

        /** ------- /1  Izipay ------------ */

        if (isset($cliente->distrito) || strlen($cliente->distrito) > 2) {
            $cliente_distrito = $cliente->distrito;
        } else {
            $cliente_distrito = '-';
        }


        $valor_sesion_current_customer_fechaNacimiento =  date('Y-m-d', strtotime(session('current_customer_fechaNacimiento')));

        return view('main.pagar', [
            'cliente_distrito' => $cliente_distrito,
            'deliveryZone' => $deliveryZone,
            'valor_sesion_current_customer_fechaNacimiento' => $valor_sesion_current_customer_fechaNacimiento,
            'saldoBilletera' => $saldoBilletera,
            'cartTotal' => $cartTotal,
            'costoEnvio' => $costoEnvio,
            'formToken' => $formToken,
            'client' => $client,
            'path' => $path
        ]);
    }
}
