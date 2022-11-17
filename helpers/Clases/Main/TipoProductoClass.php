<?php

namespace Helpers\Clases\Main;

use Illuminate\Support\Facades\DB;

class TipoProductoClass
{

    function getTipoProductosClass()
    {
        $lista = DB::select("SELECT * FROM tipoproducto where idTipoProducto != '21'");

        return $lista;
    }
}
