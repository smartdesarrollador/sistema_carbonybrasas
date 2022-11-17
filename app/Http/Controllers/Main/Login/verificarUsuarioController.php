<?php

namespace App\Http\Controllers\Main\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Helpers\Clases\Main\ClienteClass;

class verificarUsuarioController extends Controller
{
    //
    public function verificarUsuario(Request $request)
    {

        /*   $input = $request->all();
        dd($input); */

        /*  $email_correo = $request->correo;

        dd($email_correo); */

        if (isset($request->correo) && isset($request->contrasena)) {

            $userEmail = trim(strtolower($request->correo));
            $userPassword = $request->contrasena;

            $objCliente = new ClienteClass();

            $customerExists = $objCliente->getListaUserPasswordByEmail($userEmail);

            //dd($get_password);
            if (count($customerExists) > 0) {

                $get_password = $objCliente->getUserPasswordByEmail($userEmail);

                if (Hash::check($userPassword, $get_password->password)) {
                    // The passwords match...

                    $verifiedUser = $objCliente->getAllInformationUserByEmail($userEmail);

                    session(['current_customer_idCliente' => $verifiedUser->idCliente]);
                    session(['current_customer_email' => strtolower($verifiedUser->email)]);
                    session(['current_customer_nombre' => $verifiedUser->nombre]);
                    session(['current_customer_apellido' => $verifiedUser->apellido]);
                    session(['current_customer_DNI' => $verifiedUser->DNI]);
                    session(['current_customer_fechaNacimiento' => $verifiedUser->fechaNacimiento]);
                    session(['current_customer_telefono' => $verifiedUser->celular]);
                    session(['current_customer_direccion' => $verifiedUser->direccion]);
                    session(['current_customer_puntos' => $verifiedUser->puntos]);

                    //dd(session()->all());

                    //dd("contraseña correcta");

                    if ($request->session()->has('current_customer_idCliente', 'current_customer_email')) {


                        session(['estado_cliente' => "true"]);

                        return redirect()->route('inicio');

                        //dd("sesion activa");
                    } else {

                        session(['estado_cliente' => "false"]);

                        dd("sesion no activa");
                    }
                } else {
                    return redirect()->route('inicio', ['code' => 'incorrectPass']);
                }
            } else {
                return redirect()->route('inicio', ['code' => 'notExistUser']);
            }
        }
    }
}
