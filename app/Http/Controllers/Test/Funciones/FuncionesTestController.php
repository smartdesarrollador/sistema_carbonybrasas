<?php

namespace App\Http\Controllers\Test\Funciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuncionesTestController extends Controller
{
    //
    public function my_simple_crypt()
    {

        $string = "mundo";

        $resultado = my_simple_crypt($string);

        dd($resultado);
    }


    /*  public function getEstadoTienda()
    {

        $lista = getEstadoTienda();

        dd($lista);
    }

    public function getTiendaById()
    {

        $id = 1;

        $lista = getTiendaById($id);

        dd($lista);
    }

    public function getEstadoTiendas()
    {

        $lista = getEstadoTiendas();

        dd($lista);
    }

    public function getCostoEnvio()
    {

        $lista = getCostoEnvio();

        dd($lista);
    } */
}
