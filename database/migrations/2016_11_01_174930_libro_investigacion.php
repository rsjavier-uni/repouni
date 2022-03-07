<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibroInvestigacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::create('libro_investigacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_doi',60);
            $table->string('titulo',300);
            $table->integer('area_id')->unsigned();
            // $table->foreign('area_id')->references('id')->on('area');
            $table->integer('año')->length(10);
            $table->string('descripcion',5000);
            $table->string('portada_name',500);
            $table->string('document_name',500);
	        $table->string('path_portada',100);
            $table->string('path_document',100);
            $table->string('idioma',15);
            $table->string('categoria',35);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
       Schema::drop('libro_investigacion');
    }
}
