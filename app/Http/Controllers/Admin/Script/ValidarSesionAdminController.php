<?php

namespace App\Http\Controllers\Admin\Script;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Helpers\Clases\Admin\Administrator;

class ValidarSesionAdminController extends Controller
{
    //
    public function ValidarSesion(Request $request)
    {
        if ($request->has('submit', 'code')) {

            $objAdministrator = new administrator();
            $email = filtrado_datos($request->input('email'));
            $password = filtrado_datos($request->input('password'));

            $lista = $objAdministrator->getAdministratorByEmail($email);

            if (Hash::check($password, $lista->password)) {


                if ($lista->rol == 'ADMIN') {

                    $request->session()->put('current_email', $lista->correo);
                    $request->session()->put('current_fullName', $lista->nombre);
                    $request->session()->put('current_rol', 'admin');

                    return redirect()->route('admin.dashboard');
                } else {
                    $request->session()->put('current_email', $lista->correo);
                    $request->session()->put('current_fullName', $lista->nombre);
                    $request->session()->put('current_rol', 'motorizado');

                    return redirect()->route('admin.dashboardmin');
                }
            } else {
                return "No existe el usuario";
            }
        } else {
            return "Usuario no autorizado";
        }
    }
}
