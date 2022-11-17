<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->id("idCliente");
            $table->string("nombre")->nullable();
            $table->string("apellido")->nullable();
            $table->string("email")->nullable();
            $table->string("password")->nullable();
            $table->string("DNI")->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string("celular")->nullable();
            $table->string("direccion")->nullable();
            $table->string("reputacion")->nullable();
            $table->integer("puntos")->nullable();
            $table->string("estado")->nullable();
            $table->date('fechaRegistro')->nullable();
            $table->string("passRecoveryToken")->nullable();
            $table->string("oauth_provider")->nullable();
            $table->string("oauth_uid")->nullable();
            $table->string("qrCode")->nullable();
            $table->decimal("saldoBilletera", 7, 2)->nullable();
            $table->string("cuentaConfigurada")->nullable();
            $table->string("configAccountToken")->nullable();
            $table->string("referencia")->nullable();
            $table->string("distrito")->nullable();
            $table->string("latitud")->nullable();
            $table->string("longitud")->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
