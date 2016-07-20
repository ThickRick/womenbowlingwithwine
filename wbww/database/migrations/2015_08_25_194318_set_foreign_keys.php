<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->foreign('user_alley')->references('id')->on('alleys');
        });

        Schema::table('teams', function(Blueprint $table){
            $table->foreign('team_alley')->references('id')->on('alleys');
        });

        Schema::table('events', function(Blueprint $table){
            $table->foreign('event_location')->references('id')->on('alleys');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('events', function(Blueprint $table){
            $table->dropForeign('events_event_location_foreign');
        });

        Schema::table('teams', function(Blueprint $table){
             $table->dropForeign('teams_team_alley_foreign');
        });

        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_user_alley_foreign');
        });
    }
}
