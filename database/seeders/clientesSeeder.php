<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clientes')->insert([
            'idCliente' => 1,
            'nombre' => "Johen",
            'apellido' => "Guevara Santos",
            'email' => 'maurojohen@gmail.com',
            'password' => '$2y$10$eFJQiZrrUWnOb29hf6Tz7.hZm5twidYifQTBujlWhjSrY247eYf2y',
            'DNI' => "711111111",
            'fechaNacimiento' => "1981-06-01",
            'celular' => '931991059',
            'direccion' => "Jirón José Pezet y Monel 2009, Lince, Perú",
            'reputacion' => null,
            'puntos' => 80,
            'estado' => 'ACTIVO',
            'fechaRegistro' => "2020-01-15",
            'passRecoveryToken' => "208e583eff5a16f0b4d5",
            'oauth_provider' => "Facebook",
            'oauth_uid' => '2318851905081922',
            'qrCode' => "d055bGlQN3VtT2NYOThNUVFYcXBvQT09.png",
            'saldoBilletera' => "0.00",
            'cuentaConfigurada' => "true",
            'configAccountToken' => null,
            'referencia' => null,
            'distrito' => null,
            'distrito' => null,
            'latitud' => '-12.0844639',
            'longitud' => "-77.0425295",
        ]);
    }
}
