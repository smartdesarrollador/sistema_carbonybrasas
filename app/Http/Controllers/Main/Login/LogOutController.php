<?php

namespace App\Http\Controllers\Main\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LogOutController extends Controller
{
    public function logout(Request $request)
    {
        //$request->session()->flush();

        $request->session()->forget('current_customer_idCliente');
        $request->session()->forget('current_customer_email');
        $request->session()->forget('current_customer_nombre');
        $request->session()->forget('current_customer_apellido');
        $request->session()->forget('current_customer_DNI');
        $request->session()->forget('current_customer_fechaNacimiento');
        $request->session()->forget('current_customer_telefono');
        $request->session()->forget('current_customer_direccion');
        $request->session()->forget('current_customer_puntos');
        $request->session()->forget('estado_cliente');

        //dd(session()->all());

        return redirect()->route('inicio');
    }
}
