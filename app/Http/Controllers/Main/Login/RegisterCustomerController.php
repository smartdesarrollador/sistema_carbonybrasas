<?php

namespace App\Http\Controllers\Main\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\ClienteClass;
use Illuminate\Support\Facades\Hash;

class RegisterCustomerController extends Controller
{
    //

    public function registerCustomer(Request $request)
    {

        /*   $string = "mundo";
        $resultado = my_simple_crypt($string);
        dd($resultado); */

        $obj = new ClienteClass();

        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $email = $request->correo;
        $celular = trim($request->celular);
        $password = $request->password;
        //dd($email);

        $customer = $obj->getEmailCustomerByEmail($email);
        //dd($customer);


        /* $input = $request->all();
        dd($input); */



        if (count($customer) > 0) {

            //dd("Email Existe");
            /* header("location: ../index.php" . "?code=emailExiste");
            exit(); */

            return redirect()->route('inicio', ['code' => 'emailExiste']);
        } else {

            //$encriptedPassword = password_hash($password . "" . $password[2], PASSWORD_DEFAULT, ['cost' => 10]);

            $encriptedPassword = $hashed = Hash::make($password, [
                'memory' => 1024,
                'time' => 2,
                'threads' => 2,
            ]);


            $addNewCustomer = $obj->addNewCustomer($nombre, $apellido, $email, $celular, $encriptedPassword);

            session(['current_customer_idCliente' => $addNewCustomer]);
            session(['current_customer_email' => strtolower($email)]);
            session(['current_customer_nombre' => $nombre]);
            session(['current_customer_apellido' => $apellido]);
            session(['current_customer_DNI' => '']);
            session(['current_customer_fechaNacimiento' => '']);
            session(['current_customer_telefono' => $celular]);
            session(['current_customer_direccion' => '']);
            session(['current_customer_puntos' => 0]);

            //dd(session()->all());


            //return redirect()->route('inicio');

            //dd("Email NO existe");
        }

        if ($request->session()->has('current_customer_idCliente', 'current_customer_email')) {


            session(['estado_cliente' => "true"]);

            return redirect()->route('inicio');

            //dd("sesion activa");
        } else {

            session(['estado_cliente' => "false"]);

            dd("sesion no activa");
        }
    }
}
