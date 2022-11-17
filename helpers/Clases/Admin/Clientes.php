<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class Clientes
{
    public function getPuntosClientes()
    {
        $lista = DB::select("select nombre,apellido, email,puntos from clientes");

        return $lista;
    }

    public function getClienteById($idCliente)
    {
        $lista = DB::select("select * from clientes where idCliente='$idCliente'");

        return $lista[0];
    }

    public function getComprasxCliente()
    {
        //Falta Implementar
    }

    public function aumentarPuntosCliente($idCliente, $puntos)
    {
        $actualizacion = DB::update("UPDATE clientes SET puntos = puntos+'$puntos' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    public function reducirSaldoCliente($idCliente, $saldo)
    {

        $actualizacion = DB::update("UPDATE clientes SET saldoBilletera = saldoBilletera-'$saldo' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }
}
