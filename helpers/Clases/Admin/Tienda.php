<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class Tienda
{

    public function getStoreStatus()
    {
        $lista = DB::select("SELECT * FROM tienda");

        return $lista[0];
    }

    public function updateStoreStatus($value)
    {
        $actualizacion = DB::update("UPDATE tienda set  
        estado= '$value'");

        return $actualizacion;
    }

    public function getCostoEnvio()
    {
        $lista = DB::select("SELECT costoDelivery FROM tienda where idTienda = 1");

        return $lista[0];
    }

    public function updateCostoEnvio($value)
    {
        $actualizacion = DB::update("UPDATE tienda set  
        costoDelivery = '$value'  where idTienda = 1");

        return $actualizacion;
    }

    public function getEstadoTiendas()
    {
        $lista = DB::select("SELECT * FROM tienda");

        return $lista;
    }

    public function updateDisponibilidadTienda($status, $idTienda)
    {
        $actualizacion = DB::update("UPDATE tienda set  
        acepta_pedidos = '$status'  where idTienda = '$idTienda'");

        return $actualizacion;
    }
}
