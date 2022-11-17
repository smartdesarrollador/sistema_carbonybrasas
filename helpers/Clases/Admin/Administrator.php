<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class administrator
{

    public function getAdministratorByEmail($email)
    {
        $lista = DB::select("SELECT * FROM admin where correo = '$email'");

        return $lista[0];
    }
}
