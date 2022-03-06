<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
    Schema::create('cita', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cita',100);
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
        Schema::drop('indice');
    }
}
