<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliticaPrivacidadController extends Controller
{
    //
    public function index(){
        return view('main.politica-privacidad');
    }
}
