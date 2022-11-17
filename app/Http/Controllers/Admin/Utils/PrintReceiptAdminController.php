<?php

namespace App\Http\Controllers\Admin\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintReceiptAdminController extends Controller
{
    //
    public function PrintReceipt($idPedido)
    {
        dd($idPedido);
        return view('admin.utils.printreceipt');
    }
}
