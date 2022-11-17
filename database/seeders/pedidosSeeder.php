<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pedidos')->insert([
            'idPedido' => 1,
            'idCliente' => 1,
            'direccionPedido' => 'Av. César Vallejo 335, Lince, Peru',
            'pedidoTelefono' => '992404292',
            'fechaPedido' => '2022-06-12',
            'idEstado' => 2,
            'pedidoObservaciones' => 'Departamento 1502 Edificio Vitta',
            'precioTotal' => 98,
            'puntosGanados' => '0',
            'last_four' => '404293XXXX',
            'card_number' => '404293XXXXXX0161',
            'horaPedido' => "13:21:28",
            'brand' => 'VISA',
            'saldoReducido' => 0,
            'feedBackEnviado' => 'true',
            'feedBackToken' => '62a637c9a0914',
            'dateTime' => '1655058088',
            'delivery' => 'true',
            'referencia' => null,
            'distrito' => 'Lince',
            'documento' => 'factura',
            'razonSocial' => 'ORTHO TRAUMA SERVICE EIRL',
            'direccionFiscal' => 'Av Cesar Vallejo 335 Lince',
            'ruc' => '20601420172',
            'latitud' => '',
            'longitud' => '',
            'fechaEnvio' => null,
            'pedidoProgramado' => null,
            'costoEnvioPagado' => 5.00,
            'idTienda' => 0,
            'producto_gratis' => 'ture'
        ]);
    }
}
