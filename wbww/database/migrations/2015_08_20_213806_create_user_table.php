<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_address');
            $table->string('user_city');
            $table->string('user_state', 2);
            $table->string('user_zip', 5);
            $table->string('user_phone_num', 12);
            $table->string('email')->unique();
            $table->string('password'); //Going to have encryption with Laravel Hashing//
            $table->boolean('captain'); //1=captain, 0=member/rover//
            $table->integer('user_alley')->unsigned();
            $table->integer('user_team')->unsigned();
            $table->boolean('admin');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
