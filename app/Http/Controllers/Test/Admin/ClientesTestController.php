<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Clientes;

class ClientesTestController extends Controller
{
    //

    public function getPuntosClientes()
    {
        $obj = new Clientes();

        $lista = $obj->getPuntosClientes();

        dd($lista);
    }

    public function getClienteById()
    {
        $obj = new Clientes();

        $idCliente = 1;

        $lista = $obj->getClienteById($idCliente);

        dd($lista);
    }

    public function getComprasxCliente()
    {
        //Falta Implementar
    }

    public function aumentarPuntosCliente()
    {
        $obj = new Clientes();

        $idCliente = 1;
        $puntos = 30;

        $actualizacion = $obj->aumentarPuntosCliente($idCliente, $puntos);

        dd($actualizacion); // 1
    }


    public function reducirSaldoCliente()
    {
        $obj = new Clientes();

        $idCliente = 1;
        $saldo = 30;

        $actualizacion = $obj->reducirSaldoCliente($idCliente, $saldo);

        dd($actualizacion);
    }
}
