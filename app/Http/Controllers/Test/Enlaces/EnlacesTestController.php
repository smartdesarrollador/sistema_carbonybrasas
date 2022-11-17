<?php

namespace App\Http\Controllers\Test\Enlaces;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnlacesTestController extends Controller
{
    //
    public function index()
    {
        return view('test.enlaces.enlaces');
    }
}
