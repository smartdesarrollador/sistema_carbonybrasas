<?php

namespace App\Http\Controllers\Test\crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoProducto;

class CrudTestController extends Controller
{
    //
    public function index()
    {
        $categorias = TipoProducto::all();

        return view("test.crud.index", ['categorias' => $categorias]);
    }

    public function create()
    {
        return view("test.crud.create");
    }

    public function store(Request $request)
    {
        $tipo_producto = new TipoProducto();

        $tipo_producto->nombre = $request->nombre;

        $tipo_producto->imageUrl = $request->imageUrl;

        $tipo_producto->save();

        return redirect('crud');
    }

    public function edit($idTipoProducto)
    {
        $tipo_producto = TipoProducto::where('idTipoProducto', $idTipoProducto)->first();

        return view('test.crud.edit')->with('categoria', $tipo_producto);
    }


    public function update(Request $request, $idTipoProducto)
    {
        $tipo_producto = TipoProducto::where('idTipoProducto', $idTipoProducto)->first();

        $tipo_producto->nombre = $request->nombre;

        $tipo_producto->imageUrl = $request->imageUrl;

        $tipo_producto->update();

        return redirect('crud');
    }


    public function destroy($idTipoProducto)
    {
        $tipo_producto = TipoProducto::where('idTipoProducto', $idTipoProducto);

        $tipo_producto->delete();

        return redirect()->route('crud.index');
    }
}
