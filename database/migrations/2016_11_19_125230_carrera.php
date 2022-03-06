<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('carrera', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carrera',45);
            $table->integer('facultad_id')->unsigned();
            $table->foreign('facultad_id')->references('id')->on('facultad');
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
    Schema::drop('carrera');
    }
}
