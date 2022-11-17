<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class Delivery
{

    function getCostoPorDistritos()
    {

        $lista = DB::select("SELECT * FROM delivery ORDER BY id");

        return $lista;
    }

    function getDeliveryZoneById($id)
    {
        $lista = DB::select("SELECT * FROM delivery 
    INNER JOIN tienda ON delivery.idTienda = tienda.idTienda
    where delivery.id = '$id'");

        return $lista[0];
    }

    function addNewDeliveryZone($name, $coords, $price, $idTienda)
    {
        date_default_timezone_set('America/Lima');
        $actualDate = time();
        $nuevo_delivery = DB::insert("INSERT INTO delivery(name,coords,price,idTienda)
        VALUES('$name','$coords','$price','$idTienda')");

        return $nuevo_delivery;
    }
}
