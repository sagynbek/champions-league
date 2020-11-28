<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyStanding extends Model
{
    use HasFactory;
    protected $fillable = ['week_id', 'team_id'];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
    public function week()
    {
        return $this->belongsTo('App\Models\Week');
    }

    public function updateWeeklyStanding($play)
    {
        $this->mapChanges($play);
        $this->addPrevWeekStanding();
        $this->update();
    }

    private function mapChanges($play)
    {
        $result = $play->formatScoreForTeam($this->team_id);

        if ($result['goals_for'] === $result['goals_against']) { // Draw
            $this->points += 1;
            $this->draws++;
        } else if ($result['goals_for'] > $result['goals_against']) { // Win
            $this->points += 3;
            $this->wins++;
        } else if ($result['goals_for'] < $result['goals_against']) { // Lose
            $this->loses++;
        }
        $this->goals_for += $result['goals_for'];
        $this->goals_against += $result['goals_against'];
        $this->goals_dif += $result['goals_dif'];
    }

    private function addPrevWeekStanding()
    {
        $prevStanding = $this->getPreviousWeekStanding();
        if ($prevStanding) {
            $this->points += $prevStanding->points;
            $this->plays += $prevStanding->plays;
            $this->wins += $prevStanding->wins;
            $this->draws += $prevStanding->draws;
            $this->loses += $prevStanding->loses;
            $this->goals_for += $prevStanding->goals_for;
            $this->goals_against += $prevStanding->goals_against;
            $this->goals_dif += $prevStanding->goals_dif;
        }
    }

    private function getPreviousWeekStanding()
    {
        $prevWeek = $this->week->previousWeek();
        if ($prevWeek) {
            return WeeklyStanding::where('week_id', $prevWeek->id)->where('team_id', $this->team_id)->first();
        }
        return null;
    }
}
