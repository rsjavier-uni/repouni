<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibroInvestigacionAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
         Schema::create('libro_investigacion_autor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autor');
            $table->integer('libro_inv_id')->unsigned();
            $table->foreign('libro_inv_id')->references('id')->on('libro_investigacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
         Schema::drop('libro_investigacion_autor');
    }
}
