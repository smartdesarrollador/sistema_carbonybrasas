<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class ClienteClass
{

    function getUserByEmail($email)
    {

        //$lista = DB::select("select * from clientes where email = '$email'");

        $lista = DB::table("clientes")->where('email', $email)->first();

        return $lista;
    }

    function getClienteByIDAndConfigurationToken($idCliente, $configToken)
    {

        $lista = DB::select("SELECT * FROM clientes where idCliente = '$idCliente' and configAccountToken ='$configToken'");

        return $lista;
    }

    function getEmailCustomerByEmail($email)
    {

        $lista = DB::select("SELECT idCliente,email,cuentaConfigurada,configAccountToken FROM clientes where email = '$email'");

        return $lista;
    }

    function addNewCustomer($nombre, $apellido, $email, $celular, $password)
    {
        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');


        $nuevo_cliente = DB::insert('insert into clientes (nombre, apellido,email,celular,password,fechaRegistro) values (?, ?, ?, ?, ?,?)', [$nombre, $apellido, $email, $celular, $password, $actualDate]);

        return $nuevo_cliente;
    }

    function addNewClienteSinCuentaConfigurada($email, $configAccountToken)
    {
        date_default_timezone_set('America/Lima');
        $actualDate = date('Ymd');
        $nuevo_cliente = DB::insert('insert into clientes (email,fechaRegistro,cuentaConfigurada,configAccountToken) values (?, ?, ?, ?)', [$email, $actualDate, 'false', $configAccountToken]);
        return $nuevo_cliente;
    }

    function getUserPasswordByEmail($email)
    {

        $get_password = DB::select("SELECT password FROM clientes where email = '$email'");

        return $get_password[0];
    }

    function getListaUserPasswordByEmail($email)
    {

        $get_password = DB::select("SELECT password FROM clientes where email = '$email'");

        return $get_password;
    }

    function getAllInformationUserByEmail($email)
    {
        $lista = DB::select("SELECT * FROM clientes where email = '$email'");

        return $lista[0];
    }

    function getAllInformationUserById($idCliente)
    {
        $lista = DB::select("SELECT * FROM clientes where idCliente = '$idCliente'");

        return $lista[0];
    }

    function addAcccountReoveryToken($token, $email)
    {
        $actualizacion = DB::update('update clientes set passRecoveryToken = ? where email = ?', [$token, $email]);

        return $actualizacion;
    }

    function updateClienteSaldo($idCliente, $saldo)
    {
        $actualizacion = DB::update("UPDATE clientes SET saldoBilletera = saldoBilletera+'$saldo' WHERE idCliente = '$idCliente'");

        return $actualizacion;
    }

    function getUserByTknTokenAndEmail($tkn, $email)
    {
        $lista = DB::select("SELECT * FROM clientes where passRecoveryToken = '$tkn' and email = '$email'");

        return $lista[0];
    }

    function getUserByAccountRecoveryTokenAndEmail($tkn, $email)
    {
        $lista = DB::select("SELECT * FROM clientes where passRecoveryToken = '$tkn' and email = '$email'");

        return $lista[0];
    }

    function changeUserPasswordByRecoveryToken($passRecoveryToken, $email, $password)
    {
        $actualizacion = DB::update("UPDATE clientes SET password = '$password', passRecoveryToken ='' WHERE email =  '$email' and passRecoveryToken = '$passRecoveryToken' ");

        return $actualizacion;
    }

    function updateCustomerDetails($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, string $apellido = '', $distrito)
    {
        $actualizacion = DB::update("UPDATE clientes SET DNI = '$dni', direccion ='$direccion',celular='$telefono',fechaNacimiento = '$fechaNacimiento',apellido = '$apellido',distrito = '$distrito'
    WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function updateCustomerDetailsWithLatLng($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido = '', $lat, $long, $distrito)
    {
        $actualizacion = DB::update("UPDATE clientes SET DNI = '$dni', direccion ='$direccion'
                                ,celular='$telefono'
                                ,fechaNacimiento = '$fechaNacimiento',
                                apellido = '$apellido',
                                distrito = '$distrito',
                                latitud = '$lat',
                                longitud = '$long'
                                WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function updateCustomerAllProfile($dni, $direccion, $telefono, $idCliente, $fechaNacimiento, $apellido, $nombre)
    {
        $actualizacion = DB::update("UPDATE clientes SET DNI = '$dni', direccion ='$direccion',celular='$telefono',fechaNacimiento = '$fechaNacimiento',apellido = '$apellido',
    nombre='$nombre' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function configNewCustomerProfile($idCliente, $nombre, $celular, $passoword, $cuentaConfigurada)
    {
        $actualizacion = DB::update("UPDATE clientes SET nombre = '$nombre', celular ='$celular',password='$passoword',cuentaConfigurada = '$cuentaConfigurada',configAccountToken = ''
    WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function reducirPuntosCliente($idCliente, $puntos)
    {
        $actualizacion = DB::update("UPDATE clientes SET puntos = puntos-'$puntos' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function aumentarPuntosCliente($idCliente, $puntos)
    {
        $actualizacion = DB::update("UPDATE clientes SET puntos = puntos+'$puntos' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function getUserPuntos($idCliente)
    {
        $lista = DB::select("SELECT puntos FROM clientes where idCliente = '$idCliente'");

        return $lista[0];
    }

    function checkUserFB($email, $oauth_provider, $oauth_uid, $nombre, $apellido)
    {

        //Implementar
    }


    function getAllClients()
    {
        $lista = DB::select("SELECT * FROM clientes");

        return $lista;
    }

    function updateClienteQR($idCliente, $imageName)
    {
        $actualizacion = DB::update("UPDATE clientes SET qrCode = '$imageName' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }

    function reducirSaldoCliente($idCliente, $saldo)
    {
        $actualizacion = DB::update("UPDATE clientes SET saldoBilletera = saldoBilletera-'$saldo' WHERE idCliente =  '$idCliente'");

        return $actualizacion;
    }
}
