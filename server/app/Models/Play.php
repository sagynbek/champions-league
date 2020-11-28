<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    use HasFactory;
    protected $fillable = ['week_id', 'team1_id', 'team2_id'];

    public function team1()
    {
        return $this->belongsTo('App\Models\Team', 'team1_id', 'id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team2_id', 'id');
    }

    public function isGamePlayed()
    {
        return $this->is_played == true;
    }

    public function gamePlayed($team1Score, $team2Score, $forceUpdate = false)
    {
        if ($this->isGamePlayed() && $forceUpdate === false) {
            return;
        }

        $this->team1_score = $team1Score;
        $this->team2_score = $team2Score;
        $this->is_played = true;
        $this->update();
    }
}
