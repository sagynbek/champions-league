<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_standings', function (Blueprint $table) {
            $table->id();
            $table->integer("play_id");
            $table->integer("team_id");
            $table->integer("points");
            $table->integer("plays");
            $table->integer("wins");
            $table->integer("draws");
            $table->integer("loses");
            $table->integer("goal_difference");
            $table->integer("strength");
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
        Schema::dropIfExists('team_standings');
    }
}
