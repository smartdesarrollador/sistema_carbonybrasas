<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\administrator;

class AdministratorTestController extends Controller
{
    //
    public function getAdministratorByEmail()
    {
        $email = "admin@greenshop.pe";

        $obj = new administrator();

        $lista = $obj->getAdministratorByEmail($email);

        dd($lista);
    }
}
