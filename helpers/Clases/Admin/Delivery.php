<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class Delivery
{

    public function getCostoPorDistritos()
    {
        $lista = DB::select("SELECT * FROM delivery ORDER BY id");

        return $lista;
    }

    public function cambiarCostoEnvioDistrito($id, $precio)
    {
        $actualizacion = DB::update("UPDATE delivery set  
        price= '$precio' where id='$id'");

        return $actualizacion;
    }
}
