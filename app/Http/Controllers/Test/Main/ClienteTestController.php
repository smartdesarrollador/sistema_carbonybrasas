<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Helpers\Clases\Main\ClienteClass;

class ClienteTestController extends Controller
{
    //
    public function getUserByEmail($email)
    {
        $obj = new ClienteClass();

        $lista = $obj->getUserByEmail($email);

        //dd($lista_email);

        return view("main.gift-carts", ['lista' => $lista]);
    }

    public function getClienteByIDAndConfigurationToken($idCliente, $configToken)
    {
        $obj = new ClienteClass();

        $lista = $obj->getClienteByIDAndConfigurationToken($idCliente, $configToken);

        dd($lista);
    }

    public function getEmailCustomerByEmail()
    {
        $obj = new ClienteClass();

        $email = "maurojohen@gmail.com";

        $lista = $obj->getEmailCustomerByEmail($email);

        dd($lista);
    }

    public function addNewCustomer()
    {
        $obj = new ClienteClass();

        $nombre = "Juan";
        $apellido = "Sanchez";
        $email = "prueba@prueba.com";
        $celular = "923838824";
        $password = "1234";

        $nuevo_cliente = $obj->addNewCustomer($nombre, $apellido, $email, $celular, $password);

        dd($nuevo_cliente); //true
    }

    public function addNewClienteSinCuentaConfigurada()
    {
        $obj = new ClienteClass();

        $email = "hello@ejemplo.com";
        $configAccountToken = null;

        $nuevo_cliente = $obj->addNewClienteSinCuentaConfigurada($email, $configAccountToken);

        dd($nuevo_cliente); //true
    }

    public function getUserPasswordByEmail($email)
    {
        $obj = new ClienteClass();

        $get_password = $obj->getUserPasswordByEmail($email);

        dd($get_password);
    }

    public function getAllInformationUserByEmail($email)
    {
        $obj = new ClienteClass();

        $lista = $obj->getAllInformationUserByEmail($email);

        dd($lista);
    }

    public function getAllInformationUserById($idCliente)
    {
        $obj = new ClienteClass();

        $lista = $obj->getAllInformationUserById($idCliente);

        dd($lista);
    }

    public function addAcccountReoveryToken()
    {
        $obj = new ClienteClass();

        $token = "ddsfgfgsfgdfgdfg_token_hello";
        $email = "hello@ejemplo.com";

        $actualizacion = $obj->addAcccountReoveryToken($token, $email);

        dd($actualizacion); //1
    }

    public function updateClienteSaldo()
    {
        $obj = new ClienteClass();

        $idCliente = 1;
        $saldo = 40;

        $actualizacion = $obj->updateClienteSaldo($idCliente, $saldo);

        dd($actualizacion); //1

    }

    public function getUserByTknTokenAndEmail($tkn, $email)
    {
        $obj = new ClienteClass();

        /*  $tkn = "ddsfgfgsfgdfgdfg_token";

        $email = "prueba@prueba.com"; */

        $lista = $obj->getUserByTknTokenAndEmail($tkn, $email);

        dd($lista);
    }

    public function getUserByAccountRecoveryTokenAndEmail($tkn, $email)
    {
        $obj = new ClienteClass();

        $lista = $obj->getUserByAccountRecoveryTokenAndEmail($tkn, $email);

        dd($lista);
    }

    public function changeUserPasswordByRecoveryToken()
    {
        $obj = new ClienteClass();

        $passRecoveryToken = "ddsfgfgsfgdfgdfg_token";
        $email = "prueba@prueba.com";
        $password = "1234";

        $actualizacion = $obj->changeUserPasswordByRecoveryToken($passRecoveryToken, $email, $password);

        dd($actualizacion); //1
    }

    public function updateCustomerDetails()
    {
        $obj = new ClienteClass();

        $dni = "54564532";
        $direccion = "direccion";
        $telefono = "95563434";
        $idCliente = 2;
        $fechaNacimiento = "01-01-03";
        $apellido = "Sanchez perez";
        $distrito = "Lince";

        $actualizacion = $obj->updateCustomerDetails($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido = '', $distrito);

        dd($actualizacion); //1

    }

    public function updateCustomerDetailsWithLatLng()
    {
        $obj = new ClienteClass();

        $dni = "54564532";
        $direccion = "direccion";
        $telefono = "95563434";
        $idCliente = 2;
        $fechaNacimiento = "01-01-03";
        $apellido = "Sanchez perez";
        $lat = "-12.0844631";
        $long = "-77.0425245";
        $distrito = "Lince";

        $actualizacion = $obj->updateCustomerDetailsWithLatLng($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido = '', $lat, $long, $distrito);

        dd($actualizacion); //1

    }

    public function updateCustomerAllProfile()
    {
        $obj = new ClienteClass();

        $dni = "54564532";
        $direccion = "direccion";
        $telefono = "95563434";
        $idCliente = 2;
        $fechaNacimiento = "01-01-03";
        $apellido = "Sanchez perez";
        $nombre = "Jorge";

        $actualizacion = $obj->updateCustomerAllProfile($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido, $nombre);

        dd($actualizacion); //1

    }

    public function configNewCustomerProfile()
    {
        $obj = new ClienteClass();

        $idCliente = 2;
        $nombre = "Ruiz";
        $celular = "95563434";
        $passoword = "abcd";
        $cuentaConfigurada = "true";

        $actualizacion = $obj->configNewCustomerProfile($idCliente, $nombre, $celular, $passoword, $cuentaConfigurada);

        dd($actualizacion); //1


    }

    public function reducirPuntosCliente()
    {
        $obj = new ClienteClass();

        $idCliente = 2;
        $puntos = 10;

        $actualizacion = $obj->reducirPuntosCliente($idCliente, $puntos);

        dd($actualizacion); //1

    }

    public function aumentarPuntosCliente()
    {
        $obj = new ClienteClass();

        $idCliente = 1;
        $puntos = 10;

        $actualizacion = $obj->aumentarPuntosCliente($idCliente, $puntos);

        dd($actualizacion); //1

    }

    public function getUserPuntos($idCliente)
    {
        $obj = new ClienteClass();

        $lista = $obj->getUserPuntos($idCliente);

        dd($lista);
    }

    public function checkUserFB($email, $oauth_provider, $oauth_uid, $nombre, $apellido)
    {

        //Implementar
    }


    public function getAllClients()
    {
        $obj = new ClienteClass();

        $lista = $obj->getAllClients();

        dd($lista);
    }

    public function updateClienteQR()
    {
        $obj = new ClienteClass();

        $idCliente = 1;
        $imageName = "d05bGlQN3VtT2NYOThNUVFYcXBvQT09.png";

        $actualizacion = $obj->updateClienteQR($idCliente, $imageName);

        dd($actualizacion); //1

    }

    public function reducirSaldoCliente()
    {
        $obj = new ClienteClass();

        $idCliente = 1;
        $saldo = 40;

        $lista = $obj->reducirSaldoCliente($idCliente, $saldo);

        dd($lista);
    }
}
