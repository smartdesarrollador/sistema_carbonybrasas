<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Consumo;

class ConsumosTestController extends Controller
{
    //

    public function addNewConsumo()
    {

        $obj = new Consumo();

        $idCliente = 1;
        $amount = 10;

        $lista = $obj->addNewConsumo($idCliente, $amount);

        dd($lista); //respuesta: true
    }
}
