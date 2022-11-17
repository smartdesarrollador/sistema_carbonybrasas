<?php

namespace Helpers\test;

use Illuminate\Support\Facades\DB;

/* use Intervention\Image\Facades\Image; */

class Codifica
{
    public $valor = "cadena ----------";
    public $texto = "instanciar";

    /* function encodePicture($input)
     {
         $resize = 400;
         return Image::make($input)->resize($resize, $resize, function ($constraint) {
             $constraint->aspectRatio();
         })->encode('jpeg');
     } */

    function metodo()
    {
        $saludo = "Hola " . $this->valor;
        return $saludo;
    }

    public function instanciar()
    {
        $nombre = "metodo: " . $this->texto;
        return $nombre;
    }

    function getAllClients()
    {
        $lista = DB::select("SELECT * FROM clientes");

        return $lista;
    }
}
