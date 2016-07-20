<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlleyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alleys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alley_name');
            $table->string('alley_address');
            $table->string('alley_city');
            $table->string('alley_state', 2);
            $table->string('alley_zip', 5);
            $table->string('alley_phone');
            $table->date('alley_event');
            $table->integer('total_teams');
            $table->integer('max_teams');
            $table->integer('max_team_size');
            $table->decimal('alley_price', 5, 2);
            $table->longText('conditions');
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
        Schema::drop('alleys');
    }
}
