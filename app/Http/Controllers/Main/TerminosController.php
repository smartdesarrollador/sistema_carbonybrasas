<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TerminosController extends Controller
{
    //
    public function index(){
        return view('main.terminos');
    }
}
