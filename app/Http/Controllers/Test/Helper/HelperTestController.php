<?php

namespace App\Http\Controllers\Test\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Helpers\test\Codifica;

class HelperTestController extends Controller
{
    //
    public function index(Codifica $codifica)
    {
        /* return $codifica->encodePicture(aqui_el_valor_a_pasar); */

        $valor = $codifica->metodo();

        dd($valor);
    }

    public function instancia()
    {
        /* return $codifica->encodePicture(aqui_el_valor_a_pasar); */

        $obj = new Codifica();

        $valor = $obj->instanciar();

        dd($valor);
    }

    public function getAllClients()
    {
        $obj = new Codifica();

        $lista = $obj->getAllClients();

        dd($lista);
    }

    public function izipay()
    {
        $client = metodo_izipay();


        $store = array(
            "amount" => 250,
            "currency" => "EUR",
            "orderId" => uniqid("MyOrderId"),
            "customer" => array(
                "email" => "sample@example.com"
            )
        );
        $response = $client->post("V4/Charge/CreatePayment", $store);

        if ($response['status'] != 'SUCCESS') {

            display_error($response);
            $error = $response['answer'];

            //throw new Exception("error " . $error['errorCode'] . ": " . $error['errorMessage']);

            ecepcion_izipay("error " . $error['errorCode'] . ": " . $error['errorMessage']);
        }

        /* everything is fine, I extract the formToken */
        $formToken = $response["answer"]["formToken"];

        //dd($response);

        //casa -------
        //$path = "http://localhost/liveware_test_laravel/helpers/izipay/";

        //oficina
        $path = "http://localhost/laravel/liveware_test_laravel/helpers/izipay/";


        return view("test.helper.izipay", ['client' => $client, 'formToken' => $formToken, 'path' => $path]);
    }
}
