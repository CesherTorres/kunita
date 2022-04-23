<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coberturas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ubigeocobertura_id')->unsigned();
            $table->bigInteger('empresa_id')->unsigned();
            $table->string('precioenvio');
            $table->string('diasestimados');

            $table->foreign('ubigeocobertura_id')->references('id')->on('ubigeoperu');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

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
        Schema::dropIfExists('coberturas');
    }
}
