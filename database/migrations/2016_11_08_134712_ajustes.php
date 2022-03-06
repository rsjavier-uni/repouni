<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ajustes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ajustes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_sitio',100);
            $table->string('logo_url',50);
            $table->string('path_img_upload',100);
            $table->string('path_document_upload',100);
            $table->integer('elements_per_page');
			$table->string('mail_to',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('ajustes');
    }
}
