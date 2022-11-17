<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class EstadoPedido
{

    public function getEstadoPedidos()
    {
        $lista = DB::select("SELECT * FROM estadopedido");

        return $lista;
    }
}
