<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\FeedBack;

class FeedBackTestController extends Controller
{
    //

    public function getFeedBacksByDate($fechaPedido)
    {
        /*  try {
            $sql = "SELECT
	* 
FROM
	clientes
	INNER JOIN pedidos ON clientes.idCliente = pedidos.idCliente
	INNER JOIN feedback ON pedidos.idPedido = feedback.idPedido
	WHERE pedidos.fechaPedido = '$fechaPedido'
ORDER BY
	pedidos.idPedido DESC 
	LIMIT 50 ";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista;
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        } */
    }


    /*  public function getFeedBackLimit50()
    {
        try {
            $sql = "SELECT
	* 
FROM
	clientes
	INNER JOIN pedidos ON clientes.idCliente = pedidos.idCliente
	INNER JOIN feedback ON pedidos.idPedido = feedback.idPedido
ORDER BY
	pedidos.idPedido DESC 
	LIMIT 50";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista;
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    } */
}
