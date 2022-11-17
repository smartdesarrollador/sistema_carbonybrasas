<?php

namespace App\Http\Controllers\Test\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComponentTestController extends Controller
{
    //
    public function alert()
    {
        return view('test.component.alert');
    }
}
