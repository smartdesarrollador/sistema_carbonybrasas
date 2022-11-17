<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\ClienteClass;

class MiCuentaController extends Controller
{
    //
    public function index(Request $request)
    {
        $objCliente = new ClienteClass();
        $clienteActual = $objCliente->getAllInformationUserById(session('current_customer_idCliente'));

        $datos_actualizados = "false";

        if ($request->session()->has('message')) {
            $request->session()->forget('key');
            $datos_actualizados = "true";
        }

        return view('main.mi-cuenta', ['datos_actualizados' => $datos_actualizados, 'clienteActual' => $clienteActual]);
    }
}
