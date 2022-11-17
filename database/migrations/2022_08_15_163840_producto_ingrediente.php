<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoIngrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('producto_ingrediente', function (Blueprint $table) {

            $table->unsignedBigInteger("idProducto")->nullable();
            $table->unsignedBigInteger("idIngrediente")->nullable();

            $table->foreign("idProducto")->references("idProducto")->on("productos")->onDelete("cascade");
            $table->foreign("idIngrediente")->references("idIngrediente")->on("ingrediente")->onDelete("cascade");

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
        Schema::dropIfExists('producto_ingrediente');
    }
}
