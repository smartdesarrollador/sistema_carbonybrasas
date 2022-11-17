<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Delivery;

class DeliveryTestController extends Controller
{
    //
    public function getCostoPorDistritos()
    {
        $obj = new Delivery();

        $lista = $obj->getCostoPorDistritos();

        dd($lista);
    }

    public function getDeliveryZoneById()
    {
        $obj = new Delivery();

        $id = 1;
        $lista = $obj->getDeliveryZoneById($id);

        dd($lista);
    }

    public function addNewDeliveryZone()
    {
        $obj = new Delivery();

        $name = "san Borja";
        $coords = "coordenadas";
        $price = 40;
        $idTienda = 1;


        $insertando = $obj->addNewDeliveryZone($name, $coords, $price, $idTienda);

        dd($insertando); //1


    }
}
