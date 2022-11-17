<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Producto;

class BuscarProductosAdminController extends Controller
{
    //
    public function BuscarProductos(Request $request)
    {

        $objProducto = new Producto();


        $listaProductos = "";


        if ($request->input('consulta')) {
            $q = $request->input('consulta');
            $listaProductos = $objProducto->getProductosBySearch($q);
        } else {
            $listaProductos = $objProducto->getProductos();
        }



        //return $listaProductos;

        $contenido = "";

        /* $url = asset('assets/images/carta/platos'); */

        $url = asset('');


        foreach ($listaProductos as $producto) {

            $contenido .= "<div class='row z-depth-2' style='border: 2px solid rgb(197, 148, 62);border-radius: 8px;margin-bottom: 15px'>";
            $contenido .= "<div class='col l4 m4 s12  xl4 l4'>";
            $contenido .= "<p>";
            $contenido .= "<strong>" . $producto->nombreProducto . "</strong>";
            $contenido .= "</p>";
            $contenido .= "<p>";
            $contenido .= "<strong>" . $producto->descripcionProducto . "</strong>";
            $contenido .= "</p>";
            $contenido .= "<p>";
            $contenido .= "<strong>" . $producto->precioProducto . ".00</strong>";
            $contenido .= "</p>";
            $contenido .= "</div>";

            $contenido .= "<div class='col l4 m4 s12  xl4 l4 '>";
            $contenido .= "<img class='center-block lazy' style='width:180px;margin-top:10px;margin-bottom:10px' src='" . $url . "/" . $producto->imagenProducto . "' alt=''>";
            $contenido .= "</div>";
            $contenido .= "<div class='col l4 m4 s12  xl4 l4 center-align '>";
            $contenido .= "<div style='margin-top: 50px;margin-bottom: 30px'>";
            $contenido .= "<strong><u>¿Stock?</u></strong>";
            $contenido .= "<div class='switch'>";
            $contenido .= "<label>";
            if ($producto->stock == 'YES') {
                $contenido .= "<input data-idProducto='" . $producto->idProducto . "' class='chkStock' checked type='checkbox'>";
            } else {
                $contenido .= "<input data-idProducto='" . $producto->idProducto . "' class='chkStock' type='checkbox'>";
            }
            $contenido .= "<span class='lever'></span>";
            $contenido .= "SI";
            $contenido .= "</label>";
            $contenido .= "</div>";
            $contenido .= "<a title='Editar Producto' href='" . url('admin/updateproduct') . "/" . $producto->idProducto . "' style='margin:15px' class='btn-floating  waves-effect waves-light yellow darken-4'><i class='material-icons'>edit</i></a>";
            $contenido .= "</div>";
            $contenido .= "</div>";
            $contenido .= "</div>";
        }

        return $contenido;
    }
}
