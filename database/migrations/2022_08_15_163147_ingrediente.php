<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ingrediente', function (Blueprint $table) {
            $table->id("idIngrediente");
            $table->string("nombre")->nullable();
            $table->string("estado")->nullable();
            $table->integer("posicion")->nullable();
            $table->string("tipo")->nullable();
            $table->string("observaciones")->nullable();
            $table->string("imageUrl")->nullable();
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
        Schema::dropIfExists('ingrediente');
    }
}
