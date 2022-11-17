<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Producto;
use Helpers\Clases\Admin\TipoProducto;
use Helpers\Clases\Main\ProductoClass;

use Illuminate\Support\Facades\Storage;

class UpdateProductAdminController extends Controller
{
    //
    public function index($idProducto)
    {
        $objProducto = new Producto();
        $producto = $objProducto->getProductoById(trim($idProducto));
        $objTipoProducto = new TipoProducto();
        $listaTipoProductos = $objTipoProducto->getTipoProductos();

        //dd($producto);

        return view('admin.update_product', ['producto' => $producto, 'listaTipoProductos' => $listaTipoProductos, 'idProducto' => $idProducto]);
    }

    public function UpdateProduct(Request $request)
    {
        $objProducto = new ProductoClass();

        /* $request->validate([
            'foto' => 'required|image|max:2048'
        ]); */

        if ($request->input('action') == 'submit') {

            $idProducto = trim($request->input('idProducto'));
            $nombreProducto = trim($request->input('nombreProducto'));
            $descripcionProducto = trim($request->input('descripcionProducto'));
            $tipoProducto = $request->input('tipoProducto');
            $precioProducto = floatval($request->input('precioProducto'));
            $puntosProducto = intval($request->input('puntosProducto'));

            $storeId = 1;

            $stock = "YES";
            $estado = "ACTIVO";

            if (!is_null($request->file('foto'))) {
                $imagen = $request->file('foto')->store('public/imagenes/productos');

                $url = Storage::url($imagen);

                $foto = $url;

                $affectedRows = $objProducto->updateProductWithPhoto($idProducto, $nombreProducto, $descripcionProducto, $foto, $tipoProducto, $precioProducto, $puntosProducto, $storeId);

                if ($affectedRows > 0) {
                    return redirect()->route('admin.productos');
                    //header('location: https://operaciones.carbonybrasas.pe/productos?code=success');
                } else {
                    return "Error inesperado, contacte con el administrador";
                }
            } else {

                $objProducto->updateProductWithoutPhoto($idProducto, $nombreProducto, $descripcionProducto, $tipoProducto, $precioProducto, $puntosProducto, $storeId);

                return redirect()->route('admin.productos');
            }
        }
    }
}
