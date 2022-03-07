<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosAbiertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_abiertos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo',300);
            $table->string('autor',300);
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('area');
            $table->integer('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id')->on('programa_acreditados');
            $table->integer('anho')->length(10);
            $table->string('descripcion',5000);
            $table->string('nombre_portada',500);
            $table->string('nombre_documento',500);
	        $table->string('path_portada',100);
            $table->string('path_document',100);
            $table->string('idioma',15);
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
        Schema::dropIfExists('datos_abiertos');
    }
}
