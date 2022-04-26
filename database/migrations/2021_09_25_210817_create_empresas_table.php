<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razonsocial');
            $table->string('ruc');
            $table->string('marca');
            $table->string('descripcion');
            $table->string('telefonoempresa');
            $table->string('correoempresa');
            $table->string('logoempresa');
            $table->string('direccion');
            $table->string('cuentabanco')->nullable();
            $table->string('ncuentabanco')->nullable();
            $table->string('ncuentabancocci')->nullable();
            $table->string('billeteradigital')->nullable();
            $table->string('numerobilletera')->nullable();
            $table->string('enlacefacebook');
            $table->string('enlaceinstagram');
            $table->string('enlacewhatsapp');
            $table->string('estadoemp');
            $table->string('fecha_activate');
            
            $table->bigInteger('giro_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('propietario_id')->unsigned();
            $table->bigInteger('ubigeo_id')->unsigned();

            $table->foreign('giro_id')->references('id')->on('giros');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');
            $table->foreign('ubigeo_id')->references('id')->on('ubigeoperu');
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
        Schema::dropIfExists('empresas');
    }
}
