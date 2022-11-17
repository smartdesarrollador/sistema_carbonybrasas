<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\TipoProducto;
use Helpers\Clases\Main\ProductoClass;

use Illuminate\Support\Facades\Storage;

class AddProductAdminController extends Controller
{
    //

    public function index()
    {

        $objTipoProducto = new TipoProducto();
        $listaTipoProductos = $objTipoProducto->getTipoProductos();

        return view('admin.add_product', ['listaTipoProductos' => $listaTipoProductos]);
    }

    public function AddProduct(Request $request)
    {
        $objProducto = new ProductoClass();

        $request->validate([
            'foto' => 'required|image|max:2048'
        ]);

        if ($request->input('action') == 'submit') {

            $imagen = $request->file('foto')->store('public/imagenes/productos');

            $url = Storage::url($imagen);

            $foto = $url;
            $nombreProducto = trim($request->input('nombreProducto'));
            $descripcionProducto = trim($request->input('descripcionProducto'));
            $tipoProducto = $request->input('tipoProducto');
            $precioProducto = floatval($request->input('precioProducto'));
            $puntosProducto = intval($request->input('puntosProducto'));

            $storeId = 1;

            $stock = "YES";
            $estado = "ACTIVO";

            $affectedRows = $objProducto->addNewProducto($nombreProducto, $descripcionProducto, $foto, $tipoProducto, $precioProducto, $stock, $estado, $puntosProducto, $storeId);
            if ($affectedRows > 0) {
                return redirect()->route('admin.productos');
                //header('location: https://operaciones.carbonybrasas.pe/productos?code=success');
            } else {
                return "Error inesperado, contacte con el administrador";
            }
        }
    }
}
