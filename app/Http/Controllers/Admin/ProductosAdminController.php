<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Producto;

class ProductosAdminController extends Controller
{
    //
    public function index()
    {

        $objProducto = new Producto();
        $listaProductos = $objProducto->getProductos();

        return view('admin.productos', ['listaProductos' => $listaProductos]);
    }
}
