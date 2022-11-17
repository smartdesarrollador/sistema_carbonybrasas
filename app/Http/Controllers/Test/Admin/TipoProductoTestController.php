<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\TipoProducto;

class TipoProductoTestController extends Controller
{
    //

    public function getTipoProductos()
    {
        $obj = new TipoProducto();

        $lista = $obj->getTipoProductos();

        dd($lista);
    }
}
