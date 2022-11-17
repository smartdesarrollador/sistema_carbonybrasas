<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Pedido;

class PedidoTestController extends Controller
{
    //
    public function addPedido()
    {
        $obj = new Pedido();

        $idCliente = 1;
        $direccionPedido = "Olivos";
        $pedidoTelefono = "9382327723";
        $pedidoObservaciones = "Departamento 1502 Edificio Vitta";
        $precioTotal = 40;
        $puntosGanados = 10;
        $lastFour = "404293XXXX";
        $cardNumber = "404293XXXXXX0161";
        $horaPedido = "13:21:28";
        $brand = "VISA";
        $saldoReducido = "";
        $delivery = "true";
        $distrito = "Lince";
        $documento = "factura";
        $razonSocial = "ORTHO TRAUMA SERVICE EIRL";
        $direccionFiscal = "Av Cesar Vallejo 335 Lince";
        $ruc = "20601420172";
        $latitud = "";
        $longitud = "";
        $costoEnvioPagado = "5.00";
        $idtienda = "";

        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');
        $dateTime = time();

        $actualizacion = $obj->addPedido(
            $idCliente,
            $direccionPedido,
            $pedidoTelefono,
            $pedidoObservaciones,
            $precioTotal,
            $puntosGanados,
            $lastFour,
            $cardNumber,
            $horaPedido,
            $brand,
            $saldoReducido = 0,
            $delivery = 'true',
            $distrito,
            $documento,
            $razonSocial,
            $direccionFiscal,
            $ruc,
            $latitud,
            $longitud,
            $costoEnvioPagado = 0,
            $idtienda = 0
        );

        dd($actualizacion); //true

    }

    public function addItemsPedido($sql)
    {

        //Implementar
    }


    public function getPedido()
    {
        $obj = new Pedido();

        $lista = $obj->getPedido();

        dd($lista);
    }

    public function getPedidoByIdPedido()
    {
        $obj = new Pedido();

        $idPedido = 1;

        $lista = $obj->getPedidoByIdPedido($idPedido);

        dd($lista);
    }

    public function getFeedBackTokenByIdPedido()
    {
        $obj = new Pedido();

        $idPedido = 1;

        $lista = $obj->getFeedBackTokenByIdPedido($idPedido);

        dd($lista);
    }

    public function updateFeedBackStatus()
    {
        $obj = new Pedido();

        $idPedido = 1;

        $lista = $obj->updateFeedBackStatus($idPedido);

        dd($lista);
    }
}
