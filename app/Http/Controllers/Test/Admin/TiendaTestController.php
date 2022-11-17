<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Tienda;

class TiendaTestController extends Controller
{
    //

    public function getStoreStatus()
    {
        $obj = new Tienda();

        $lista = $obj->getStoreStatus();

        dd($lista);
    }

    public function updateStoreStatus()
    {
        $obj = new Tienda();

        $value = "CERRADO";

        $lista = $obj->updateStoreStatus($value);

        dd($lista);
    }

    public function getCostoEnvio()
    {
        $obj = new Tienda();

        $lista = $obj->getCostoEnvio();

        dd($lista);
    }

    public function updateCostoEnvio()
    {
        $obj = new Tienda();

        $value = 10;

        $lista = $obj->updateCostoEnvio($value);

        dd($lista);
    }

    public function getEstadoTiendas()
    {
        $obj = new Tienda();

        $lista = $obj->getEstadoTiendas();

        dd($lista);
    }

    public function updateDisponibilidadTienda()
    {
        $obj = new Tienda();

        $status = "FALSE";
        $idTienda = 1;

        $lista = $obj->updateDisponibilidadTienda($status, $idTienda);

        dd($lista);
    }
}
