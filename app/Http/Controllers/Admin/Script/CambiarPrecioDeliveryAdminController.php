<?php

namespace App\Http\Controllers\Admin\Script;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Delivery;

class CambiarPrecioDeliveryAdminController extends Controller
{
    //
    public function CambiarPrecioDelivery(Request $request)
    {
        $objDelivery = new Delivery();

        $id = $request->idDelivery;;
        $precio = $request->precioDelivery;

        dd($id);


        return  $objDelivery->cambiarCostoEnvioDistrito($id, $precio);
    }
}
