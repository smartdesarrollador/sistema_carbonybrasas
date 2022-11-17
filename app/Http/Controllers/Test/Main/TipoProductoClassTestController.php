<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Main\TipoProductoClass;

class TipoProductoClassTestController extends Controller
{
    //
    public function getTipoProductosClass()
    {
        $obj = new TipoProductoClass();

        $lista = $obj->getTipoProductosClass();

        dd($lista);
    }
}
