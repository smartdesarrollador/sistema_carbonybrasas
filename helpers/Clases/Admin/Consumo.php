<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class Consumo
{

    public function addNewConsumo($idCliente, $amount)
    {
        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');

        $nuevo_producto = DB::insert("INSERT INTO consumo(idCliente,monto,fecha,hora)
        VALUES('$idCliente','$amount',now(),now())");

        return $nuevo_producto;
    }
}
