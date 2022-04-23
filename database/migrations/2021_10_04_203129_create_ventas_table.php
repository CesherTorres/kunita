<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('namecliente');
            $table->string('direccion');
            $table->string('referencia');
            $table->bigInteger('cobertura_id')->unsigned();
            $table->string('tipodocumento');
            $table->string('ndocumento');
            $table->string('correo');
            $table->string('celular');

            $table->string('tipocomprobante')->nullable();
            $table->string('numerocomprobante')->nullable();
            $table->dateTime('fecha_hora');
            $table->decimal('total', 11,2);
            $table->string('estado');
 
            $table->bigInteger('empresa_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('cobertura_id')->references('id')->on('coberturas');
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
        Schema::dropIfExists('ventas');
    }
}
