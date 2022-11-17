<?php

namespace Helpers\Http\Controllers\Main\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Helpers\Clases\Main\Cart;

class CambiarMetodoDeEnvioController extends Controller
{
    //
    public function cambiarMetodoDeEnvio(Request $request)
    {

        if ($request->input('code') == 'recojo') {
            session(['envio' => 'recojo']);
        }

        if ($request->input('code') == 'reparto') {
            session(['envio' => 'reparto']);
        }

        $cart = new Cart();
        $cart->save_cart();

        return response()->json([
            'ok' => 'true',
            'message' => 'Metodo de envio cambiado correctamente',
        ]);
    }
}
