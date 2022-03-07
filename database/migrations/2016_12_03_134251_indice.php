<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Indice extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
    Schema::create('indice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indice',100);
            $table->integer('libro_inv_id')->unsigned();
            $table->foreign('libro_inv_id')->references('id')->on('libro_investigacion');
            $table->integer('pagina')->length(3);
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
