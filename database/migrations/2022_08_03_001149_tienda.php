<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tienda', function (Blueprint $table) {
            $table->id("idTienda");
            $table->integer("CostoDelivery")->nullable();
            $table->string("estado")->nullable();
            $table->string("acepta_pedidos")->nullable();
            $table->string("direccion_tienda")->nullable();
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
        Schema::dropIfExists('tienda');
    }
}
