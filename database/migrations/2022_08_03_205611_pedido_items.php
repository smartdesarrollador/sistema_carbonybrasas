<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidoItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->id("idPedido_Items");

            $table->unsignedBigInteger("idPedido")->nullable();
            $table->unsignedBigInteger("idProducto")->nullable();

            $table->foreign("idPedido")->references("idPedido")->on("pedidos")->onDelete("cascade");
            $table->foreign("idProducto")->references("idProducto")->on("productos")->onDelete("cascade");

            $table->integer("cantidad")->nullable();
            $table->string("item_descripcion")->nullable();
            $table->string("giftTipo")->nullable();
            $table->string("dedicatoriaGift")->nullable();
            $table->integer("giftTotalValorRecargado")->nullable();
            $table->integer("giftDestinatario")->nullable();

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
        Schema::dropIfExists('pedido_items');
    }
}
