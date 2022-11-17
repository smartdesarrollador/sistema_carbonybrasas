<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class Producto_ingrediente
{

    function getIngredientesByIdProducto($idProducto)
    {
        $lista = DB::select("SELECT * FROM producto_ingrediente INNER JOIN 
    ingrediente ON producto_ingrediente.idIngrediente = ingrediente.idIngrediente 
    WHERE producto_ingrediente.idProducto='$idProducto' AND ingrediente.estado = 'ACTIVO' ORDER BY ingrediente.nombre");

        return $lista;
    }

    function getIngredientesByIdProductoAndTipo($idProducto, $tipo, $orden)
    {
        //Implementar
    }

    function getAllIngredientes()
    {
        //Implementar
    }
}
