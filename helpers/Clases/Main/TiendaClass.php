<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class TiendaClass
{

    function getEstadoTienda()
    {
        $lista = DB::select("SELECT estado FROM tienda where idTienda = 1");

        return $lista[0];
    }

    function getTiendaById($id)
    {
        $lista = DB::select("SELECT * FROM tienda where idTienda = '$id'");

        return $lista[0];
    }

    function getEstadoTiendas()
    {
        $lista = DB::select("SELECT * FROM tienda");

        return $lista;
    }

    function getCostoEnvio()
    {
        $lista = DB::select("SELECT costoDelivery FROM tienda where idTienda = 1");

        return $lista;
    }
}
