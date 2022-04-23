<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nameproducto');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('genero')->nullable();
            $table->string('alto')->nullable();
            $table->string('ancho')->nullable();
            $table->string('profundidad')->nullable();
            $table->string('peso')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('oferta')->nullable();
            $table->decimal('preciosugerido', 11,2);
            $table->decimal('nuevaoferta', 11,2)->nullable();
            $table->dateTime('fecha_vencimiento')->nullable();
            $table->string('stock');
            $table->string('descripcion')->nullable();
            $table->string('imguno')->nullable();
            $table->string('imgdos')->nullable();
            $table->string('imgtres')->nullable();
            $table->string('imgprincipal');
            $table->string('estado');

            $table->bigInteger('empresa_id')->unsigned();
            $table->integer('subcategoria_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');

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
        Schema::dropIfExists('productos');
    }
}
