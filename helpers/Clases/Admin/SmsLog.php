<?php

namespace Helpers\Clases\Admin;

use Illuminate\Support\Facades\DB;

class SmsLog
{

    public function addNewSmsLog($destino, $url)
    {
        /*  $actualDateTime = time();
        date_default_timezone_set('America/Lima');
        $sql = "INSERT INTO sms_log(dateTime,destino,url)
					VALUES('$actualDateTime','$destino','$url')";
        $id = AccesoBD::InsertAndGetLastId($this->cn, $sql);
        return $id; */
    }
}
