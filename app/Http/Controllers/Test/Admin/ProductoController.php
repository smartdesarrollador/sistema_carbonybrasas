<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    //
    public function index()
    {

        $productos = DB::select('select * from productos');

        //dd($productos);

        //return var_dump($productos);

        return view("test.admin.productos", ['productos' => $productos]);
    }
}
