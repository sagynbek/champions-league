<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamPlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_plays', function (Blueprint $table) {
            $table->id();
            $table->integer("play_id");
            $table->integer("team1_id");
            $table->integer("team2_id");
            $table->integer("team1_score");
            $table->integer("team2_score");
            $table->integer("host_team_id");
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
        Schema::dropIfExists('team_plays');
    }
}
