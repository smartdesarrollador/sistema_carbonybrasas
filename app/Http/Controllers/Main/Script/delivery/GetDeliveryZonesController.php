<?php

namespace App\Http\Controllers\Main\Script\delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\Delivery;

class GetDeliveryZonesController extends Controller
{
    //
    public function getDeliveryZones()
    {
        $objDelivery = new Delivery();

        $data = $objDelivery->getCostoPorDistritos();

        return response()->json([
            'message' => 'true',
            'data' => $data,
        ]);
    }
}
