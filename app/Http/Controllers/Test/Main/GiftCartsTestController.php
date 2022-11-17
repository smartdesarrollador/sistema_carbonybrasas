<?php

namespace App\Http\Controllers\Test\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiftCartsTestController extends Controller
{
    //
    public function index()
    {

        return view("test.main.gift-carts");
    }

    public function getUserByEmail($email)
    {

        $lista_email = getUserByEmail($email);

        //dd($lista_email);

        return view("test.main.gift-carts", ['lista_email' => $lista_email]);
    }
}
