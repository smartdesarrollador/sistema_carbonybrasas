<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('consumo', function (Blueprint $table) {
            $table->id("idConsumo");
            $table->unsignedBigInteger("idCliente")->nullable();
            $table->foreign("idCliente")->references("idCliente")->on("clientes")->onDelete("set null");
            $table->decimal("monto", 10, 2)->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string("descripcion")->nullable();

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
        Schema::dropIfExists('consumo');
    }
}
