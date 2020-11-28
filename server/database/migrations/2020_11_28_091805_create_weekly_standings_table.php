<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_standings', function (Blueprint $table) {
            $table->id();
            $table->integer('week_id');
            $table->integer('team_id');
            $table->integer('position');
            $table->integer('points');
            $table->integer('plays');
            $table->integer('wins');
            $table->integer('draws');
            $table->integer('loses');
            $table->integer('goals_for');
            $table->integer('goals_against');
            $table->integer('goals_dif');
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
        Schema::dropIfExists('weekly_standings');
    }
}
