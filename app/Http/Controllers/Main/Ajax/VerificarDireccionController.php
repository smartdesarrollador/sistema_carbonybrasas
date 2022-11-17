<?php

namespace App\Http\Controllers\Main\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Cart;
use Helpers\Clases\Main\ClienteClass;
use Helpers\Clases\Main\Delivery;
use Helpers\Clases\Main\TiendaClass;

class VerificarDireccionController extends Controller
{
    //
    public function verificarDireccion(Request $request)
    {
        $cart = new Cart;
        $objCliente = new ClienteClass();
        $objDelivery = new Delivery();
        $objTienda = new TiendaClass();

        if (session('envio') == 'recojo' ||  session('solo_gift_cards') == 'true') {
            $direccion = session('current_customer_direccion');
        } else {
            $direccion = $request->input('direccion');
        }

        $dni = limpiar($request->input('dni'));
        $fechaNacimiento = $request->input('fechaNacimiento');
        $mensaje = $request->input('mensaje');
        $apellido = $request->input('apellido');
        $telefono =  limpiar($request->input('telefono'));
        $total = $request->input('total') * 100;
        $distrito = $request->input('distrito');
        $storeId = $request->input('localId');

        $deliveryZone = $objDelivery->getDeliveryZoneById(session('deliveryZoneId'));

        $costoEnvio = 0;

        if (session('envio') == 'recojo' ||  session('solo_gift_cards') == 'true') {
            $costoEnvio = 0;
        } else {
            $costoEnvio =  $deliveryZone->price;
        }

        if (session('envio') == 'recojo' ||  session('solo_gift_cards') == 'true') {
        } else {
            if ($direccion == '') {
                return '<strong  class="text-center" style="color: red">Falta la direccion de Envío</strong>';
            }
        }

        if ($telefono == '') {
            return '<strong  class="text-center" style="color: red">Falta el teléfono</strong>';
        }

        if ($request->input('tipoDocumento') == 'boleta') {
            if (strlen($dni) < 8) {
                return '<strong class="text-center" style="color: red">DNI Invalido</strong>';
            }
        } else {

            $request->session()->put('current_customer_ruc', $request->input('ruc'));
            $request->session()->put('current_customer_razonSocial', $request->input('razonSocial'));
            $request->session()->put('current_customer_direccionFiscal', $request->input('direccionFiscal'));
        }

        if ($fechaNacimiento == '') {

            return '<strong class="text-center" style="color: red">Falta fecha de Nacimiento</strong>';
        }

        if ($distrito == '') {

            return '<strong class="text-center" style="color: red">Ingresa un distrito válido</strong>';
        }

        $idCliente = session('current_customer_idCliente');

        if (strlen($request->input('lat')) > 2) {
            $clienteActualizado = $objCliente->updateCustomerDetailsWithLatLng($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido, $request->input('lat'), $request->input('lng'), $request->input('distrito'));
            $request->session()->put('current_customer_lat', trim($request->input('lat')));
            $request->session()->put('current_customer_lng', trim($request->input('lng')));
        } else {
            $clienteActualizado = $objCliente->updateCustomerDetails($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido, $request->input('distrito'));

            $request->session()->put('current_customer_lat', trim($request->input('lat')));
            $request->session()->put('current_customer_lng', trim($request->input('lng')));
        }


        $request->session()->put('current_customer_tipoDocumento', $request->input('tipoDocumento'));
        $request->session()->put('current_customer_DNI', $dni);
        $request->session()->put('current_customer_fechaNacimiento', $fechaNacimiento);
        $request->session()->put('current_customer_direccion', $direccion);
        $request->session()->put('current_customer_mensaje', $mensaje);
        $request->session()->put('current_customer_telefono', $telefono);
        $request->session()->put('current_customer_apellido', $apellido);
        $request->session()->put('current_customer_distrito', $distrito);

        $estadosTiendas = $objTienda->getEstadoTiendas();

        if (session('envio') == 'recojo' ||  session('solo_gift_cards') == 'true') {

            return "<div class='row'>
<div class='col text-center'>
    <p class='text-info'><strong>Click en pagar para completar tu pedido.</strong></p>
    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
        PAGAR
    </button>
    </div>
</div>";
        } else {

            return "<div id='checkout' class='text-center'>
            <h3 id='mensajeExito' style='color: green'>Felicidades! Estas en la zona de reparto</h3>
            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <span class='input-group-text' id='basic-addon1'><i class='fa fa-map-marker' aria-hidden='true'></i></span>
                </div>
                <input id='direccionFormateada' readonly type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
            </div>
    
            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
                PAGAR
            </button>
           
        </div>";
        }

        return   "<div style='display: none' id='loading' class='loading'>Loading&#8230;</div>";
    }
}
