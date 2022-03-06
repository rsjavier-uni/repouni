<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Autor extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('autor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',25);
            $table->string('apellido',25);
            $table->string('direccion',60);
            $table->string('telefono',12);
            $table->string('email',35)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
      Schema::drop('autor');
    }
}
