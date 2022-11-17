<?php

namespace App\Http\Controllers\Main\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Helpers\Clases\Main\Delivery;

class SetDeliveryZoneIdController extends Controller
{
    //
    public function setDeliveryZoneId(Request $request)
    {
        $deliveryZoneId = $request->input('deliveryZone');

        if (strlen($deliveryZoneId) <= 0) {
            http_response_code(400);

            return response()->json([
                'ok' => 'false',
                'message' => 'Por favor envie un deliveryzoneId valido',
            ]);
        }

        $objDelivery = new Delivery();

        $data = $objDelivery->getDeliveryZoneById($deliveryZoneId);

        $request->session()->put('deliveryZoneId', $data->id);

        return response()->json([
            'ok' => 'true',
            'data' => $data,
        ]);
    }
}
