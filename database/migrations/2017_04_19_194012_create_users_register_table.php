<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRegisterTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users_register', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre',25);
			$table->string('apellido',25);
			$table->string('email')->unique();
			$table->string('organizacion',100);
			$table->string('ocupacion',15);
            $table->string('username',25);
            $table->string('password',60);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users_register');
    }
}
