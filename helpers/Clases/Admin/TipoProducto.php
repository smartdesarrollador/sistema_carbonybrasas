<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class TipoProducto
{

    public function getTipoProductos()
    {
        $lista = DB::select("SELECT * FROM tipoproducto");

        return $lista;
    }
}
