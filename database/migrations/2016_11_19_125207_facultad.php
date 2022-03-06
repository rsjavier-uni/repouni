<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Facultad extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
         Schema::create('facultad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facultad',40);
            $table->string('web',30);
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
          Schema::drop('facultad');
    }
}
