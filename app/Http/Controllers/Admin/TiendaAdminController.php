<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Tienda;
use Helpers\Clases\Admin\Delivery;

class TiendaAdminController extends Controller
{
    //
    public function index()
    {
        $objTienda = new Tienda();
        $objDelivery = new Delivery();
        $tienda = $objTienda->getStoreStatus();

        $item_tienda = $objTienda->getEstadoTiendas();


        $estado = $tienda->estado;


        $CostoEnvio = $objTienda->getCostoEnvio();

        $costoDelivery = trim($CostoEnvio->costoDelivery);



        $listaDistritosConCosto = $objDelivery->getCostoPorDistritos();

        return view('admin.tienda', ['item_tienda' => $item_tienda, 'estado' => $estado, 'listaDistritosConCosto' => $listaDistritosConCosto]);
    }
}
