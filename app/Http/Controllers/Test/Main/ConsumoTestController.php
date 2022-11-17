<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Consumo;

class ConsumoTestController extends Controller
{
    //

    public function addNewConsumo()
    {
        $obj = new Consumo();

        $idCliente = 1;
        $amount = 40;
        $descripcion = "Descripcion";

        $lista = $obj->addNewConsumo($idCliente, $amount, $descripcion);

        dd($lista);
    }
}
