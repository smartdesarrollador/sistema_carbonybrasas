<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/keys.php';
require_once __DIR__ . '/helpers.php';



function metodo_izipay()
{
    $client = new Lyra\Client();



    return  $client;
}

function ecepcion_izipay($variable)
{
    throw new Exception($variable);
}
