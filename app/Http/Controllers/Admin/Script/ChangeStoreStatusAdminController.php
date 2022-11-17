<?php

namespace App\Http\Controllers\Admin\Script;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\Tienda;

class ChangeStoreStatusAdminController extends Controller
{
    //
    public function ChangeStoreStatus()
    {
        $objTienda = new Tienda();
        $tienda = $objTienda->getStoreStatus();

        if ($tienda->estado == 'CERRADO') {
            $objTienda->updateStoreStatus('ABIERTO');
            /*header('location: ../tienda');*/


            return redirect()->route('admin.tienda');
        }

        if ($tienda->estado == 'ABIERTO') {
            $objTienda->updateStoreStatus('CERRADO');
            /*header('location: ../tienda');*/


            return redirect()->route('admin.tienda');
        }
    }
}
