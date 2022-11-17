<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admin = DB::select('select * from admin');

        return view("test.admin.admin", ['admin' => $admin]);
    }
}
