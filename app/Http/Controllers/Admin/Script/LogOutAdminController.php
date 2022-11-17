<?php

namespace App\Http\Controllers\Admin\Script;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogOutAdminController extends Controller
{
    //
    public function LogOut(Request $request)
    {
        $request->session()->forget('current_email');
        $request->session()->forget('current_fullName');
        $request->session()->forget('current_rol');

        return redirect()->route('admin.inicio');

    }
}
