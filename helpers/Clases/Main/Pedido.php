<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class Pedido
{

    function addPedido(
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
    ) {
        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');
        $dateTime = time();

        $insertar = DB::insert("INSERT INTO pedidos (idCliente, direccionPedido, pedidoTelefono,fechaPedido,pedidoObservaciones,precioTotal,
    puntosGanados,last_four,card_number,horaPedido,brand,saldoReducido,dateTime,delivery,
    distrito,documento,razonSocial,direccionFiscal,ruc,latitud,longitud,costoEnvioPagado,idTienda)
    VALUES ('$idCliente','$direccionPedido','$pedidoTelefono',
    '$actualDate','$pedidoObservaciones','$precioTotal','$puntosGanados','$lastFour',
    '$cardNumber','$horaPedido','$brand','$saldoReducido','$dateTime','$delivery','$distrito',
    '$documento','$razonSocial','$direccionFiscal','$ruc','$latitud','$longitud','$costoEnvioPagado','$idtienda')");

        return $insertar;
    }

    function addItemsPedido($sql)
    {

        //Implementar
    }

    function getPedido()
    {

        $lista = DB::select("SELECT * FROM pedidos");

        return $lista;
    }

    function getPedidoByIdPedido($idPedido)
    {
        $lista = DB::select("SELECT * FROM pedidos where idPedido = '$idPedido'");

        return $lista[0];
    }

    function getFeedBackTokenByIdPedido($idPedido)
    {
        $lista = DB::select("SELECT idPedido,feedBackToken FROM pedidos where idPedido = '$idPedido'");

        return $lista[0];
    }

    function updateFeedBackStatus($idPedido)
    {
        $actualizacion = DB::update("UPDATE pedidos SET feedBackToken = '' WHERE idPedido = '$idPedido'");

        return $actualizacion;
    }

    function getUltimoIdPedido()
    {
        $lista = DB::select("SELECT MAX(idPedido) AS idPedido FROM pedidos");

        return $lista[0];
    }
}
