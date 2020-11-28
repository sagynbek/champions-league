<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = ['season_id', 'team_id', 'initial_strength', 'computed_strength'];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function updatePrediction($play)
    {
        $result = $play->formatScoreForTeam($this->team_id);
        $strengthToAdd = 0;

        if ($result['goals_for'] === $result['goals_against']) { // Draw
            $strengthToAdd = 1;
        } else if ($result['goals_for'] > $result['goals_against']) { // Win
            $strengthToAdd = 3;
        } else {
            $strengthToAdd = -3;
        }
        $this->computed_strength += $strengthToAdd;
        $this->update();
    }
}
