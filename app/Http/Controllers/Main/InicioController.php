<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index(Request $request)
    {
        //dd($code);
if($request->code){
    $code = $request->code;
}else{
$code = null;
}
        
        
        return view("main.inicio",['code' => $code]);
    }
}
