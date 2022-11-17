<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('productos', function (Blueprint $table) {
            $table->id("idProducto");
            $table->string("nombreProducto")->nullable();
            $table->string("descripcionProducto")->nullable();
            $table->string("imagenProducto")->nullable();
            $table->string("imagen")->nullable();
            $table->unsignedBigInteger("idTipoProducto")->nullable();
            $table->foreign("idTipoProducto")->references("idTipoProducto")->on("tipoproducto")->onDelete("set null");
            $table->string("productoObservaciones")->nullable();
            $table->integer("precioProducto")->nullable();
            $table->string("stock")->nullable();
            $table->string("estado")->nullable();
            $table->integer("posicion")->nullable();
            $table->integer("acumulaNPuntos")->nullable();
            $table->integer("giftValor")->nullable();
            $table->string("programable")->nullable();
            $table->string("esNuevo")->nullable();
            $table->integer("precioDescuento")->nullable();
            $table->integer("store_id")->nullable();

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
        Schema::dropIfExists('productos');
    }
}
