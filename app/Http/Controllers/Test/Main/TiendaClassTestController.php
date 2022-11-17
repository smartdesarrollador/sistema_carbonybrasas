<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\TiendaClass;

class TiendaClassTestController extends Controller
{
    //
    public function getEstadoTienda()
    {
        $obj = new TiendaClass();

        $lista = $obj->getEstadoTienda();

        dd($lista);
    }

    public function getTiendaById()
    {
        $obj = new TiendaClass();

        $id = 1;

        $lista = $obj->getTiendaById($id);

        dd($lista);
    }

    public function getEstadoTiendas()
    {
        $obj = new TiendaClass();

        $lista = $obj->getEstadoTiendas();

        dd($lista);
    }

    public function getCostoEnvio()
    {
        $obj = new TiendaClass();

        $lista = $obj->getCostoEnvio();

        dd($lista);
    }
}
