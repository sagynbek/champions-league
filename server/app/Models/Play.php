<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    use HasFactory;
    protected $fillable = ['week_id', 'team1_id', 'team2_id'];


    public function week()
    {
        return $this->belongsTo('App\Models\Week');
    }

    public function team1()
    {
        return $this->belongsTo('App\Models\Team', 'team1_id', 'id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team2_id', 'id');
    }

    public function getWeeklyStandingTeam1()
    {
        return WeeklyStanding::where('week_id', $this->week_id)->where('team_id', $this->team1_id)->firstOrFail();
    }

    public function getWeeklyStandingTeam2()
    {
        return WeeklyStanding::where('week_id', $this->week_id)->where('team_id', $this->team2_id)->firstOrFail();
    }

    public function scopePlayed($query)
    {
        return $query->where('is_played', true);
    }
    public function scopeNotPlayed($query)
    {
        return $query->where('is_played', false);
    }

    public function isGamePlayed()
    {
        return $this->is_played == true;
    }

    public function updatePlayedGame($team1Score, $team2Score, $forceUpdate = false)
    {
        if ($this->isGamePlayed() && $forceUpdate === false) {
            return;
        }

        $this->team1_score = $team1Score;
        $this->team2_score = $team2Score;
        $this->is_played = true;
        $this->update();
    }

    public function containsTeamId($teamId)
    {
        return $this->team1_id === $teamId || $this->team2_id === $teamId;
    }

    public function formatScoreForTeam($teamId)
    {
        if (!$this->containsTeamId($teamId)) {
            new Exception("No team found for play");
        }

        if ($teamId === $this->team1_id) {
            return [
                'goals_for'  =>  $this->team1_score,
                'goals_against'  =>  $this->team2_score,
                'goals_dif'  =>  $this->team1_score - $this->team2_score,
            ];
        } else {
            return [
                'goals_for'  =>  $this->team2_score,
                'goals_against'  =>  $this->team1_score,
                'goals_dif'  =>  $this->team2_score - $this->team1_score,
            ];
        }
    }
}
