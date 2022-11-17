<?php

namespace App\Http\Controllers\Test\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Helpers\vendor\izipay\vendor\lyracom\rest\src\Lyra\Client;

class IzipayTestController extends Controller
{
    //
    public function index()
    {

        /* 
        $client = new Client();

       
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
            throw new Exception("error " . $error['errorCode'] . ": " . $error['errorMessage']);
        }

       
        $formToken = $response["answer"]["formToken"];

        return view("test.helper.izipay", ['client' => $client, 'formToken' => $formToken]); */
    }
}
