<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('delivery', function (Blueprint $table) {
            $table->id("id");
            $table->string("name")->nullable();
            $table->longText("coords")->nullable();
            $table->decimal("price", 10, 2)->nullable();
            $table->unsignedBigInteger("idTienda")->nullable();

            $table->foreign("idTienda")->references("idTienda")->on("tienda")->onDelete("set null");


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
        Schema::dropIfExists('delivery');
    }
}
