<?php

namespace App\Http\Controllers\Test\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\Clases\Admin\SmsLog;

class SmsLogTestController extends Controller
{
    //

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
