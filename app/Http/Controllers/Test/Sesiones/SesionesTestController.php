<?php

namespace App\Http\Controllers\Test\Sesiones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

class SesionesTestController extends Controller
{
    //
    public function crear_sesion(Request $request)
    {

        session(['key' => 'hola']);

        $request->session()->put('valor', 'Contenido');

        return view('test.sesiones.crear_sesion');
    }

    public function validar_sesion(Request $request)
    {

        if ($request->session()->has('key')) {
            $estado_sesion = "Sesion Activa";
        } else {
            $estado_sesion = "Sesion Nula";
        }

        return view('test.sesiones.validar_sesion', ['estado_sesion' => $estado_sesion]);
    }

    public function eliminar_sesion(Request $request)
    {

        // \Session::forget('key');

        $request->session()->forget('key');

        return view('test.sesiones.eliminar_sesion');
    }

    public function recuperar_sesion()
    {


        return view('test.sesiones.recuperar_sesion');
    }

    public function all_sesion()
    {



        dd(session()->all());
    }
}
