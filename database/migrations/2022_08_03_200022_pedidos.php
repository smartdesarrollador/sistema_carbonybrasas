<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id("idPedido");

            $table->unsignedBigInteger("idCliente")->nullable();
            $table->foreign("idCliente")->references("idCliente")->on("clientes")->onDelete("set null");

            $table->string("direccionPedido")->nullable();
            $table->string("pedidoTelefono")->nullable();
            $table->date('fechaPedido')->nullable();

            $table->unsignedBigInteger("idEstado")->nullable();
            $table->foreign("idEstado")->references("idEstado")->on("estadopedido")->onDelete("set null");

            $table->string("pedidoObservaciones")->nullable();
            $table->integer("precioTotal")->nullable();
            $table->string("puntosGanados")->nullable();
            $table->string("last_four")->nullable();
            $table->string("card_number")->nullable();
            $table->time('horaPedido')->nullable();
            $table->string("brand")->nullable();
            $table->integer("saldoReducido")->nullable();
            $table->string("feedBackEnviado")->nullable();
            $table->string("feedBackToken")->nullable();
            $table->integer("dateTime")->nullable();
            $table->string("delivery")->nullable();
            $table->string("referencia")->nullable();
            $table->string("distrito")->nullable();
            $table->string("documento")->nullable();
            $table->string("razonSocial")->nullable();
            $table->string("direccionFiscal")->nullable();
            $table->string("ruc")->nullable();
            $table->string("latitud")->nullable();
            $table->string("longitud")->nullable();
            $table->string("fechaEnvio")->nullable();
            $table->string("pedidoProgramado")->nullable();
            $table->decimal("costoEnvioPagado", 10, 2)->nullable();
            $table->integer("idTienda")->nullable();
            $table->string("producto_gratis")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('pedidos');
    }
}
