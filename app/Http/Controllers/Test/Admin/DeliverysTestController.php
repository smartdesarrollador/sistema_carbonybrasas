<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Delivery;

class DeliverysTestController extends Controller
{
    //

    public function getCostoPorDistritos()
    {
        $obj = new Delivery();

        $lista = $obj->getCostoPorDistritos();

        dd($lista);
    }

    public function cambiarCostoEnvioDistrito()
    {

        $obj = new Delivery();

        $id = 1;
        $precio = 40;


        $actualizacion = $obj->cambiarCostoEnvioDistrito($id, $precio);

        dd($actualizacion); //1


    }
}
