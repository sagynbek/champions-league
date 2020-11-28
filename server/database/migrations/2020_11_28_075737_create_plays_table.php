<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plays', function (Blueprint $table) {
            $table->id();
            $table->integer("week_id");
            $table->integer("team1_id");
            $table->integer("team2_id");
            $table->integer("team1_score")->min(0)->default(0);
            $table->integer("team2_score")->min(0)->default(0);
            $table->boolean("is_played")->default(false);
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
        Schema::dropIfExists('plays');
    }
}
